<?php


class Model
{
    protected $data = [];

    public function __construct(){}

    public function GetData(){
        return $this->data;
    }

    public function SetElement($key, $value){
        $this->data[$key] = $value;
    }
}