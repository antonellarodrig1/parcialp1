<?php
abstract class ValidadorGenerico {

  private $errors= [];

  public function getErrors(){
    return $this->errors;
  }
public function  addError($error){
    array_push($this->errors, $error);
  }
  abstract function isValid();

}
