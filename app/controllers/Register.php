<?php


class Register extends Controller
{
    private $wrongInputs = [];

    public function __construct()
    {
        $this->createModel('User');
        $this->createView('RegisterView');
    }

    public function Register(){
        echo $_POST['firstname'];
        $wrongInputs[] = "bla bla bla";
    }

    public function Show(){
        $this->getView()->render($this->wrongInputs);
    }
}