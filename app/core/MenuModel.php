<?php


class MenuModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['authorization'] = Utils::GetAuthorization();
    }
}