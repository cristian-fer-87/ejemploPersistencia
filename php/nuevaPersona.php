<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once './Persona.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];


if(isset($_POST['codigoPersona'])){
    $codigo = $_POST['codigoPersona'];
    $persona = new Persona($nombre, $apellido, $codigo);
    $persona->guardarPersona();
    header ('Location: ../listaPersona.php');
}else{
    $persona = new Persona($nombre, $apellido);
    $persona->guardarPersona();
    header ('Location: ../listaPersona.php');
    
}

