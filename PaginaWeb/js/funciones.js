
function agregarDatos(nombre_curso,periodo,horas_capacitacion,numero_participantes_base,
                      numero_participantes_honorarios) {
    cadena = "nombre_curso=" + nombre_curso +
        "&periodo=" + periodo +
        "&horas_capacitacion=" + horas_capacitacion +
        "&numero_participantes_base=" + numero_participantes_base +
        "&numero_participantes_honorarios=" + numero_participantes_honorarios;

    $.ajax({
        type:"post",
        url:"php/agregarDatos.php",
        data:cadena,
        success:function(r) {
            if(r==1){
                $('#tablaRegistroCurso').load('componentes/TablaRegistroCurso.php');
                alertify.success("Agregado con exito: ");
            }
            else{
                alertify.error("Fallo el servidor");
            }
        }
    });

}

function agregaform(datos) {

    d=datos.split('||');

    $('#id_curso').val(d[0]);
    $('#nombre_curso_editar').val(d[1]);
    $('#periodo_editar').val(d[2]);
    $('#horas_capacitacion_editar').val(d[3]);
    $('#numero_participantes_base_editar').val(d[4]);
    $('#numero_participantes_honorarios_editar').val(d[5]);

    
}

function actualizaDatos() {


    id_curso=$('#id_curso').val();
    nombre_curso=$('#nombre_curso_editar').val();
    periodo=$('#periodo_editar').val();
    horas_capacitacion=$('#horas_capacitacion_editar').val();
    numero_participantes_base=$('#numero_participantes_base_editar').val();
    numero_participantes_honorarios=$('#numero_participantes_honorarios_editar').val();

    cadena = "id_curso="+ id_curso +
        "&nombre_curso=" + nombre_curso +
        "&periodo=" + periodo +
        "&horas_capacitacion=" + horas_capacitacion +
        "&numero_participantes_base=" + numero_participantes_base +
        "&numero_participantes_honorarios=" + numero_participantes_honorarios;

    $.ajax({
        type:"post",
        url:"php/actualizaDatos.php",
        data:cadena,
        success:function(r) {
            if(r==1){
                $('#tablaRegistroCurso').load('componentes/TablaRegistroCurso.php');
                alertify.success("Actualizado con exito: ");
            }
            else{
                alertify.error("Fallo el servidor");
            }
        }
    });
}


function preguntarSiNo(id_curso) {

    alertify.confirm('Eliminar Registro', 'Esta seguro de eliminar este registro??',
        function(){ eliminarDatos(id_curso) }
        , function(){ alertify.error('Se cancelo.')});


}

function eliminarDatos(id_curso) {
    cadena = "id_curso="+id_curso ;

    $.ajax({
        type:"post",
        url:"php/eliminarDatos.php",
        data:cadena,
        success:function (r) {
            if(r==1){
                $('#tablaRegistroCurso').load('componentes/TablaRegistroCurso.php');
                alertify.success("Eliminado con exito!")
            }else{
                alertify.error("Fallo el servidor!")
            }


        }
    });

}