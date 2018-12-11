<?php


class Auth {

    private $usuario;
    private $clave;


    public function __construct($usuario, $clave) {
        $this->usuario = $usuario;
        $this->clave = $clave;


    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

}
