<?php


class MenuView extends View
{
    private function menu(){
        $this->twigRender(MENU);
    }

    public function render($data = []){
        $this->header();
        $this->menu();
        $this->content($data);
        $this->footer();
    }
}