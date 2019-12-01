<?php


class SignIn Extends Controller
{

    public function __construct()
    {
        $this->createModel('SimpleModel');
        $this->createView('SimpleView', 'SignIn');
    }

    public function SignIn(){

        $name = Utils::SafePost('username');
        $password = Utils::SafePost('password');
        $id = Validator::ValidateSignInInfo($name, $password);

        if($id >= 0){
            $this->signInUser($id);
        }
        else{
            $this->getModel()->SetElement('error', ['Incorrect user name or password, please try again.']);
            $this->getModel()->SetElement('lastInput', ['userName' => $name]);
        }
    }

    private function signInUser($id){
        $_SESSION['userId'] = $id;
        Utils::Redirect('Home');
    }

}