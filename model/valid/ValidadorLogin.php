<?php


class ValidadorLogin extends ValidadorGenerico {

  private $auth;

  public  function __construct(Auth $auth) {
    $this->auth= $auth;
  }

  public function isValid(){
    if($this->completo() && $this->existe()){
      return true;
    }
    else {
      return false;
    }
  }
  public function completo(){
    if($this->auth->getUsuario() == null || $this->auth->getUsuario() == "" || $this->auth->getClave() == null || $this->auth->getClave() == "" ){
      $this->addError("los campos deben estar completos");
      return false;
    }
    else{
      return true;
    }
  }

  public function existe(){
    $usu= $this->auth->getUsuario();
    $clave= $this->auth->getClave();
    $existe= UsuarioRepository::getInstance()->existe($usu, $clave );
    if($existe){
      return true;
    }
    else{
      $this->addError("El Usuario o Contraseña son invalidos");
      return false;
    }
  }
}
