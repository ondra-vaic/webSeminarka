<?php


class Home Extends Controller
{
    public function __construct()
    {
        $this->createModel('SimpleMenuModel');
        $this->createView('MenuView', 'Home');
    }

    public function LogOut(){
        $_SESSION['userId'] = -1;
        Utils::Redirect('Home');
    }
}