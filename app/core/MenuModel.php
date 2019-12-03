<?php


class MenuModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['authorization'] = $this->GetAuthorization();
    }

    public function GetAuthorization(){
        if(!Utils::IsLoggedIn()){
            return -1;
        }
        return Database::GetInstance()->Select('user', 'rightsId', 'id = ?', [Utils::UserId()]);
    }
}