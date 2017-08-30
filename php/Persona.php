<?php
include_once __DIR__ . '/Conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 
 *
 * @author cristian
 */
class Persona {
    private $codigo;
    private $nombre;
    private $apellido;
    const TABLA = 'personas';
    
    function __construct($nombre, $apellido, $codigo = null) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function guardarPersona() {
        $conexion = new Conexion();
        if ($this->codigo)/* Editar Registro */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, apellido = :apellido WHERE codigo = :codigo');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':codigo', $this->codigo);
            $consulta->bindParam(':apellido', $this->apellido);
            
            $consulta->execute();
        } else /* Nuevo Objeto */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, apellido) VALUES (:nombre, :apellido)');
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            
            $consulta->execute();
            $this->codigo = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    public static function borrarPersona($codigo){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .' WHERE codigo = :codigo');
        $consulta->bindParam(':codigo', $codigo);
        $consulta->execute();
        $conexion = null;
    }
    
    public static function traerPersonas(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY codigo DESC');
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
    
    public static function buscarPersona($codigo){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE codigo = :codigo');
       $consulta->bindParam(':codigo', $codigo);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
          return new self($registro['nombre'], $registro['apellido'], $registro['codigo']);
       }else{
          return false;
       }
    }
}
