<?php 
namespace PHPMVC;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Language;
use PHPMVC\LIB\Template;

if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'config' .  DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';
$template_parts = require_once '..' . DS . 'app' . DS . 'config' .  DS . 'tempconfig.php';

$template = new Template($template_parts);
$languge = new Language();
$froncontroller = new FrontController($template, $languge);
$froncontroller->dispatch();

// $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// list($controller, $action, $params) = explode('/' , trim($url, '/'), 3);
//  $params =explode('/', $params);

//  var_dump($controller, $action, $params);
// echo $controller . '<br>';
// echo $action . '<br>';
// echo $param . '<br>';