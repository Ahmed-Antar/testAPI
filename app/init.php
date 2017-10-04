<?php

define('BASE', '/testAPI');
define('WEBROOT',dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'app');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('SESSION_PREFIX', '');

require_once 'core/App.php';
require_once 'core/config.php';
require_once 'core/Model.php';
require_once 'core/Controller.php';
require_once 'helpers/assets.php';