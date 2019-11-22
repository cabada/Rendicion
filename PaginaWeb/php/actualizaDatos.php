<?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once "conexion.php";
        $conexion = conexion();
        $id_curso=$_POST['id_curso'];
        $nombre_curso=$_POST['nombre_curso'];
        $periodo=$_POST['periodo'];
        $horas_capacitacion=$_POST['horas_capacitacion'];
        $numero_participantes_base=$_POST['numero_participantes_base'];
        $numero_participantes_honorarios=$_POST['numero_participantes_honorarios'];

        $stmt = $conexion->prepare("update cursos_formacion_docente_actualizacion_profesional set 
                                                    nombre_curso=?,
                                                    periodo=?,horas_capacitacion=?,
                                                    numero_participantes_base=?,
                                                    numero_participantes_honorarios=?
                                               where id_curso = $id_curso");

        $stmt->bind_param("ssiii",$nombre_curso,$periodo, $horas_capacitacion,
        $numero_participantes_base,$numero_participantes_honorarios);

        echo $resultado = $stmt->execute();
        $stmt->close();
        $conexion->close();




?>
