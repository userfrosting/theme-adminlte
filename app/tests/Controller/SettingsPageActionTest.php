<?php

declare(strict_types=1);

/*
 * UserFrosting AdminLTE Theme (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/theme-adminlte
 * @copyright Copyright (c) 2013-2024 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/theme-adminlte/blob/master/LICENSE (MIT License)
 */

namespace UserFrosting\Theme\AdminLTE\Tests\Controller;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use UserFrosting\Sprinkle\Account\Database\Models\User;
use UserFrosting\Sprinkle\Account\Testing\WithTestUser;
use UserFrosting\Sprinkle\Core\I18n\SiteLocaleInterface;
use UserFrosting\Sprinkle\Core\Testing\RefreshDatabase;
use UserFrosting\Theme\AdminLTE\Tests\AdminLTETestCase;

class SettingsPageActionTest extends AdminLTETestCase
{
    use RefreshDatabase;
    use WithTestUser;
    use MockeryPHPUnitIntegration;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
    }

    public function testPage(): void
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actAsUser($user, permissions: [
            'uri_account_settings',
            'update_account_settings',
        ]);

        $request = $this->createRequest('GET', '/account/settings');
        $response = $this->handleRequest($request);
        $this->assertResponseStatus(200, $response);
        $this->assertNotEmpty((string) $response->getBody());
    }

    public function testPageWithNoPermissions(): void
    {
        /** @var User */
        $user = User::factory()->create();
        $this->actAsUser($user);

        $request = $this->createJsonRequest('GET', '/account/settings');
        $response = $this->handleRequest($request);
        $this->assertResponseStatus(403, $response);
        $this->assertJsonResponse('Access Denied', $response, 'title');
    }

    public function testPageWithHiddenLocale(): void
    {
        // Create fake PasswordResetRepository
        /** @var SiteLocaleInterface */
        $siteLocale = Mockery::mock(SiteLocaleInterface::class)
            ->shouldReceive('getAvailableOptions')->once()->andReturn(['en_US'])
            ->shouldReceive('getLocaleIdentifier')->once()->andReturn('en_US')
            ->getMock();
        $this->ci->set(SiteLocaleInterface::class, $siteLocale);
        
        /** @var User */
        $user = User::factory()->create();
        $this->actAsUser($user, permissions: [
            'uri_account_settings',
            'update_account_settings',
        ]);

        $request = $this->createRequest('GET', '/account/settings');
        $response = $this->handleRequest($request);
        $this->assertResponseStatus(200, $response);
        $this->assertNotEmpty((string) $response->getBody());
    }
}
