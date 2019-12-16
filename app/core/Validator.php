<?php


class Validator
{
    public static function ValidateSignInInfo($userName, $password){
        $user = Utils::GetUserByUserName($userName);

        if(isset($user[0])){
            if(password_verify($password, $user[0]->password)){
                return $user[0]->id;
            }
        }

        return -1;
    }

    public static function IsUsersSubmission($submissionId){
        $userId = Database::GetInstance()->Select(
            SUBMISSIONS_TABLE, 'userId', 'id = ?', [$submissionId]);

        if(!isset($userId[0]))
            return false;

        return $userId[0]->userId === Utils::UserId();
    }

    public static function IsPdf($file){
        return $file['type'] == "application/pdf";
    }

    public static function IsUploadSize($file){
        return $file['size'] < MAX_UPLOAD_SIZE;
    }

    public static function ValidateInputLength($fieldName, $string, $min, $max){
        $stringLength = strlen($string);

        if($stringLength > $max)
            return $fieldName . ' cannot be more than ' . $max . ' characters long.';

        if($stringLength < $min)
            return $fieldName . ' must be at least ' . $min . ' characters long.';

        return null;
    }
}