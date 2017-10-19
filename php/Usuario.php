<?php
include_once __DIR__ . '/Conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author cristian
 */
class Usuario {
    private $codigo;
    private $usuario;
    private $clave;
    private $nivel;
   
    const TABLA = 'usuarios';
    
    function __construct($usuario, $clave, $nivel, $codigo=null) {
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->nivel = $nivel;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

        
    public static function buscarUsuario($usuario, $clave){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE usuario = :usuario AND clave = :clave');
       $consulta->bindParam(':usuario', $usuario);
       $consulta->bindParam(':clave', $clave);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['usuario'], $registro['clave'], $registro['nivel']);
       }else{
          return false;
       }
    }
}
