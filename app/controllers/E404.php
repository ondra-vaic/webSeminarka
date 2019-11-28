<?php

class E404 extends Controller{
    public function __construct()
    {
        echo '<h1>404</h1>';
        exit();
    }
}
