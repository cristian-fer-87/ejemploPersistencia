<?php
require_once './Persona.php';

$codigo = $_GET['codigoPersona'];

Persona::borrarPersona($codigo);
header('Location: ../listaPersona.php');

