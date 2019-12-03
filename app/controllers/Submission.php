<?php


class Submission extends Controller
{
    public function __construct()
    {
        $this->createModel('SubmissionModel');
        $this->createView('MenuView', 'Submission');

        if(!Utils::IsLoggedIn()){
            Utils::Redirect('E404');
        }
    }

    public function ShowSubmission($id=-1){
        if(!$this->getModel()->LoadArticle(intval($id))){
            Utils::Redirect('E404');
        }
    }

    public function Download($id=-1){
        if(!$this->getModel()->LoadArticle(intval($id))){
            Utils::Redirect('E404');
        }

        $fileName = $this->getModel()->GetData()['submission']->fileName;
        $aliasName = $this->getModel()->GetData()['submission']->aliasName;


        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=" . $aliasName);
        readfile(UPLOADS . '/' . $fileName);
    }
}