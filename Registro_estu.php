<?php

// Se requiere el archivo motor.php que contiene funciones y clases necesarias
require("libreria/motor.php");

// Se aplica la plantilla definida en la clase Plantilla
Plantilla::aplicar();

// Se crea una instancia de la clase estudiantes
$estudiante = new estudiantes();

// Se verifica si se ha recibido un código a través de la URL
if (isset($_GET["codigo"])) {
    
    // Se cargan los datos del estudiante correspondiente al código recibido
    $estudiante = cargar_datos_estu($_GET["codigo"]);

    // Si no se encuentra el estudiante, se muestra un mensaje de error y se detiene la ejecución
    if (!$estudiante) {
        echo "<h1> ⚠️Lo sentimos</h1>";
        echo "<p>El estudiantes no existe</p>";
        exit;
    }
}
?>

<!-- Título de la página -->
<h1> Registro de Estudiante </h1>
<p> Por favor, ingrese los datos necesarios</p>

<!-- Enlace para volver a la página de inicio -->
<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a>
</div>

<!-- Formulario para ingresar los datos del estudiante -->
<form method="post" action="guardar_estu.php">
    <?php
    // Se generan los campos del formulario con los datos del estudiante
    echo the_input("id_estu", "Matricula", $estudiante->id_estu, ["required" => "required"]);
    echo the_input("nombre", "Nombre", $estudiante->nombre, ["required" => "required"]);
    echo the_input("apellido", "Apellido", $estudiante->apellido, ["required" => "required"]);
    echo the_input("curso", "Curso", $estudiante->curso, ["required" => "required"]);
    ?>
    
    <!-- Botón para enviar el formulario -->
    <div>
        <input type="submit" class="boton" value="Guardar">
    </div>
</form>