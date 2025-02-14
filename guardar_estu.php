<?php
// Requiere el archivo motor.php que contiene funciones y clases necesarias
require("libreria/motor.php");

// Crea una nueva instancia de la clase estudiantes
$estudiante = new estudiantes();

// Asigna los valores recibidos por POST a las propiedades del objeto estudiante
$estudiante -> id_estu = $_POST["id_estu"];
$estudiante -> nombre = $_POST["nombre"];
$estudiante -> apellido = $_POST["apellido"];
$estudiante -> curso = $_POST["curso"];

// Llama a la función guardar_datos_estu para guardar los datos del estudiante
guardar_datos_estu($estudiante->id_estu, $estudiante);

// Aplica la plantilla (posiblemente para renderizar la vista)
plantilla::aplicar();
?>

<!-- Muestra un mensaje indicando que los datos del estudiante han sido guardados -->
<h1> 📀Estudiante guardados </h1>

<!-- Proporciona un enlace para volver a la página principal -->
<div class="d-derecha">
    <a href="index.php" class="boton">Volver</a>
</div>
