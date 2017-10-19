<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once './Usuario.php';

$usuario = $_POST['usuario'];
$clave =  $_POST['clave'];

$usuario = Usuario::buscarUsuario($usuario, $clave);
if($usuario){
    $_SESSION['usuario'] = $usuario->getUsuario();
    $_SESSION['clave'] = $usuario->getClave();
    echo $usuario->getUsuario();
     header('Location: ../listaPersona.php');
}else{
    //error
}
