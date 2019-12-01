<?php


class Home Extends MenuController
{
    public function __construct()
    {
        $this->createModel('SimpleMenuModel');
        $this->createView('MenuView', 'Home');
        $this->initMenu();
    }
}