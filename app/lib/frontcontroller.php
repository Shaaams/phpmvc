<?php 
namespace PHPMVC\LIB;

class FrontController 
{
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = [];

     public function __construct()
    {
        $this->_parseUrl();
    }

    private function _parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
        if(isset($url[0]) && $url[0] != '')
        {
            $this->_controller = $url[0];
        }

        if(isset($url[1]) && $url[1] != '')
        {
            $this->_action = $url[1];
        }

        if(isset($url[2]) && $url[2] !='')
        {
            $this->_params = explode('/', $url[2]);
        }
       
    }

    public function dispatch()
    {
        $controllerClassName = 'PHPMVC\CONTROLLERS\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';
        if (!class_exists($controllerClassName)){
            $controllerClassName = 'PHPMVC\CONTROLLERS\\NotFoundController';
        }
        echo $controllerClassName;
    }
   
}