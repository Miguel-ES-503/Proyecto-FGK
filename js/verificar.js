$(document).ready(function() {



  //Comprobamos las reuniones y asignamos la clase para darle el estilo y los colores a cada div
  alumnoReuniones=$("#reunionAlumno").text();
  totalReuniones=$("#totalRe").text();
  totalRe=(alumnoReuniones*100)/totalReuniones;
  if (totalRe>=50 && totalRe<100) {
    $("#reuniones").removeClass("peligro");
    $("#reuniones").removeClass("completo");
    $("#reuniones").addClass("advertencia");
  }else if(totalRe<50) {
    $("#reuniones").removeClass("advertencia");
    $("#reuniones").removeClass("completo");
    $("#reuniones").addClass("peligro");
  }else if (totalRe==100) {
    $("#reuniones").removeClass("advertencia");
    $("#reuniones").removeClass("peligro");
    $("#reuniones").addClass("completo");
  }else if (isNaN(totalRe)) {
    $("#reuniones").removeClass("advertencia");
    $("#reuniones").removeClass("peligro");
    $("#reuniones").addClass("completo");
  }

  //Comprobamos los talleres y asignamos la clase para darle el estilo y los colores a cada div
  alumnoTalleres=$("#tallerAlumno").text();
  totalTalleres=$("#totalTa").text();
  totalTa=(alumnoTalleres*100)/totalTalleres;
  if (totalTa>=50 && totalTa<100) {
    $("#taller").removeClass("peligro");
    $("#taller").removeClass("completo");
    $("#taller").addClass("advertencia");
  }else if(totalTa<50) {
    $("#taller").removeClass("advertencia");
    $("#taller").removeClass("completo");
    $("#taller").addClass("peligro");
  }else if (totalTa==100) {
    $("#taller").removeClass("advertencia");
    $("#taller").removeClass("peligro");
    $("#taller").addClass("completo");
  }else if (isNaN(totalTa)) {
    $("#taller").removeClass("advertencia");
    $("#taller").removeClass("peligro");
    $("#taller").addClass("completo");
  }
  //Comprobamos los talleres externos y asignamos la clase para darle el estilo y los colores a cada div
  alumnoExternos=$("#externoAlumno").text();
  totalExternos=$("#totalExt").text();
  totalExt=(alumnoExternos*100)/totalExternos;
  if (totalExt>=50 && totalExt<100) {
    $("#externo").removeClass("peligro");
    $("#externo").removeClass("completo");
    $("#externo").addClass("advertencia");
  }else if(totalExt<50) {
    $("#externo").removeClass("advertencia");
    $("#externo").removeClass("completo");
    $("#externo").addClass("peligro");
  }else if (totalExt==100) {
    $("#externo").removeClass("advertencia");
    $("#externo").removeClass("peligro");
    $("#externo").addClass("completo");
  }else if (isNaN(totalExt)) {
    $("#externo").removeClass("advertencia");
    $("#externo").removeClass("peligro");
    $("#externo").addClass("completo");
  }
  //Verificamos que haya llegado al numero de horas requerido.
  alumnoHoras=$("#AlumnoHoras").text();

  if (alumnoHoras>=20 && alumnoHoras<40) {
    $("#hora").removeClass("peligro");
    $("#hora").removeClass("completo");
    $("#hora").addClass("advertencia");
  }else if (alumnoHoras<20 && alumnoHoras>=0) {
    $("#hora").removeClass("advertencia");
    $("#hora").removeClass("completo");
    $("#hora").addClass("peligro");
  }else if (alumnoHoras==40) {
    $("#hora").removeClass("advertencia");
    $("#hora").removeClass("peligro");
    $("#hora").addClass("completo");
  }else {
    $("#hora").removeClass("advertencia");
    $("#hora").removeClass("peligro");
    $("#hora").addClass("completo");
  }

  //Validamos si su estado es trabjando o en pasantías.
  estado=$("#estado").text();
  if (estado=='Estudiando-Pasantias' || estado=='Estudiando y Trabajando' || estado=='Pasantias' || estado=='Trabajando' || estado=='Pausa de estudio'){
    $("#hora").removeClass("advertencia");
    $("#hora").removeClass("peligro");

    $("#externo").removeClass("advertencia");
    $("#externo").removeClass("peligro");

    $("#taller").removeClass("advertencia");
    $("#taller").removeClass("peligro");

    $("#reuniones").removeClass("advertencia");
    $("#reuniones").removeClass("peligro");


    $("#reuniones").addClass("completo");
    $("#hora").addClass("completo");
    $("#externo").addClass("completo");
    $("#taller").addClass("completo");
  }
  beca=$("#beca").text();
  if (beca=='Aprobado') {
    $("#beca").removeClass("text-danger");
    $("#beca").addClass("text-success");
  }else if (beca=='Reprobado') {
    $("#beca").removeClass("text-success");
    $("#beca").addClass("text-danger");
  }
  comple=$("#comple1").text();
  if (comple=='Completo') {
    $("#taller").removeClass("advertencia");
    $("#taller").removeClass("peligro");
    $("#taller").addClass("completo");
    $("#externo").removeClass("advertencia");
    $("#externo").removeClass("peligro");
    $("#externo").addClass("completo");
  }
});
