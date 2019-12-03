<?php


class SubmissionModel extends MenuModel
{
    public function LoadArticle($id){

        if(Validator::IsUsersSubmission($id)){
            $submission = Database::GetInstance()->Select(SUBMISSIONS_TABLE,
                'abstract, author, fileName, aliasName, title, id', 'id = ?', [$id]);
            if($submission != false){
                $this->data['submission'] = $submission[0];
                return true;
            }
        }

        return false;
    }
}