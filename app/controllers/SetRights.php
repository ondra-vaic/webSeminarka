<?php


class SetRights extends Controller
{
    public function __construct()
    {
        $this->createModel('SetRightsModel');
        $this->createView('MenuView', 'SetRights');

        if(!Utils::IsLoggedIn() || Utils::GetAuthorization() != 2){
            Utils::Redirect('E404');
        }
    }

    public function SetUserRight($id){
        $this->SetRight($id, Utils::GetIdOfRightsId(0));
    }

    public function SetReviewerRight($id){
        $this->SetRight($id, Utils::GetIdOfRightsId(1));
    }

    public function SetRight($id, $rightsId){
        if(ctype_digit($id))
        {
            if($this->getModel()->SetRights($id, $rightsId) !== false){
                Utils::Redirect('SetRights');
                return;
            }
        }
        $this->getModel()->SetElement('errors', ['Could not set right, please try again.']);
    }
}