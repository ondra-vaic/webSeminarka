<?php


class Submit extends Controller
{
    public function __construct()
    {
        $this->createModel('SubmitModel');
        $this->createView('MenuView', 'Submit');

        if(!Utils::IsLoggedIn()){
            Utils::Redirect('E404');
        }
    }

    public function Submit(){
        if($this->validateInput()){
            if($this->getModel()->SaveFile()){
                if($this->saveSubmission() !== false){
                    $this->getModel()->SetElement('success', 'Submission has been uploaded successfully.');
                    return;
                }
            }
            $this->getModel()->SetElement('errors', [TECHNICAL_FAILURE_MESSAGE]);
        }
    }

    private function validateInput(){
        $errors = [];

        $title = $this->getModel()->title;
        $authors = $this->getModel()->authors;
        $abstract = $this->getModel()->abstract;
        $file = $this->getModel()->file;

        if($title == ''){
            $errors[] = 'Title is missing';
        }

        if($authors == ''){
            $errors[] = 'Author is missing';
        }

        if($abstract == ''){
            $errors[] = 'Abstract is missing';
        }

        if($file !== null){

            if(!Validator::IsPdf($file)){
                $errors[] = 'Uploaded file must be pdf.';
            }

            if(!Validator::IsUploadSize($file)){
                $errors[] = 'Size of the file cannot be greater than 20MB';
            }

            if($file['error'] !== 0){
                $errors[] = TECHNICAL_FAILURE_MESSAGE;
            }
        }
        else{
            $errors[] = 'No file uploaded';
        }

        $this->getModel()->SetElement('errors', $errors);
        return count($errors) == 0;
    }

    private function saveSubmission(){
        return $this->getModel()->SaveSubmission();
    }
}