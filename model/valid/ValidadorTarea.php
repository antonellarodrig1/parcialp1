<?php



class ValidadorTarea extends ValidadorGenerico {

  private $task;

  public  function __construct(Tarea $task) {
    $this->task= $task;
  }

  public function isValid(){
    if($this->existe()){
      return false;
    }
    else {
      return true;
    }
  }


  public function existe(){
    $titulo= $this->task->getTitulo();
    if (LoginController::getInstance()->isLogin()){
      $existe= TareaRepository::getInstance()->existe($titulo);
      if($existe){
          $this->addError("la tarea ya existe");
          return true;

    }

    }
    else{
      return false;

    }
  }
}
