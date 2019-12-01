<?php


class Submissions extends MenuController
{
    public function __construct()
    {
        $this->createModel('SubmissionsModel');
        $this->createView('MenuView', 'Submissions');
        $this->initMenu();

        if(!Utils::IsLoggedIn()){
            Utils::Redirect('E404');
        }
    }


}