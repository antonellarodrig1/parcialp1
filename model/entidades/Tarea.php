<?php


class Tarea {

    private $id;
    private $titulo;
    private $categoria_id;
    private $estado_id;
    private $usu_id;


    public function __construct($id, $titulo, $categoria_id, $estado_id, $usu_id) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->categoria_id = $categoria_id;
        $this->estado_id = $estado_id;
        $this->usu_id = $usu_id;

    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function getCategoriaId() {
        return $this->categoria_id;
    }
    public function getCategoria() {
       $cat= CategoriaRepository::getInstance()->getCategoria($this->getCategoriaId());
        return $cat;
    }
    public function getEstadoId() {
        return $this->estado_id;
    }
    public function getEstado() {
       $est= EstadoRepository::getInstance()->getEstado($this->getEstadoId());
        return $est;
    }
    public function getUsuId() {
        return $this->usu_id;
    }

}
