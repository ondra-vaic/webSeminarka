<?php


class Register extends Controller
{

    public function __construct()
    {
        $this->createModel('RegistrationModel');
        $this->createView('SimpleView', 'Register');
    }

    public function Register(){
        if($this->validateInput()){
            if($this->registerUser() !== false){
                $this->getModel()->SetElement('success', ['Account has been created.']);
            }
            else{
                $this->getModel()->SetElement('errors', ['There has been a technical failure, please try again.']);
            }
        }
    }

    private function registerUser(){
        return $this->getModel()->Register();
    }

    private function validateInput(){
        $errors = [];

        $errors[] = $this->getModel()->IsUserNameUsed();
        $errors[] = Validator::ValidateInputLength('User name', $this->getModel()->userName, 3, 50);
        $errors[] = Validator::ValidateInputLength('Password', $this->getModel()->password, 8, INF);
        $errors[] = Validator::ValidateInputLength('First name', $this->getModel()->firstName, 0, 128);
        $errors[] = Validator::ValidateInputLength('Email', $this->getModel()->email, 0, 128);
        $errors[] = Validator::ValidateInputLength('Organization', $this->getModel()->organization, 0, 256);

        if($this->getModel()->confirmPassword != $this->getModel()->password){
            $errors[] = 'Passwords do not match.';
        }

        Utils::ClearNulls($errors);

        $this->getModel()->SetElement('lastInput',
            ['userName' => $this->getModel()->userName,
                'firstName' => $this->getModel()->firstName,
                'email' => $this->getModel()->email,
                'organization' => $this->getModel()->organization]);

        $this->getModel()->SetElement('errors', $errors);
        return count($errors) == 0;
    }
}