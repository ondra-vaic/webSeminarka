<?php


class AssignToReview extends Controller
{
    public function __construct()
    {
        $this->createModel('AssignToReviewModel');
        $this->createView('MenuView', 'AssignToReview');

        if(!Utils::IsLoggedIn() || Utils::GetAuthorization() != 2){
            Utils::Redirect('E404');
        }
    }
}