<?php


class SubmitModel extends MenuModel
{
    public $title;
    public $authors;
    public $abstract;
    public $file = null;

    private $file_new_name;

    public function __construct()
    {
        parent::__construct();
        $this->title = Utils::Sanitaze(Utils::SafePost('title'));
        $this->authors = Utils::Sanitaze(Utils::SafePost('authors'));
        $this->abstract = Utils::Sanitaze(Utils::SafePost('abstract'));

        $this->file = isset($_FILES['pdf']) ? $_FILES['pdf'] : null;
        if($this->file !== null)
        {
            $this->file = $_FILES['pdf']['error'] != 4 ? $_FILES['pdf'] : null;
        }
    }

    public function SaveFile(){
        $this->file_new_name = uniqid('', true) . '.pdf';
        return move_uploaded_file($this->file['tmp_name'],  UPLOADS . '/' . $this->file_new_name);
    }

    public function SaveSubmission(){
        return Database::GetInstance()->Insert(SUBMISSIONS_TABLE,
            [$this->title,
                $this->authors,
                $this->abstract,
                $this->file_new_name,
                $this->file['name'],
                Utils::UserId(),
                null]);
    }


}