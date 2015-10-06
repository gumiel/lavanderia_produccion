jQuery(document).ready(function($) {
	$("#formcreatePro").validate({
		rules: {
			fecha_ingreso: {
				required: true,
				date: true,
				maxlength: 20
			},
			orden_lavado: {
				required: true,
				maxlength: 20,
				remote: dominio+"index.php/produccion/verificarOrdenLavadoRepetido"
			},
			orden_trabajo: {
				maxlength: 20
			},
			codigo_diseno: {
				maxlength: 20
			},
			cantidad: {
				required: true,
				maxlength: 11,
				digits: true
			},
			ojal: {
				required: true,
				maxlength: 11,
				digits: true
			}
		},
		messages: {
			fecha_ingreso: {
				required: "Campo Obligatorio.",
				date: "Fecha Invalida.",
				maxlength: "Maximo 20 Caracteres."
			},
			orden_lavado: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 20 Caracteres.",
				remote: "Ya existe la Orden de Lavado."
			},
			orden_trabajo: {
				maxlength: "Maximo 20 Caracteres."
			},
			codigo_diseno: {
				maxlength: "Maximo 20 Caracteres."
			},
			codigo_diseno: {
				maxlength: "Maximo 20 Caracteres."
			},
			cantidad: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 11 Caracteres.",
				digits: "Solo numeros enteros."
			},
			ojal: {
				required: "Campo Obligatorio o valor 0.",
				maxlength: "Maximo 11 Caracteres.",
				digits: "Solo numeros enteros."
			}
		}
	});

	formEditProVal = $("#formEditPro").validate({
		rules: {
			fecha_ingresoE: {
				required: true,
				date: true,
				maxlength: 20
			},
			orden_lavadoE: {
				required: true,
				remote: {
					url: dominio+"index.php/produccion/verificarOrdenLavadoRepetidoEdit",
						type: "get",
						data: {
							id_produccionE: function() {
							return $( "#id_produccionE" ).val();
						}
					}
				},
				maxlength: 20
			},
			orden_trabajoE: {
				maxlength: 20
			},
			codigo_disenoE: {
				maxlength: 20
			},
			cantidadE: {
				required: true,
				maxlength: 11,
				digits: true
			},
			ojalE: {
				required: true,
				maxlength: 11,
				digits: true
			}
		},
		messages: {
			fecha_ingresoE: {
				required: "Campo Obligatorio.",
				date: "Fecha Invalida.",
				maxlength: "Maximo 20 Caracteres."
			},
			orden_lavadoE: {
				required: "Campo Obligatorio.",
				remote: "Ya existe la Orden de Lavado.",
				maxlength: "Maximo 20 Caracteres."
			},
			orden_trabajoE: {
				maxlength: "Maximo 20 Caracteres."
			},
			codigo_disenoE: {
				maxlength: "Maximo 20 Caracteres."
			},
			codigo_diseno: {
				maxlength: "Maximo 20 Caracteres."
			},
			cantidadE: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 11 Caracteres.",
				digits: "Solo numeros enteros."
			},
			ojalE: {
				required: "Campo Obligatorio o valor 0.",
				maxlength: "Maximo 11 Caracteres.",
				digits: "Solo numeros enteros."
			}
		}
	});

	




	$("#formCliente").validate({
		rules: {
			nombres: {
				required: true,				
				maxlength: 50
			},
			apellidos: {
				required: true,
				maxlength: 50
			},
			"costo_lavado[]": {
				required: true,
				maxlength: 10,
				number: true
			},
			"costo_aplicacion[]": {
				required: true,
				maxlength: 10,
				number: true
			},
			ojal: {
				required: true,
				maxlength: 10,
				number: true
			}
		},
		messages: {
			nombres: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 30 Caracteres."
			},
			apellidos: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 30 Caracteres."
			},
			"costo_lavado[]": {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			},
			"costo_aplicacion[]": {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			},
			ojal: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			}
		}
	});
	

	$("#formClienteEdit").validate({
		rules: {
			nombres: {
				required: true,				
				maxlength: 50
			},
			apellidos: {
				required: true,
				maxlength: 50
			},
			"costo_lavado[]": {
				required: true,
				maxlength: 10,
				number: true
			},
			"costo_aplicacion[]": {
				required: true,
				maxlength: 10,
				number: true
			},
			ojal: {
				required: true,
				maxlength: 10,
				number: true
			}
		},
		messages: {
			nombres: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 30 Caracteres."
			},
			apellidos: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 30 Caracteres."
			},
			"costo_lavado[]": {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			},
			"costo_aplicacion[]": {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			},
			ojal: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			}
		}
	});



	



	$("#formClientePago").validate({
		rules: {
			id_cliente: {
				required: true
			},
			n_recibo: {
				required: true,
				maxlength: 20
			},
			monto: {
				required: true,
				maxlength: 15,
				number: true
			}
		},
		messages: {
			id_cliente: {
				required: "Campo Obligatorio."
			},
			n_recibo: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 20 Caracteres."
			},
			monto: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 15 Caracteres.",
				number: "Solo numeros decimales."
			}
		}
	});

	$("#costoPrendaEditar").validate({
		rules: {
			costo: {
				required: true,
				maxlength: 10,
				number: true
			},
			'tallas[]': {
				required: true
			}
		},
		messages: {
			costo: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				number: "Solo numeros decimales."
			},
			'tallas[]': {
				required: "Campo Obligatorio."
			}
		}
	});

	$("#formOjalCortesia").validate({
		rules: {
			cantidad: {
				required: true,
				maxlength: 10,
				digits: true
			},
			'tallas[]': {
				required: true
			}
		},
		messages: {
			cantidad: {
				required: "Campo Obligatorio.",
				maxlength: "Maximo 10 Caracteres.",
				digits: "Solo numeros enteros."
			},
			'tallas[]': {
				required: "Campo Obligatorio."
			}
		}
	});

});