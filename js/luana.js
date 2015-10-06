jQuery(document).ready(function($) 
{
	//Check to see if the window is top if not then display button
	// $(window).scroll(function(){
	// 	if ($(this).scrollTop() > 100) {
	// 		$('.scrollToTop').fadeIn();
	// 	} else {
	// 		$('.scrollToTop').fadeOut();
	// 	}
	// });	
	//Click event to scroll to top
	// $('.scrollToTop').click(function(){
	// 	$('html, body').animate({scrollTop : 0},800);
	// 	return false;
	// });
	
	$('#cantidadTotalK2').html($('#cantidadTotalK').html());
	$('#montoTotalK2').html($('#montoTotalK').html());

	function calcularTotalOjales(){
		var cantidad = $('#cantidad').val();
		var ojal = $('#ojal').val();
		$('#total .monto').html(cantidad*ojal);
	}
	$('#cantidad').blur(function(event) {
		calcularTotalOjales()
	});
	$('#ojal').blur(function(event) {
		calcularTotalOjales()
	});

	$('#fecha_ingreso').datepicker({
		format: 'dd/mm/yyyy'
	});
	$('#fecha_salida').datepicker({
		format: 'dd/mm/yyyy'
	});
	$('#fecha_ingresoE').datepicker({
		format: 'dd/mm/yyyy'
	});
	
	$('.modalEliminar').click(function(){	
		var idPro = $(this).data('idp');
		$('#id_produccionD').val('');
		$.ajax({
			url: dominio+'index.php/produccion/obtenerProduccion',
			type: 'POST',
			dataType: 'json',
			data: {id_produccion: idPro},
		})
		.done(function(datos) {									
			$('#id_produccionD').val(datos[0].id_produccion);		
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		$('#myModalEliminar').modal('toggle');
	});

	$('.modalEliminarCli').click(function(){	
		var idCli = $(this).data('idc');
		$('#id_clientesD').val('');		
		$('#id_clientesD').val(idCli);		
		$('#myModalEliminarCli').modal('toggle');
	});
	
	$('.modalEditar').click(function(){		
		var idPro = $(this).data('idp');
		$('#formEditPro input[type=text]').val(''); // vacia los inputs
		$('.id_aplicacionesE').prop('checked', false); // vacia los checkeds
		$.ajax({
			url: dominio+'index.php/produccion/obtenerProduccion',
			type: 'POST',
			dataType: 'json',
			data: {id_produccion: idPro},
		})
		.done(function(datos) {	
			// JSON.stringify(datos, null, 1)											
			$('#id_produccionE').val(datos[0].id_produccion);
			$('#fecha_ingresoE').val(datos[0].fecha_ingreso);
			$('#orden_lavadoE').val(datos[0].orden_lavado);
			$('#orden_trabajoE').val(datos[0].orden_trabajo);
			$('#id_tiposE').val(datos[0].id_tipos);
			$('#codigo_disenoE').val(datos[0].codigo_diseno);
			$('#id_clientesE').val(datos[0].id_clientes);
			$('#cantidadE').val(datos[0].cantidad);
			$('#id_prendasE').val(datos[0].id_prendas);
			$('#id_tallasE').val(datos[0].id_tallas);
			$('#id_modelosE').val(datos[0].id_modelos);
			$('#ojalE').val(datos[0].ojal);

			mostrarDatosLavadosClienteEditar(datos[0].id_clientes,datos[0].id_prendas,datos[0].id_tallas,datos[0].id_modelos,datos[0].id_lavados);

			var cantOjales = datos[0].ojal;
			if(cantOjales){
				$('#totalE .monto').html(cantOjales);
			}
			$('#id_lavadosE').val(datos[0].id_lavados);
			$.each(datos[0].aplicacionesRealizadas, function(index, val) 
			{
				
				var idRealizado = val.id;				
				$('.id_aplicacionesE').each(function(index, el) 
				{
					var idCheckbox = $(el).val();
					if(idRealizado == idCheckbox){
						$(el).prop('checked',true)
					}

				});
			});
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		$('#myModalEditar').modal('toggle');
	});




	










	$('.modalSalida').click(function(){		
		$('#id_produccionS').val('');
		$('#fecha_ingresoS').html('');
		$('#orden_lavadoS').html('');			
		$('#orden_trabajoS').html('');
		$('#clienteS').html('');
		$('#nombre_tipo').html('');
		$('#codigo_disenoS').html('');
		$('#id_clientesS').html('');
		$('#cantidadS').html('');
		$('#nombre_prenda').html('');
		$('#nombre_talla').html('');
		$('#nombre_modelo').html('');
		$('#fecha_salida').val('');	
		$('#cantidad_salida').val('');
		$('#observacion').val('');
		$('#ojalS').html('');
		$('#totalS').html('');
		$('#nombre_lavados').html('');
		$('.aplicacionesRealizadasS').html('');	

		var idPro = $(this).data('idp');				
		$.ajax({
			url: dominio+'index.php/produccion/obtenerProduccion',
			type: 'POST',
			dataType: 'json',
			data: {id_produccion: idPro},
		})
		.done(function(datos) {	
			// JSON.stringify(datos, null, 1)								
			$('#id_produccionS').val(datos[0].id_produccion);
			$('#fecha_ingresoS').html(datos[0].fecha_ingreso);
			$('#orden_lavadoS').html(datos[0].orden_lavado);			
			$('#orden_trabajoS').html(datos[0].orden_trabajo);
			$('#clienteS').html(datos[0].nombre_cliente +' '+ datos[0].apellido_cliente);
			$('#nombre_tipo').html(datos[0].nombre_tipo);
			$('#codigo_disenoS').html(datos[0].codigo_diseno);
			$('#id_clientesS').html(datos[0].id_clientes);
			$('#cantidadS').html(datos[0].cantidad);
			$('#nombre_prenda').html(datos[0].nombre_prenda);
			$('#nombre_talla').html(datos[0].nombre_talla);
			$('#nombre_modelo').html(datos[0].nombre_modelo);
			var dato = datos[0].fecha_salida;
			if(dato)
			{
				var fecha = dato.split('-'); 
				$('#fecha_salida').val(fecha[2]+'/'+fecha[1]+'/'+fecha[0]);				
			}
			$('#cantidad_salida').val(datos[0].cantidad_salida);
			$('#observacion').val(datos[0].observacion);
			$('#ojalS').html(datos[0].ojal);
			var cantOjales = datos[0].ojal*datos[0].cantidad;
			if(cantOjales){
				$('#totalS').html(cantOjales);
			}
			$('#nombre_lavados').html(datos[0].nombre_lavado);
			$.each(datos[0].aplicacionesRealizadas, function(index, val) 
			{
				$('.aplicacionesRealizadasS').append('<span>'+val.nombre+', </span>');				
			});
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		$('#myModalSalida').modal('toggle');
	});


	

	// ****************************************************
	// ****************************************************
	// Setear la validacion del formulario de validacion 
	// ****************************************************
	// ****************************************************
	$('#myModalEditar').on('shown.bs.modal', function () {
		formEditProVal.resetForm();	
		mostrarDatosAplicacionesEditar();	
	});







	$('#guardarCambios').click(function(){
		var id_clientes = $('#id_clientes').val();
		var id_prendas = $('#id_prendas').val();
		var id_tallas = $('#id_tallas').val();
		var id_modelos = $('#id_modelos').val();
		var id_lavados = $('#id_lavados').val();
		var res = false;
		$.ajax({
			url: dominio+"index.php/produccion/verificarCostoLavadoCliente",
			type: 'POST',
			dataType: 'json',
			data: {id_clientes: id_clientes,id_prendas: id_prendas,id_tallas: id_tallas,id_modelos: id_modelos,id_lavados: id_lavados},
            cache:false,
			async:false
		})
		.done(function(data) {
			if(data.error == 1)
			{
				$('#msgCrearPro').html(data.msg);
				$('#msgCrearPro').show('slow');
				res = false;
			}
			else
			{
				$('#msgCrearPro').html('');
				$('#msgCrearPro').hide('slow');
				res = true;
			}			
		})
		.fail(function() {
			console.log("error");
			// return false;
		})
		.always(function() {
			// return false;
			console.log("complete");

		});
		return res;
		
	});

	$('#guardarCambiosEdit').click(function(){
		var id_clientes = $('#id_clientesE').val();
		var id_prendas = $('#id_prendasE').val();
		var id_tallas = $('#id_tallasE').val();
		var id_modelos = $('#id_modelosE').val();
		var id_lavados = $('#id_lavadosE').val();
		var res = false;
		$.ajax({
			url: dominio+"index.php/produccion/verificarCostoLavadoCliente",
			type: 'POST',
			dataType: 'json',
			data: {id_clientes: id_clientes,id_prendas: id_prendas,id_tallas: id_tallas,id_modelos: id_modelos,id_lavados: id_lavados},
            cache:false,
			async:false
		})
		.done(function(data) {
			if(data.error == 1)
			{				
				$('#msgEditarPro').html(data.msg);
				$('#msgEditarPro').show('slow');
				res = false;
			}
			else
			{
				$('#msgEditarPro').html('');
				$('#msgEditarPro').hide('slow');
				res = true;
			}			
		})
		.fail(function() {
			console.log("error");
			// return false;
		})
		.always(function() {
			// return false;
			console.log("complete");

		});
		return res;
		
	});




	

	$('#id_clientesE').change(function(event) {
		mostrarDatosAplicacionesEditar();
	});
	$('#id_tallasE').change(function(event) {
		mostrarDatosAplicacionesEditar();
	});
	$('#id_prendasE').change(function(event) {
		mostrarDatosAplicacionesEditar();
	});
	$('#id_modelosE').change(function(event) {
		mostrarDatosAplicacionesEditar();
	});

	

	function mostrarDatosLavadosClienteEditar(id_clientes,id_prendas,id_tallas,id_modelos,id_lavados)
	{				
		// alert(id_clientes+','+id_prendas+','+id_tallas+','+id_modelos+','+id_lavados);
		$('#id_lavadosE').html('');
		$.ajax({
			url: dominio+'index.php/costo_prenda/devolverListaLavadoCliente',
			type: 'POST',
			dataType: 'json',
			data: {id_clientes: id_clientes, id_prendas: id_prendas, id_tallas: id_tallas, id_modelos: id_modelos}			
		})
		.done(function(data) {	
			if(data.error == 0)
			{
				$.each(data.lavados, function(index, val) 
				{								
					$('#id_lavadosE').append('<option value="'+val.id_lavados+'" >'+val.nombre+'</option>');					
				});
				$('#id_lavadosE').val(id_lavados);

			}else
			{
				$('#id_lavadosE').append('<option value="" >No tiene Ningun Lavado</option>');									
			}				
		})
		.fail(function() {
			// console.log("error--------------");
		})
		.always(function() {
			// console.log("complete----------------");
		});
	}

	

	function mostrarDatosAplicacionesEditar()
	{
		$('.aplicacionesClienteE').each(function(index, el) {
			var id_clientes    = $('#id_clientesE').val();
			var id_tallas      = $('#id_tallasE').val();
			var id_prendas     = $('#id_prendasE').val();
			var id_modelos     = $('#id_modelosE').val();
			var id_aplicaciones = $(el).val();
			$.ajax({
				url: dominio+"index.php/produccion/devolverValorOjalesCortesia",
				type: 'POST',
				dataType: 'html',
				data: {id_clientes: id_clientes, id_tallas: id_tallas, id_prendas: id_prendas, id_modelos: id_modelos, id_aplicaciones: id_aplicaciones},
			})
			.done(function(data) {
				// console.log("success"+data);
				
				if(data == 'Sin Valor')
				{
					$(el).parent('label').children('span').html('<span style="color:red;font-size:11px"><b>(No tiene Valor)</b></span>');
				}else{
					$(el).parent('label').children('span').html('<span style="color:green;font-size:11px"><b>('+data+') Bs.</b></span>');
				}
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});
			
		});		
	}

	$('#modalCrearAplicacion').click(function(){
		$('#myModalApli').modal('toggle');
	});

	$('#modalCrearLavado').click(function(){
		$('#myModalLavado').modal('toggle');
	});


	$('.modalEditarAplicacion').click(function(){
		var id = $(this).data('id');		
		$('#formeditarApli #nombreE').val('');		
		$('#formeditarApli #fechaE').html('');
		$('#formeditarApli #id_aplicacionesE').val('');
		$.ajax({
			url: dominio+"index.php/configuracion/devolverAplicacion",
			type: 'POST',
			dataType: 'json',
			data: {id_aplicaciones: id},
		})
		.done(function(data) {				
			$('#formeditarApli #nombreE').val(data.nombre);
			$('#formeditarApli #fechaE').html(data.fecha);			
			$('#formeditarApli #id_aplicacionesE').val(data.id_aplicaciones);	
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		$('#myModalApliEdit').modal('toggle');
	});

	$('.modalEditarLavado').click(function(){
		var id = $(this).data('id');		
		$('#formeditarLav #nombreE').val('');		
		$('#formeditarLav #fechaE').html('');
		$('#formeditarLav #id_aplicacionesE').val('');
		$.ajax({
			url: dominio+"index.php/configuracion/devolverLavado",
			type: 'POST',
			dataType: 'json',
			data: {id_lavados: id},
		})
		.done(function(data) {				
			$('#formeditarLav #nombreE').val(data.nombre);
			$('#formeditarLav #fechaE').html(data.fecha);			
			$('#formeditarLav #id_lavadosE').val(data.id_lavados);	
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		$('#myModalLavEdit').modal('toggle');
	});

	$('.modalEliminarAplicacion').click(function(){
		$('#id_aplicacionesD').val('');
		var id = $(this).data('id');
		$('#id_aplicacionesD').val(id);		
		$('#myModalEliminarApli').modal('toggle');
	});

	$('.modalEliminarLavado').click(function(){
		$('#id_lavadosD').val('');
		var id = $(this).data('id');
		$('#id_lavadosD').val(id);		
		$('#myModalEliminarLav').modal('toggle');
	});
});
