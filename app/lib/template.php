<?php
namespace PHPMVC\LIB;

class Template
{
    private $_templateparts;
    private $_action_view;
    private $_data;

    public function __construct(array $parts)
    {
        $this->_templateparts = $parts;
    }

    public function setActionViewFile($actionViewPath)
    {
        $this->_action_view = $actionViewPath;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    private function renderTemplateHeaderStart()
    {
        require_once TEMP_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateHeaderEnd()
    {
        require_once TEMP_PATH . 'templateheaderend.php';
    }

    private function renderTemplateFooter()
    {
        require_once TEMP_PATH . 'templatefooter.php';
    }

    private function renderTemplateBlocks()
    {
        if(! array_key_exists('template', $this->_templateparts)){

            trigger_error('Sorry You  Have  To Define The Template Blocks For This Key', E_USER_WARNING);
        }else{
            $parts = $this->_templateparts['template'];
            if(!empty($parts)){
                extract($this->_data);
                foreach($parts as $partkey => $file){
                    if($partkey == ':view'){
                        require_once $this->_action_view;
                    }else{
                        require_once $file;
                    }
                }
            }
        }
        
    }

    private function renderHeaderResources()
    {
        $output = '';
        if(! array_key_exists('header_resources', $this->_templateparts)){

            trigger_error('Sorry You  Have  To Define The Header Resources Blocks For This Key', E_USER_WARNING);
        }else{
            $resources = $this->_templateparts['header_resources'];
            
            //Generate Css Links

            $css = $resources['css'];
                if(!empty($css)){
                    foreach($css as $csskey => $path){
                        $output .= '<link rel="stylesheet" href="'. $path .' "/>';
                    }
                }
            //Generate Js Scripts

            $js = $resources['js'];
            if(!empty($js)){
                foreach($js as $jskey => $path){
                    $output .= '<script src="' . $path . '"></script>';
                }
            }

            echo $output;
        }
    }

    private function renderFooterResources()
    {
        $output = '';
        if(! array_key_exists('footer_resources', $this->_templateparts)){

            trigger_error('Sorry You  Have  To Define The Footer Resources Blocks For This Key', E_USER_WARNING);
        }else{
            $resources = $this->_templateparts['footer_resources'];
            
            //Generate Js Scripts

            if(!empty($resources)){
                foreach($resources as $resourcekey => $path){
                    $output .= '<script src="' . $path . '"></script>';
                }
            }

            echo $output;
        }
    }

    public function renderApp()
    {
        
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks();
        $this->renderFooterResources();
        $this->renderTemplateFooter();
    }
}