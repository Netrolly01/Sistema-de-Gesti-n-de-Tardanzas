<?php
require("libreria/motor.php");


$estudiante = new estudiantes();
$estudiante -> id_estu = $_POST["id_estu"];
$estudiante -> nombre = $_POST["nombre"];
$estudiante -> apellido = $_POST["apellido"];
$estudiante -> curso = $_POST["curso"];




guardar_datos_estu($estudiante->id_estu, $estudiante);


plantilla::aplicar();
?>

<h1> 📀Estudiante guardados </h1>

<div class="d-derecha">
    <a href="index.php" class="boton">Volver</a>
</div>


