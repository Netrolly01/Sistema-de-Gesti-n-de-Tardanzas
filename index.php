<!--Netanel De Jesus 20231103-->

<?php

require("libreria/motor.php");


Plantilla::aplicar();


$estudiantes = lista_Dregistro_Destu();  
$asistencias = lista_Dregistro_Dasiste(); 

?>


<h1>Gestion de tardanzas</h1>

<p>Por medio de este sistema se registrarán las tardanzas de los estudiantes.</p>



<div class="text-registro">
    <a href="Registro_estu.php" class="boton">Registro de Estudiantes🧑🏿‍🎓</a>
    <a href="Registro_asiste.php" class="boton">Registro de Tardanza🕔</a>
</div>



<div class="table-container">
    <h2>📋 Registro de Asistencia</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curso</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
                <th>Editar 🖊️</th>
                <th>Editar  🖋️</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            
            foreach ($asistencias as $asistencia): 
                // Buscar el estudiante correspondiente a la asistencia
                $estudiante = null;
                foreach ($estudiantes as $e) {
                    if ($e->id_estu == $asistencia->id_estud) {
                        $estudiante = $e;
                        break;
                    }


                }
            ?>
                <tr>
                    <td><?= htmlspecialchars($asistencia->id_estud) ?></td>
                    <td><?= htmlspecialchars($estudiante ? $estudiante->nombre : 'Desconocido') ?></td>
                    <td><?= htmlspecialchars($estudiante ? $estudiante->apellido : 'Desconocido') ?></td>
                    <td><?= htmlspecialchars($estudiante ? $estudiante->curso : 'Desconocido') ?></td>
                    <td><?= htmlspecialchars($asistencia->fecha) ?></td>
                    <td><?= htmlspecialchars($asistencia->hora) ?></td>
                    <td><?= htmlspecialchars($asistencia->motivo) ?></td>
                    <td><a href='Registro_estu.php?codigo=<?= htmlspecialchars($estudiante->id_estu) ?>'>Detalles Estudiantes</a></td>
                    <td><a href='Registro_asiste.php?codigo=<?= htmlspecialchars($asistencia->id_asiste) ?>'>Detalles Asistencia</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<main>
    <section class="home">

    </section>
</main>
<footer>

</footer>