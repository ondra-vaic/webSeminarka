<?php


class Validator
{
    public static function ValidateUserNameUsed($userName){
        $user = Utils::GetUserByUserName($userName);
        return $user !== null ? 'User name is already used' : null;
    }

    public static function ValidateSignInInfo($userName, $password){
        $user = Utils::GetUserByUserName($userName);

        if(isset($user[0])){
            if(password_verify($password, $user[0]->password)){
                return $user[0]->id;
            }
        }

        return -1;
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