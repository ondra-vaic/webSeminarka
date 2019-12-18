<?php


class SetRightsModel extends MenuModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadUsers();
    }

    private function loadUsers(){
        $users = Database::GetInstance()->RunQuery(
            'SELECT ' . USER_TABLE . '.username, ' . USER_TABLE . '.id, ' . USER_TABLE . '.email, ' . RIGHTS_TABLE . '.tag
            FROM ' . USER_TABLE . ' JOIN ' . RIGHTS_TABLE . ' ON '.
            USER_TABLE . '.rightsId = ' . RIGHTS_TABLE . '.id', []);

        $this->data['users'] = $users;
    }

    public function SetRights($userId, $rightsId){
        return Database::GetInstance()->RunQuery('UPDATE ' . USER_TABLE . ' SET rightsId = ' . $rightsId . ' WHERE id = ?',  [$userId]);
    }
}