<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
require_once './php/Persona.php';
$codigo = $_GET['codigoPersona'];
$persona = Persona::buscarPersona($codigo);
?>
        <form name="editarPersona" action="/php/nuevaPersona.php">
            <input type="hidden" name="codigoPersona" id="codigoPersona" value="<?PHP echo $codigo?>">
        </form>
    </body>
</html>
