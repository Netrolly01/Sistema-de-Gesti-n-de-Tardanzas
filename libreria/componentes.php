<?php

function the_input($nombre, $label, $valor = "", $extra=[]){
    $type = "text";
    $required = "";
    extract($extra);

    return <<<HTML
<div style ="margin: 10px;">
        <label for="{$nombre}">{$label}:</label><br>
        <input {$required} type="{$type}"  style="width: 350px;" value="{$valor}" name="{$nombre}" id="ID">


    </div>

HTML;

}


function guardar_datos_estu($id_estu,$estudiante){

    if(!is_dir("datos")){
        mkdir("datos");
    }


    file_put_contents("datos/{$id_estu}.dat", serialize($estudiante));
}

function cargar_datos_estu($codigo){
    if(!is_file("datos/{$codigo}.dat")){
        return false;
    }

    $datos = file_get_contents("datos/{$codigo}.dat");
    return unserialize($datos);
}

function lista_Dregistro_Destu()
{
    $directorio = "datos";

    
    if (!is_dir($directorio)) {
        return []; 
    }

    $registros = [];

    
    $archivos = scandir($directorio);

    foreach ($archivos as $archivo) {
        if (!is_file("$directorio/{$archivo}")) {
            continue;
        }

        
        $codigo = str_replace(".dat", "", $archivo);

        
        $datos = cargar_datos_estu($codigo);

        if ($datos !== false && is_object($datos)) {
            $registros[$codigo] = $datos;
        }
    }

    
    ksort($registros);

    return $registros;
}

function guardar_datos_asiste($codigo, $datos)
{
    $directorio="datos/data-asistencia";

    
    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }

    
    $resultado = file_put_contents("$directorio/{$codigo}.dat", serialize($datos));

    return $resultado !== false;
}

function cargar_datos_asiste($codigo){
    $rutaArchivo = "datos/data-asistencia/{$codigo}.dat";

    if (!file_exists($rutaArchivo)) {
        echo "❌ Archivo no encontrado: $rutaArchivo<br>";
        return false;
    }

    $contenido = file_get_contents($rutaArchivo);

    if ($contenido === false) {
        echo "❌ Error al leer el archivo: $rutaArchivo<br>";
        return false;
    }


    
    $datos = unserialize($contenido);

    if ($datos === false) {
        echo "❌ Error al deserializar los datos en $rutaArchivo<br>";
        return false;
    }

    return $datos;
}

function lista_Dregistro_Dasiste(){
    $registros = [];

    
    $archivos = scandir("datos/data-asistencia");


    foreach($archivos as $archivo){

       
        if ($archivo == "." || $archivo == "..") {
            continue;
        }

        
        $rutaArchivo = "datos/data-asistencia/{$archivo}";
        if (!is_file($rutaArchivo)) {
            continue;
        }

        
        $datos = cargar_datos_asiste(str_replace(".dat", "", $archivo));

        
        if ($datos === false || $datos === null) {
            echo "Error al cargar datos de {$archivo}<br>";
            continue;
        }

        $registros[] = $datos;
    }

    return $registros;
}
