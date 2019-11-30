<?php

session_start();

require_once 'App.php';
require_once 'Controller.php';
require_once 'View.php';
require_once 'Model.php';
require_once 'Database.php';
require_once 'Validator.php';
require_once 'Utils.php';
require_once 'C:/Users/me/vendor/autoload.php';

define("CONTROLLERS", '../app/controllers/');
define("MODELS", '../app/models/');
define("VIEWS", '../app/views/');
define("CORE", '../app/core/');
define("ROOT", 'Seminarka/public');
define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'test');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');
define("USER_TABLE", 'users');

define("HEADER", 'includes/header');
define("FOOTER", 'includes/footer');
define("MENU", 'includes/menu');
