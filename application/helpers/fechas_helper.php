<?php 

function devolverMesLiteral($mes=0)
{
	$res = $mes;
	switch ($mes) 
	{
		case '01':
			$res = 'Enero';
			break;
		case '02':
			$res = 'Febrero';
			break;
		case '03':
			$res = 'Marzo';
			break;
		case '04':
			$res = 'Abril';
			break;
		case '05':
			$res = 'Mayo';
			break;
		case '06':
			$res = 'Junio';
			break;
		case '07':
			$res = 'Julio';
			break;
		case '08':
			$res = 'Agosto';
			break;
		case '09':
			$res = 'Septiembre';
			break;
		case '10':
			$res = 'Octubre';
			break;
		case '11':
			$res = 'Noviembre';
			break;
		case '12':
			$res = 'Diciembre';
			break;		
		default:
			$res = 'Error';
			break;
	}
	return $res;
}

?>