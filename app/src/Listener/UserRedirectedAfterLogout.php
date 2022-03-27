<?php

declare(strict_types=1);

/*
 * UserFrosting AdminLTE Theme (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/theme-adminlte
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/theme-adminlte/blob/master/LICENSE (MIT License)
 */

namespace UserFrosting\Theme\AdminLTE\Listener;

use Slim\Interfaces\RouteParserInterface;
use UserFrosting\Sprinkle\Account\Event\UserRedirectedAfterLogoutEvent;

/**
 * Set redirect for Logout Activity
 */
class UserRedirectedAfterLogout
{
    public function __construct(
        protected RouteParserInterface $routeParser,
    ) {
    }

    public function __invoke(UserRedirectedAfterLogoutEvent $event): void
    {
        $path = $this->routeParser->urlFor('index');
        $event->setRedirect($path);
    }
}