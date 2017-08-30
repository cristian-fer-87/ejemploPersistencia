
<!doctype html>
<html>
<head>
<meta charset="utf-8"> 

<title>Persona</title>
</head>

<body>
    <h1>Nueva Persona</h1>
    <form name="persona" method="post" action="php/nuevaPersona.php">

      <label for="nombre">Nombre:</label><br>
      <input type="text" name="nombre"><br>
      <label for="apellido">Apellido:</label><br>
      <input type="text" name="apellido">
      <br><br>
        <input type="reset" name="borrar" id="borrar" value="Borrar" class="boton">
        <input type="submit" name="guardar" id="guardar" value="Guardar" class="boton">
    </form>

</body>
</html>
