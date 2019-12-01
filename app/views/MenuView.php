<?php


class MenuView extends View
{
    private function menu($data){
        $this->twigRender(MENU, $data);
    }

    public function render($data = []){
        $this->header();
        $this->menu($data);
        $this->content($data);
        $this->footer();
    }
}