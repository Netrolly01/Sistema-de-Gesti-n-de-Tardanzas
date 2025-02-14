<?php

require("libreria/motor.php");


Plantilla::aplicar();


$estudiante = new estudiantes();


if (isset($_GET["codigo"])) {
    
    $estudiante = cargar_datos_estu($_GET["codigo"]);

    
    if (!$estudiante) {
        echo "<h1> ⚠️Lo sentimos</h1>";
        echo "<p>El estudiantes no existe</p>";
        exit;
    }
}
?>


<h1> Registro de Estudiante </h1>
<p> Por favor, ingrese los datos necesarios</p>


<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a>
</div>


<form method="post" action="guardar_estu.php">
    <?php
   
    echo the_input("id_estu", "Matricula", $estudiante->id_estu, ["required" => "required"]);
    echo the_input("nombre", "Nombre", $estudiante->nombre, ["required" => "required"]);
    echo the_input("apellido", "Apellido", $estudiante->apellido, ["required" => "required"]);
    echo the_input("curso", "Curso", $estudiante->curso, ["required" => "required"]);
    ?>
    
    <div>
        <input type="submit" class="boton" value="Guardar">
    </div>
  