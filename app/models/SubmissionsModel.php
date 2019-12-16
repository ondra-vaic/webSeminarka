<?php


class SubmissionsModel extends MenuModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadSubmissions();
    }

    public function DeleteSubmission(){
        if(!ctype_digit(Utils::SafePost('submissionToDeleteId')))
        {
            return false;
        }
        $submissionId = intval(Utils::SafePost('submissionToDeleteId'));

        if(Validator::IsUsersSubmission($submissionId)){
            $this->deletePdf($submissionId);

            return Database::GetInstance()->Remove(
                SUBMISSIONS_TABLE, 'id = ?', [$submissionId]);
        }

        return false;
    }

    private function loadSubmissions(){
        $submissions = Database::GetInstance()->Select(
            SUBMISSIONS_TABLE, '*', 'userId = ?', [Utils::UserId()]);

        $this->data['submissions'] = $submissions;
    }

    private function deletePdf($submissionId){
        $fileName = Database::GetInstance()->Select(
            SUBMISSIONS_TABLE, 'fileName', 'id = ?', [$submissionId]);

        if(isset($fileName[0])){
            unlink(UPLOADS . '/' . $fileName[0]->fileName);
        }
    }
}