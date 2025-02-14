<?php

// Función para generar un elemento de entrada HTML
function the_input($nombre, $label, $valor = "", $extra=[]){
    $type = "text"; // Tipo de entrada predeterminado
    $required = ""; // Atributo requerido predeterminado
    extract($extra); // Extraer parámetros adicionales

    return <<<HTML
<div style ="margin: 10px;">
        <label for="{$nombre}">{$label}:</label><br>
        <input {$required} type="{$type}"  style="width: 350px;" value="{$valor}" name="{$nombre}" id="ID">
    </div>
HTML;
}

// Función para guardar datos de estudiante en un archivo
function guardar_datos_estu($id_estu,$estudiante){
    if(!is_dir("datos")){
        mkdir("datos"); // Crear directorio si no existe
    }

    file_put_contents("datos/{$id_estu}.dat", serialize($estudiante)); // Guardar datos serializados en archivo
}

// Función para cargar datos de estudiante desde un archivo
function cargar_datos_estu($codigo){
    if(!is_file("datos/{$codigo}.dat")){
        return false; // Retornar falso si el archivo no existe
    }

    $datos = file_get_contents("datos/{$codigo}.dat"); // Obtener contenido del archivo
    return unserialize($datos); // Deserializar y retornar datos
}

// Función para listar todos los registros de estudiantes
function lista_Dregistro_Destu()
{
    $directorio = "datos";

    if (!is_dir($directorio)) {
        return []; // Retornar arreglo vacío si el directorio no existe
    }

    $registros = [];

    $archivos = scandir($directorio); // Escanear directorio en busca de archivos

    foreach ($archivos as $archivo) {
        if (!is_file("$directorio/{$archivo}")) {
            continue; // Saltar si no es un archivo
        }

        $codigo = str_replace(".dat", "", $archivo); // Eliminar extensión del archivo

        $datos = cargar_datos_estu($codigo); // Cargar datos del estudiante

        if ($datos !== false && is_object($datos)) {
            $registros[$codigo] = $datos; // Agregar al arreglo de registros
        }
    }

    ksort($registros); // Ordenar registros por clave

    return $registros; // Retornar registros
}

// Función para guardar datos de asistencia en un archivo
function guardar_datos_asiste($codigo, $datos)
{
    $directorio="datos/data-asistencia";

    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true); // Crear directorio si no existe
    }

    $resultado = file_put_contents("$directorio/{$codigo}.dat", serialize($datos)); // Guardar datos serializados en archivo

    return $resultado !== false; // Retornar verdadero si fue exitoso
}

// Función para cargar datos de asistencia desde un archivo
function cargar_datos_asiste($codigo){
    $rutaArchivo = "datos/data-asistencia/{$codigo}.dat";

    if (!file_exists($rutaArchivo)) {
        echo "❌ Archivo no encontrado: $rutaArchivo<br>";
        return false; // Retornar falso si el archivo no existe
    }

    $contenido = file_get_contents($rutaArchivo); // Obtener contenido del archivo

    if ($contenido === false) {
        echo "❌ Error al leer el archivo: $rutaArchivo<br>";
        return false; // Retornar falso si hay error al leer el archivo
    }

    $datos = unserialize($contenido); // Deserializar datos

    if ($datos === false) {
        echo "❌ Error al deserializar los datos en $rutaArchivo<br>";
        return false; // Retornar falso si hay error al deserializar datos
    }

    return $datos; // Retornar datos
}

// Función para listar todos los registros de asistencia
function lista_Dregistro_Dasiste(){
    $registros = [];

    $archivos = scandir("datos/data-asistencia"); // Escanear directorio en busca de archivos

    foreach($archivos as $archivo){
        if ($archivo == "." || $archivo == "..") {
            continue; // Saltar entradas de directorio actual y padre
        }

        $rutaArchivo = "datos/data-asistencia/{$archivo}";
        if (!is_file($rutaArchivo)) {
            continue; // Saltar si no es un archivo
        }

        $datos = cargar_datos_asiste(str_replace(".dat", "", $archivo)); // Cargar datos de asistencia

        if ($datos === false || $datos === null) {
            echo "Error al cargar datos de {$archivo}<br>";
            continue; // Saltar si hay error al cargar datos
        }

        $registros[] = $datos; // Agregar al arreglo de registros
    }

    return $registros; // Retornar registros
}
