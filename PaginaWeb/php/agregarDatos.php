<?php


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "conexion.php";
    $conexion = conexion();

    $nombre_curso=$_POST['nombre_curso'];
    $periodo=$_POST['periodo'];
    $horas_capacitacion=$_POST['horas_capacitacion'];
    $numero_participantes_base=$_POST['numero_participantes_base'];
    $numero_participantes_honorarios=$_POST['numero_participantes_honorarios'];


    $stmt = $conexion->prepare("insert into cursos_formacion_docente_actualizacion_profesional (nombre_curso,
                                        periodo,horas_capacitacion,numero_participantes_base,numero_participantes_honorarios)
                                        values (?,?,?,?,?)");
    $stmt->bind_param("ssiii",$nombre_curso,$periodo, $horas_capacitacion,
                                        $numero_participantes_base,$numero_participantes_honorarios);

    echo $resultado = $stmt->execute();
    $stmt->close();
    $conexion->close();

?>
