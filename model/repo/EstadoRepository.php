<?php


class EstadoRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }

    public function getEstado($id){
      $array=array("$id");
      $answer = $this->queryList("select * from estado where id= ? ;", $array);
      return $answer[0]['nombre'];
    }

    public function listAll() {
        $answer = $this->queryList("select * from estado");
        $final_answer = [];
        foreach ($answer as &$element) {
            $final_answer[] = new Estado($element['id'],$element['nombre']);
        }
        return $final_answer;
    }

}
