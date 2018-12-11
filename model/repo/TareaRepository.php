<?php


class TareaRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

    }
    public function addt($tarea){
      $id= $tarea->getId();
      $titulo=$tarea->getTitulo();
      $cat= $tarea->getCategoriaId();
      $est= $tarea->getEstadoId();

      $usu= $tarea->getUsuId();
      $array= array("$id", "$titulo", "$cat", "$est", "$usu");
      $answer = $this->queryList("INSERT INTO tarea(id, titulo, categoria_id, estado_id, usuario_id) VALUES(?, ?, ?, ?, ?) ;", $array);

}
  public function listar($id) {
        $array=array("$id");
        $answer = $this->queryList("select * from tarea where usuario_id=? ;", $array);
        $final_answer = [];
        foreach ($answer as &$element) {
            $final_answer[] = new Tarea($element['id'], $element['titulo'], $element['categoria_id'], $element['estado_id'], $element['usuario_id']);
        }
        return $final_answer;
    }


    public function existe($titulo){
      $array= array("$titulo");
      $answer = $this->queryList("select * from tarea where titulo= ? ;", $array);
      return (count($answer ) > 0 );

    }
}
