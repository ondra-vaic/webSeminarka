<?php


class Submissions extends Controller
{
    public function __construct()
    {
        $this->createModel('SubmissionsModel');
        $this->createView('MenuView', 'Submissions');

        if(!Utils::IsLoggedIn()){
            Utils::Redirect('E404');
        }
    }

    public function Delete(){
        if($this->getModel()->DeleteSubmission() !== false){
            Utils::Redirect('Submissions');
        }else{
            $this->getModel()->SetElement('errors', ['Could not delete the submission, please try again.']);
        }
    }

}