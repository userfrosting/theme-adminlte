<?php

/*
 * UserFrosting AdminLTE Theme (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/theme-adminlte
 * @copyright Copyright (c) 2021 Alexander Weissman & Louis Charette
 * @license   https://github.com/userfrosting/theme-adminlte/blob/master/LICENSE (MIT License)
 */

/**
 * Entry point for the /public site.
 *
 * @author Alex Weissman (https://alexanderweissman.com)
 */

// First off, we'll grab the Composer dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Workaround to get php built-in server to access legacy assets
// @see : https://github.com/slimphp/Slim/issues/359#issuecomment-363076423
if (PHP_SAPI == 'cli-server') {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

use UserFrosting\Develop\AdminLTE\App;
use UserFrosting\UserFrosting;

$uf = new UserFrosting(App::class);
$uf->run();
