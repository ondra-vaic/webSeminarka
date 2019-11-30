<?php


class Utils
{
    public static function Sanitaze($string){
        return trim(strip_tags($string));
    }

    public static function SafePost($key){
        if(isset($_POST[$key]))
            return $_POST[$key];

        return '';
    }

    public static function GetUserByUserName($userName){
        return Database::GetInstance()->Select(USER_TABLE, '*', 'username = ?', [$userName]);
    }

    public static function Redirect($url){
        header('Location: /' . ROOT . '/' . $url);
    }

    public static function Hash($string){
        return password_hash($string, PASSWORD_DEFAULT);
    }

    public static function GetNQuestionMarks($n){
        $questionMarks = '';
        for ($i = 0; $i < $n; $i++){
            $questionMarks .= '?';
            if($i != $n - 1){
                $questionMarks .= ', ';
            }
        }
        return $questionMarks;
    }


}