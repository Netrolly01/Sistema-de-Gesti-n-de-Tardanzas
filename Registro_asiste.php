<?php

require("libreria/motor.php");

$estudiantes = lista_Dregistro_Destu(); 
$asistencia = lista_Dregistro_Dasiste();


Plantilla::aplicar();


$asistencia = new asistencia();




if (isset($_GET["codigo"])) {
   
    $asistencia = cargar_datos_asiste($_GET["codigo"]);

   
    if (!$asistencia) {
        echo "<h1> ⚠️Lo sentimos</h1>";
        echo "<p>Asistencia no encontrada/p>";
        exit;
    }
}
?>


<h1> Registro de Tardanza ⌛ </h1>
<p> Por favor, ingrese los datos necesarios</p>


<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a>
</div>


<form method="post" action="guardar_asiste.php">
    <?php
    
    echo the_input("id_asiste", "ID", $asistencia->id_asiste, ["required" => "required"]);
    echo the_input("fecha", "Fecha de la tardanza", $asistencia->fecha, ["type" => "date"]);
    echo the_input("hora", "Hora de la tardanza", $asistencia->hora, ["type" => "time"]);
    echo the_input("motivo", "Motivo de la tardanza", $asistencia->motivo, ["required" => "required"]);
    ?>


    <label for="id_estud" style="display: block; margin-bottom: 5px;">Seleccionar Estudiante:</label>
    <select name="id_estud" id="id_estud" required style="width: 38%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <option value="">-- Seleccione un estudiante --</option>
        <?php
        if (!empty($estudiantes)) {
            foreach ($estudiantes as $codigo => $estudiante) { // Usa el código como clave
                $nombre = $estudiante->nombre; // Obtener el nombre del estudiante
                $selected = ($asistencia->id_estud == $codigo) ? "selected" : "";
                echo "<option value='{$codigo}' $selected>{$nombre}</option>";
            }
        } else {
            echo "<option value='' disabled>No hay estudiantes disponibles</option>";
        }
        ?>
    </select>

<div>
        <input type="submit" class="boton" value="Guardar">
    </div>
