<?php
    session_start();
    if(empty($_SESSION['usuario'])) {
        include_once './iniciarSesion.html';
    }else {
?>
<html>
<head>
</head>
<body>
    <p>Bienvenido <?PHP echo $_SESSION['usuario']?>, <a href="php/logout.php">cerrar sesion</a></p>
<a href="index.php">Alta Persona</a>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?PHP
require_once './php/Persona.php';
$personas = Persona::traerPersonas();
foreach($personas as $persona):
    echo '<tr>';
    echo '<td>'.$persona['nombre'].'</td>';
    echo '<td>'.$persona['apellido'].'</td>';
    echo '<td>';
    echo "<a href='editarPersona.php?codigoPersona=".$persona['codigo']."'>Editar</a>";
    echo ' - ';
    echo "<a href='php/borrarPersona.php?codigoPersona=".$persona['codigo']."'>Borrar</a>";
    echo '</td>';
    echo '<tr>';
endforeach;
?>
    </tbody>
</table>

</body>
</html>
<?PHP
    }