<?php


class UsuarioRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }
public function getId($usu, $clave){
  $array= array("$usu", "$clave");
  $answer = $this->queryList("select * from usuario where usuario= ? and clave= ? ;", $array);
  return $answer[0]['id'];

}

    public function existe($usu, $clave){
      $array= array("$usu", "$clave");
      $answer = $this->queryList("select * from usuario where usuario= ? and clave= ? ;", $array);
      return (count($answer ) > 0 );

    }

    public function listAll() {
        $answer = $this->queryList("select * from usuarios");
        $final_answer = [];
        foreach ($answer as &$element) {
            $final_answer[] = new Usuario($element['id'], $element['usuario'], $element['clave'], $element['nombre'], $element['apellido'], $element['mail'] );
        }
        return $final_answer;
    }

}
