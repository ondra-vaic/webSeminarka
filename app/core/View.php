<?php


abstract class View
{
    protected $view;
    private $twig;

    public function __construct($view = 'E404')
    {
        $this->view = $view;
        $loader = new \Twig\Loader\FilesystemLoader('html');
        $this->twig = new \Twig\Environment($loader, []);
    }

    protected function twigRender($view, $data = []){
        echo $this->twig->render($view.'.phtml', $data);
    }

    protected function header(){
        $this->twigRender(HEADER);
    }

    protected function footer(){
        $this->twigRender(FOOTER);
    }

    protected function content($data){
        $this->twigRender($this->view, $data);
    }

    public function render($data = []){
        $this->header();
        $this->content($data);
        $this->footer();
    }

}