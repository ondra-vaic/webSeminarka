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

    public static function IsLoggedIn(){
        if(isset($_SESSION['userId'])){
           return $_SESSION['userId'] >= 0;
        }

        return false;
    }

    public static function UserId(){
        return $_SESSION['userId'];
    }

    public static function GetUserName(){
        if(self::IsLoggedIn()){
            return Database::GetInstance()->Select(USER_TABLE, 'username', 'id = ?', [self::UserId()])[0]->username;
        }
        return "";
    }

    public static function GetAuthorizationTag($rightsId){
        if(self::IsLoggedIn()) {
            return Database::GetInstance()->Select(RIGHTS_TABLE, 'tag', 'rightsId = ?', [$rightsId])[0]->tag;
        }
        return "visitor";
    }

    public static function GetUserByUserName($userName){
        return Database::GetInstance()->Select(USER_TABLE, '*', 'username = ?', [$userName]);
    }

    public static function GetAuthorization(){
        if(!Utils::IsLoggedIn()){
            return -1;
        }

        $rightsId = Database::GetInstance()->Select(USER_TABLE, 'rightsId', 'id = ?', [Utils::UserId()])[0]->rightsId;
        return Database::GetInstance()->Select(RIGHTS_TABLE, 'rightsId', 'id = ?', [$rightsId])[0]->rightsId;
    }

    public static function GetIdOfRightsId($rights){
        return Database::GetInstance()->Select(RIGHTS_TABLE, 'id', 'rightsId = ?', [$rights])[0]->id;
    }

    public static function Redirect($url){
        header('Location: /' . ROOT . '/' . $url);
    }

    public static function Hash($string){
        return password_hash($string, PASSWORD_DEFAULT);
    }

    public static function ClearNulls(&$errors){
        for($i = count($errors) - 1; $i >= 0; $i--){
            if($errors[$i] === null){
                unset($errors[$i]);
            }
        }
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