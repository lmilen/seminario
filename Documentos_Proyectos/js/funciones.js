function consultar(){
// Funcion empleando Ajax
	$.ajax({
		type: "POST",
		data: {codigo: $("#txt_codigo").val()},  
		// codigo es el nombre de la variable que llamaré en el archivo procesar.php 
		// y es extraido de lo que tiene el input txt_codigo 
		url: "procesar.php",   // el archivo php al cual se va a direccionar
		success: function(datos){   // resultado de lo que llega del archivo procesar.php
        $("#resultado").html(datos);   // pone lo extraido en un div denominado resultado
   	}});
}

