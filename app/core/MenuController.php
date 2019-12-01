<?php


class MenuController extends Controller
{
    public function LogOut(){
        $_SESSION['userId'] = -1;
        Utils::Redirect('Home');
    }

    protected function initMenu()
    {
        $this->getModel()->SetElement('data', ['currentTab' => get_class($this),
                                                'authorization' => $this->getModel()->getAuthorization()]);
    }
}