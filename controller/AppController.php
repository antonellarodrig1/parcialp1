<?php


class AppController {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }



    public function home(){
      if(LoginController::getInstance()->isLogin()){
        $array=array("auth"=>true);
      }
      else{
        $array=array("auth"=>false);
      }
     $view = new View();
     $view->show('home', $array);
    }

}
