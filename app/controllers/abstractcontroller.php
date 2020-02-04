<?php

namespace PHPMVC\CONTROLLERS;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;


    public function notFoundAction()
    {
        echo 'Sorry This Page Dos\'t Existed';
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
        echo VIEWS_PATH . $this->_controller . DS . $this->_action;
    }
}