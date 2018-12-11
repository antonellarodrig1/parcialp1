<?php


class LoginController {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }


  public function getIdUsuario(){
    $this->startS();
    $usu=$_SESSION['username'];
    $clave=$_SESSION['password'];
    $id=UsuarioRepository::getInstance()->getId($usu, $clave);
    return $id;

  }

    public function formlogin(){
        $view = new View();
        $view->show('formlogin');
    }

    public function startS(){
      if(session_id() == ""){
        session_start();
      }
    }
    public function destroyS(){
      $this->startS();
      session_unset();
      session_destroy();
    }
    public function isLogin(){
      $this->startS();
      return (isset($_SESSION['username']));
    }

    public function login(){
      $usu=$_POST['usuario'];
      $clave= $_POST['clave'];
      $auth= new Auth($usu, $clave);
      $valid= new ValidadorLogin($auth);
      $view = new View();
      if($valid->isValid()){
        $this->startS();
        $_SESSION['username']= $auth->getUsuario();
        $_SESSION['password']= $auth->getClave();
        $array=array("auth"=> true);
        $view->show('home',$array);
      }
      else{
        $array= array("errors"=> $valid->getErrors());
        $view->show('home',$array);
      }
    }
    public function cerrarsesion(){
      $this->destroyS();
      $array= array("auth"=> false);
      $view = new View();
      $view->show('home', $array);
    }

}
