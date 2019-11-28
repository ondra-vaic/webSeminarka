<?php

session_start();

require_once 'App.php';
require_once 'Controller.php';
require_once 'View.php';
require_once 'Model.php';

define("CONTROLLERS", '../app/controllers/');
define("MODELS", '../app/models/');
define("VIEWS_HTML", 'html/');
define("VIEWS", '../app/views/');
define("CORE", '../app/core/');
define("ROOT", 'Seminarka/public');

define("HEADER", VIEWS_HTML . 'includes/header.phtml');
define("FOOTER", VIEWS_HTML . 'includes/footer.phtml');
