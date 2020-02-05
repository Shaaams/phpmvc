<?php

namespace PHPMVC\CONTROLLERS;

use PHPMVC\LIB\FrontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data =[];


    public function notFoundAction()
    {
        $this->_view();
    }
    
    public function setController($controllerName)
    {
        $this->_controller = $controllerName;
    }

    public function setAction($actionName)
    {
        $this->_action = $actionName;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    protected function _view()
    {
        if($this->_action == FrontController::NOT_FOUND_ACTION){
        
            require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
        }else {
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if(file_exists($view)){
                extract($this->_data);
                // require_once TEMP_PATH . 'zheader.php';
                // require_once TEMP_PATH . 'navbar.php';
                require_once TEMP_PATH . 'templateheaderstart.php';
                require_once TEMP_PATH . 'templateheaderend.php';
                require_once TEMP_PATH . 'wrapperstart.php';
                require_once TEMP_PATH . 'header.php';
                require_once TEMP_PATH . 'nav.php';
                require_once $view;
                require_once TEMP_PATH . 'wrapperend.php';
                require_once TEMP_PATH . 'templatefooter.php';
                // require_once TEMP_PATH . 'footer.php';
            }else{
                require_once VIEWS_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
       
    }
}