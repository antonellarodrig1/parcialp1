<?php


class CategoriaRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }
    public function getCategoria($id){
      $array=array("$id");
      $answer = $this->queryList("select * from categoria where id= ? ;", $array);
      return $answer[0]['nombre'];
    }

    public function listAll() {
        $answer = $this->queryList("select * from categoria");
        $final_answer = [];
        foreach ($answer as &$element) {
            $final_answer[] = new Categoria($element['id'], $element['nombre'] );
        }
        return $final_answer;
    }


}
