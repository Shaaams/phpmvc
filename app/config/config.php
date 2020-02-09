<?php

if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

define('APP_PATH', realpath(dirname(__FILE__)) . DS . '..') ;

define('VIEWS_PATH', APP_PATH . DS . 'views' . DS) ;
define('TEMP_PATH', APP_PATH . DS . 'template' . DS) ;
define('CSS', '/css/');
define('JS', '/js/');

// Session configuration
defined('SESSION_NAME')     ? null : define ('SESSION_NAME', '_ESTORE_SESSION');
defined('SESSION_LIFE_TIME')     ? null : define ('SESSION_LIFE_TIME', 0);
defined('SESSION_SAVE_PATH')     ? null : define ('SESSION_SAVE_PATH', APP_PATH . DS . '..' . DS . 'sessions');

