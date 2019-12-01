<?php


class MenuModel extends Model
{
    public function getAuthorization(){
        if(!Utils::IsLoggedIn()){
            return -1;
        }
        return Database::GetInstance()->Select('user', 'rightsId', 'id = ?', [Utils::UserId()]);
    }
}