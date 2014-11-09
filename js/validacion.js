$(document).ready(function(){
	$.validator.addMethod("PASSWORD",function(value,element){
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/i.test(value);
            },"El password tiene que tener entre 6 y 16 caracteres, letras mayúsuclas, minúsculas y números.");

	$("#mensaje").hide();
	$("#formregistro").validate({
		event: "blur",rules: 
		{
			'nombre': "required",
			'apellido': "required",
			'nombre_usuario': "required",
			'email': 
		    {
				required: true,
				email:true
			},
			'password_us': "required PASSWORD",
			'repassword': {
				equalTo: "#password_us"
			}
		},
		messages: {'nombre': "Ingrese su nombre",'apellido': "Ingrese su apellido",'nombre_usuario': "Ingrese un apodo", 'email': { required: 'Debe ingresar un email', email: 'Debe ingresar un email v&aacute;lido' }},
		debug: true,errorElement: "label",errorContainer: $("#errores"),
		submitHandler: function(form){
			$("#mensaje").show();
			$("#mensaje").html("<p class='pensando'>Enviando el formulario, por favor espere...</p>");
                        var passencriptado = hex_md5(document.getElementById("password_us").value);
			$.ajax({
				type: "GET",
				url:"../php/MainController.php",
				contentType: "application/x-www-form-urlencoded",
				processData: true,
				data: "&action=insUsu&nombre="+escape($('#nombre').val())+"&apellido="+escape($('#apellido').val())+"&nombre_usuario="+escape($('#nombre_usuario').val())+"&email="+escape($('#email').val())+"&password_us=" + passencriptado,
				success: function(msg){
					$("#mensaje").html("<p class='ok'>El mensaje ha sido enviado correctamente.Gracias!</p>");
					document.getElementById("nombre").value="";
					document.getElementById("apellido").value="";
					document.getElementById("nombre_usuario").value="";
					document.getElementById("email").value="";
					document.getElementById("password_us").value="";
					setTimeout(function() {$('#mensaje').fadeOut('fast');}, 6000);

				}
			});
		}
	});;
	$("#mensaje").hide();
	$("#formlogin").validate({
		event: "blur",rules: 
		{
			'email': 
		    {
				required: true,
				email:true
			},
			'password_us': "required PASSWORD"
		},
		messages: {'email': { required: 'Debe ingresar un email', email: 'Debe ingresar un email v&aacute;lido' }},
		debug: true,errorElement: "label",errorContainer: $("#errores"),
		submitHandler: function(form){
			$("#mensaje").show();
			$("#mensaje").html("<p class='pensando'>Enviando el formulario, por favor espere...</p>");
			var passencriptado = hex_md5(document.getElementById("password_us").value);
                        $.ajax({
				type: "GET",
				url:"./php/MainController.php",
				contentType: "application/x-www-form-urlencoded",
				processData: true,
				data: "&action=traerUsu&email="+escape($('#email').val())+"&password_us=" + passencriptado,
				success: function(msg){
					$("#mensaje").html("<p class='ok'>Te has logueado correctamente.Gracias!</p>"+hash);
					document.getElementById("email").value="";
					document.getElementById("password_us").value="";
					setTimeout(function() {$('#mensaje').fadeOut('fast');}, 6000);

				}
			});
		}
	});;
	$("#mensaje").hide();
	$("#formcomentario").validate({
		event: "blur",rules: 
		{
			'titulo': "required",
			'comentario': "required"
		},
		messages: {'titulo': "Ingrese un titulo",'comentario': "Ingrese su comentario"},
		debug: true,errorElement: "label",errorContainer: $("#errores"),
		submitHandler: function(form){
			$("#mensaje").show();
			$("#mensaje").html("<p class='pensando'>Enviando el formulario, por favor espere...</p>");
			$.ajax({
				type: "POST",
				url:"funciones.php",
				contentType: "application/x-www-form-urlencoded",
				processData: true,
				data: "&titulo="+escape($('#titulo').val())+"&comentario="+escape($('#comentario').val()),
				success: function(msg){
					$("#mensaje").html("<p class='ok'>Tu comentario ha sido enviado correctamente.Gracias!</p>");
					document.getElementById("titulo").value="";
					document.getElementById("comentario").value="";
					setTimeout(function() {$('#mensaje').fadeOut('fast');}, 6000);

				}
			});
		}
	});;
	$("#mensaje").hide();
	$("#formproducto").validate({
		event: "blur",rules: 
		{
			'nombre_producto': "required",
			'descripcion': "required"
		},
		messages: {'nombre_producto': " Ingrese nombre para el producto",'descripcion': " Ingrese una descripcion"},
		debug: true,errorElement: "label",errorContainer: $("#errores"),
		submitHandler: function(form){
			$("#mensaje").show();
			$("#mensaje").html("<p class='pensando'>Enviando el formulario, por favor espere...</p>");
			$.ajax({
				type: "GET",
				url:"../php/MainController.php",
				contentType: "application/x-www-form-urlencoded",
				processData: true,
				data: "&action=insProd&nombre_producto="+escape($('#nombre_producto').val())+"&descripcion="+escape($('#descripcion').val()),
				success: function(msg){
                                        msg = $.parseJSON(msg);
                                        if (msg.errorMessage !== undefined) {
                                            $("#mensaje").html("<p class='ok'>" + msg.errorMessage + "</p>");
                                        } else {
                                            $("#mensaje").html("<p class='ok'>El mensaje ha sido enviado correctamente.Gracias!</p>");
                                        }
					document.getElementById("nombre_producto").value="";
					document.getElementById("descripcion").value="";
					setTimeout(function() {$('#mensaje').fadeOut('fast');}, 6000);

				}
			});
		}
	});;
	$("#mensaje").hide();
	$("#formprecio").validate({
		event: "blur",rules: 
		{
			'precio': 
		    {
				required: true,
				number:true
			}
		},
		messages: {'precio': " Ingrese un precio valido"},
		debug: true,errorElement: "label",errorContainer: $("#errores"),
		submitHandler: function(form){
			$("#mensaje").show();
			$("#mensaje").html("<p class='pensando'>Enviando el formulario, por favor espere...</p>");
			$.ajax({
				type: "GET",
				url:"../php/MainController.php",
				contentType: "application/x-www-form-urlencoded",
				processData: true,
				data: "&action=insPPU&precio="+escape($('#precio').val())+"&producto="+$('#productos').val(),
				success: function(msg){
					$("#mensaje").html("<p class='ok'>El mensaje ha sido enviado correctamente.Gracias!</p>");
					document.getElementById("precio").value="";
					setTimeout(function() {$('#mensaje').fadeOut('fast');}, 6000);

				}
			});
		}
	});;
});