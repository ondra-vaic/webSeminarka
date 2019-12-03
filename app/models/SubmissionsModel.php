<?php


class SubmissionsModel extends MenuModel
{
    private $submissions;
    public function __construct()
    {
        parent::__construct();
        $this->loadSubmissions();
    }

    public function DeleteSubmission(){
        $submissionId = intval(Utils::SafePost('submissionToDeleteId'));
        if(Validator::IsUsersSubmission($submissionId)){
            $this->deletePdf($submissionId);

            return Database::GetInstance()->Remove(
                SUBMISSIONS_TABLE, 'id = ?', [$submissionId]);
        }

        return false;
    }

    private function loadSubmissions(){
        $this->submissions = Database::GetInstance()->Select(
            SUBMISSIONS_TABLE, '*', 'userId = ?', [Utils::UserId()]);

        $this->data['submissions'] = $this->submissions;
    }

    private function deletePdf($submissionId){
        $fileName = Database::GetInstance()->Select(
            SUBMISSIONS_TABLE, 'fileName', 'id = ?', [$submissionId]);

        if(isset($fileName[0])){
            unlink(UPLOADS . '/' . $fileName[0]->fileName);
        }
    }
}