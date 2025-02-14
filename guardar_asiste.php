<?php
require("libreria/motor.php");


$id_estud = $_POST['id_estud'] ?? '';


$estudiantes = lista_Dregistro_Destu();


$apellido = isset($estudiantes[$id_estud]) ? $estudiantes[$id_estud]->apellido : '';


$nombre = isset($estudiantes[$id_estud]) ? $estudiantes[$id_estud]->nombre : '';



$asistencia = new asistencia();
$asistencia -> id_asiste = $_POST["id_asiste"];
$asistencia -> id_estud = $id_estud;
$asistencia -> nombre = $nombre;
$asistencia -> apellido = $apellido;
$asistencia -> fecha = $_POST["fecha"];
$asistencia -> hora = $_POST["hora"];
$asistencia -> motivo = $_POST["motivo"];






guardar_datos_asiste($asistencia->id_asiste, $asistencia);



plantilla::aplicar();
?>

<h1> 📀Tardanza registrada </h1>

<div class="d-derecha">
    <a href="index.php" class="boton">Volver</a>
</div>


