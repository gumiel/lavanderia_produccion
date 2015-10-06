jQuery(document).ready(function($) 
{
	
	$('#modalCrear').click(function(){
		mostrarDatosLavadosCliente( $('#id_clientes').val(), $('#id_prendas').val(), $('#id_tallas').val(), $('#id_modelos').val() );
		$('#formcreatePro input[type=text]:gt(0)').val('');
		$('#formcreatePro #ojal').val('0');
		$('#myModal').modal('toggle');
	});

	// ****************************************************
	// ****************************************************
	// Mostrar en el campo ORDEN LAVADO la ultima ordena  mas unos (+1)
	// ****************************************************
	// ****************************************************
	$('#myModal').on('shown.bs.modal', function () {
		$('#orden_lavado').focus();
		$.ajax({
			url: dominio+"index.php/produccion/devolverUltimoOrdenLavado",
			type: 'POST',
			dataType: 'html',
			data: {param1: 'value1'},
		})
		.done(function(data) {
			$('#orden_lavado').val(data);			
		})
		.fail(function() {			
		})
		.always(function() {			
		});
		mostrarDatosAplicaciones();
		
	});

	$('#id_clientes').change(function(event) {		
		mostrarDatosAplicaciones();
		mostrarDatosLavadosCliente( $('#id_clientes').val(), $('#id_prendas').val(), $('#id_tallas').val(), $('#id_modelos').val() );
	});
	$('#id_tallas').change(function(event) {
		mostrarDatosAplicaciones();
		mostrarDatosLavadosCliente( $('#id_clientes').val(), $('#id_prendas').val(), $('#id_tallas').val(), $('#id_modelos').val() );
	});
	$('#id_prendas').change(function(event) {
		mostrarDatosAplicaciones();
		mostrarDatosLavadosCliente( $('#id_clientes').val(), $('#id_prendas').val(), $('#id_tallas').val(), $('#id_modelos').val() );
	});
	$('#id_modelos').change(function(event) {
		mostrarDatosAplicaciones();
		mostrarDatosLavadosCliente( $('#id_clientes').val(), $('#id_prendas').val(), $('#id_tallas').val(), $('#id_modelos').val() );
	});


	function mostrarDatosLavadosCliente(id_clientes,id_prendas,id_tallas,id_modelos)
	{				
		$('#id_lavados').html('');
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
					$('#id_lavados').append('<option value="'+val.id_lavados+'" >'+val.nombre+'</option>');					
				});
			}else
			{
				$('#id_lavados').append('<option value="" >No tiene Ningun Lavado</option>');									
			}				
		})
		.fail(function() {
			// console.log("error--------------");
		})
		.always(function() {
			// console.log("complete----------------");
		});
	}

	function mostrarDatosAplicaciones()
	{
		$('.aplicacionesCliente').each(function(index, el) {
			var id_clientes    = $('#id_clientes').val();
			var id_tallas      = $('#id_tallas').val();
			var id_prendas     = $('#id_prendas').val();
			var id_modelos     = $('#id_modelos').val();
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


});