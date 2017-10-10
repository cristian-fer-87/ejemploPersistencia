<html>
<head>
</head>
<body>
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