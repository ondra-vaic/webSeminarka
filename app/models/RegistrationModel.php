<?php


class RegistrationModel extends MenuModel
{
    public $userName;
    public $password;
    public $confirmPassword;
    public $firstName;
    public $email;
    public $organization;

    public function __construct()
    {
        parent::__construct();
    }

    public function Register(){
        return Database::GetInstance()->Insert(USER_TABLE,
            [$this->userName,
             Utils::Hash($this->password),
             $this->firstName,
             $this->email,
             $this->organization,
                date('Y-m-d H:i:s'),
                0,
                null]);
    }
}