<?php


class TareaController {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }






    public function listar(){
   if(LoginController::getInstance()->isLogin()){
       $id=LoginController::getInstance()->getIdUsuario();
       $lista = TareaRepository::getInstance()->listar($id);
       $array=array("tareas"=> $lista);
       $view = new View();
       $view->show('list', $array);
       }

  }
  public function formadd(){
    $cat= CategoriaRepository::getInstance()->listAll();
    $array= array("categorias" => $cat);
    $view = new View();
    $view->show('formadd', $array);

  }
  public function addt(){
    if(LoginController::getInstance()->isLogin()){
    $idU=LoginController::getInstance()->getIdUsuario();
    $titulo= $_POST['titulo'];
    $cat=  $_POST['categoria_id'];
    $tarea= new Tarea( null, $titulo, $cat, 1, $idU);
    $val=new ValidadorTarea($tarea);
    if($val->isValid()){
      $tar= TareaRepository::getInstance()->addt($tarea);
     $array=array("auth"=>true);
    }
    else{
      $array=array("auth"=>true,
                  "errors"=>$val->getErrors());
    }
    $view = new View();
    $view->show('home', $array);

   }
 }

}
