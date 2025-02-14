<?php
require("libreria/motor.php"); // Se incluye el archivo motor.php que contiene funciones y clases necesarias

$id_estud = $_POST['id_estud'] ?? ''; // Se obtiene el id del estudiante desde el formulario, si no existe se asigna una cadena vacía

$estudiantes = lista_Dregistro_Destu(); // Se obtiene la lista de estudiantes registrados

$apellido = isset($estudiantes[$id_estud]) ? $estudiantes[$id_estud]->apellido : ''; // Se obtiene el apellido del estudiante si existe en la lista

$nombre = isset($estudiantes[$id_estud]) ? $estudiantes[$id_estud]->nombre : ''; // Se obtiene el nombre del estudiante si existe en la lista

$asistencia = new asistencia(); // Se crea una nueva instancia de la clase asistencia
$asistencia -> id_asiste = $_POST["id_asiste"]; // Se asigna el id de asistencia desde el formulario
$asistencia -> id_estud = $id_estud; // Se asigna el id del estudiante
$asistencia -> nombre = $nombre; // Se asigna el nombre del estudiante
$asistencia -> apellido = $apellido; // Se asigna el apellido del estudiante
$asistencia -> fecha = $_POST["fecha"]; // Se asigna la fecha desde el formulario
$asistencia -> hora = $_POST["hora"]; // Se asigna la hora desde el formulario
$asistencia -> motivo = $_POST["motivo"]; // Se asigna el motivo desde el formulario

guardar_datos_asiste($asistencia->id_asiste, $asistencia); // Se guarda la asistencia en la base de datos

plantilla::aplicar(); // Se aplica la plantilla para mostrar la página

?>

<h1> 📀Tardanza registrada </h1> <!-- Mensaje de confirmación -->

<div class="d-derecha">
    <a href="index.php" class="boton">Volver</a> <!-- Enlace para volver a la página principal -->
</div>
