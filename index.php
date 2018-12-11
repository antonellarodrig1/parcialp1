<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once('controller/AppController.php');
require_once('controller/LoginController.php');
require_once('controller/TareaController.php');


require_once('model/repo/PDORepository.php');

require_once('model/repo/UsuarioRepository.php');
require_once('model/repo/TareaRepository.php');
require_once('model/repo/EstadoRepository.php');
require_once('model/repo/CategoriaRepository.php');

require_once('model/entidades/Auth.php');
require_once('model/entidades/Usuario.php');
require_once('model/entidades/Tarea.php');
require_once('model/entidades/Estado.php');
require_once('model/entidades/Categoria.php');

require_once('model/valid/ValidadorGenerico.php');
require_once('model/valid/ValidadorLogin.php');
require_once('model/valid/ValidadorTarea.php');



require_once('view/TwigView.php');
require_once('view/View.php');


if(isset($_GET["action"])){
  if($_GET["action"] == 'formlogin'){
    LoginController::getInstance()->formlogin();
  }
  elseif($_GET["action"] == 'login'){
    LoginController::getInstance()->login();
  }
  elseif($_GET["action"] == 'listar'){
    TareaController::getInstance()->listar();
  }
  elseif($_GET["action"] == 'formadd'){
    TareaController::getInstance()->formadd();
  }
  elseif($_GET["action"] == 'addt'){
    TareaController::getInstance()->addt();
  }
  elseif($_GET["action"] == 'cerrarsesion'){
    LoginController::getInstance()->cerrarsesion();
  }
}

else{
    AppController::getInstance()->home();
}
