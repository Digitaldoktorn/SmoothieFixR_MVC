<?php

// Load config
require_once 'config/config.php';

// Load Helpers
require_once 'helpers/url_helper.php';

// Load libraries (we don't need these because of autoload below)
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// Autoload Core Libraries
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
