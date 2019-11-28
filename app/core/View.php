<?php


abstract class View
{
    protected $view = 'E404';
    protected $data;

    public function __construct($data=[])
    {
        $this->data = $data;
    }

    protected function header(){
        require_once HEADER;
    }

    protected function footer(){
        require_once FOOTER;
    }

    protected function content(){
        $viewPath = VIEWS_HTML . $this->view . '.phtml';
        require_once $viewPath;
    }

    public function render($data = []){
        $this->header();
        $this->content();
        $this->footer();
    }

}