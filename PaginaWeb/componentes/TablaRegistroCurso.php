<?php

    require_once "../php/conexion.php";
    $conexion = conexion();

?>

<div class="row">
    <div class="col-sm-12">
        <h2>REGISTRO DE CURSOS DE FORMACIÓN DOCENTE Y ACTUALIZACIÓN PROFESIONAL</h2>
        <caption>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                Agregar nuevo
                <span class="fas fa-plus"></span>
            </button>
        </caption>
        <table class="table table-hover table-condensed table-bordered table-striped white-background">


            <tr>
                <td>Nombre de curso</td>
                <td>Periodo</td>
                <td>Horas de capacitacion</td>
                <td>Numero de participantes Base</td>
                <td>Numero de participantes Honorarios/Itinerarios</td>
                <td>Total</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>

            <?php

                $sql="select id_curso,nombre_curso,periodo,horas_capacitacion,numero_participantes_base,
                numero_participantes_honorarios from cursos_formacion_docente_actualizacion_profesional";

                $resultado = mysqli_query($conexion,$sql);

                while($buscar=mysqli_fetch_row($resultado)) {

                    $datos = $buscar[0]."||".
                             $buscar[1]."||".
                             $buscar[2]."||".
                             $buscar[3]."||".
                             $buscar[4]."||".
                             $buscar[5];

                    ?>
                    <tr>
                        <td><?php echo $buscar[1]?></td>
                        <td><?php echo $buscar[2]?></td>
                        <td><?php echo $buscar[3]?></td>
                        <td><?php echo $buscar[4]?></td>
                        <td><?php echo $buscar[5]?></td>
                        <td><?php echo $buscar[4]+$buscar[5]?></td>
                        <td>
                            <button class="btn btn-warning fas fa-pencil-alt" data-toggle="modal"
                                    data-target="#modalEdicion" onclick=" agregaform('<?php echo $datos?>')"></button>
                        </td>
                        <td>
                            <button class="btn btn-danger <i fas fa-window-close " onclick="preguntarSiNo('<?php echo $buscar[0]?>')"></button>
                        </td>
                    </tr>
                    <?php

                         }
            ?>
        </table>
    </div>

</div>

