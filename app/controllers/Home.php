<?php


class Home Extends Controller
{
    public function __construct()
    {
        $this->createModel('SimpleModel');
        $this->createView('MenuView', 'Home');
    }
}