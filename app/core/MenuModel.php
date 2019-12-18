<?php


class MenuModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['authorization'] = Utils::GetAuthorization();
        $this->data['authorizationTag'] = Utils::GetAuthorizationTag($this->data['authorization']);
        $this->data['name'] = Utils::GetUserName();
    }
}