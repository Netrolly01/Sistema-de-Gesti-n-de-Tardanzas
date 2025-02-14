<?php

require("libreria/motor.php"); // Se incluye el archivo motor.php que contiene funciones y clases necesarias

$estudiantes = lista_Dregistro_Destu(); // Se obtiene la lista de estudiantes
$asistencia = lista_Dregistro_Dasiste(); // Se obtiene la lista de asistencias

Plantilla::aplicar(); // Se aplica la plantilla

$asistencia = new asistencia(); // Se crea una nueva instancia de la clase asistencia

if (isset($_GET["codigo"])) { // Se verifica si se ha pasado un código por la URL
    $asistencia = cargar_datos_asiste($_GET["codigo"]); // Se cargan los datos de la asistencia correspondiente al código

    if (!$asistencia) { // Si no se encuentra la asistencia
        echo "<h1> ⚠️Lo sentimos</h1>"; // Se muestra un mensaje de error
        echo "<p>Asistencia no encontrada/p>"; // Se muestra un mensaje de error
        exit; // Se detiene la ejecución del script
    }
}
?>

<h1> Registro de Tardanza ⌛ </h1> <!-- Título de la página -->
<p> Por favor, ingrese los datos necesarios</p> <!-- Descripción de la página -->

<div class="d-derecha">
    <a href="index.php" class="boton">Inicio</a> <!-- Enlace a la página de inicio -->
</div>

<form method="post" action="guardar_asiste.php"> <!-- Formulario para guardar la asistencia -->
    <?php
    // Campos del formulario con los datos de la asistencia
    echo the_input("id_asiste", "ID", $asistencia->id_asiste, ["required" => "required"]);
    echo the_input("fecha", "Fecha de la tardanza", $asistencia->fecha, ["type" => "date"]);
    echo the_input("hora", "Hora de la tardanza", $asistencia->hora, ["type" => "time"]);
    echo the_input("motivo", "Motivo de la tardanza", $asistencia->motivo, ["required" => "required"]);
    ?>

    <label for="id_estud" style="display: block; margin-bottom: 5px;">Seleccionar Estudiante:</label> <!-- Etiqueta para el campo de selección de estudiante -->
    <select name="id_estud" id="id_estud" required style="width: 38%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"> <!-- Campo de selección de estudiante -->
        <option value="">-- Seleccione un estudiante --</option> <!-- Opción por defecto -->
        <?php
        if (!empty($estudiantes)) { // Si hay estudiantes disponibles
            foreach ($estudiantes as $codigo => $estudiante) { // Se recorre la lista de estudiantes
                $nombre = $estudiante->nombre; // Se obtiene el nombre del estudiante
                $selected = ($asistencia->id_estud == $codigo) ? "selected" : ""; // Se selecciona el estudiante correspondiente
                echo "<option value='{$codigo}' $selected>{$nombre}</option>"; // Se muestra la opción del estudiante
            }
        } else {
            echo "<option value='' disabled>No hay estudiantes disponibles</option>"; // Si no hay estudiantes disponibles
        }
        ?>
    </select>

    <div>
        <input type="submit" class="boton" value="Guardar"> <!-- Botón para enviar el formulario -->
    </div>
</form>
