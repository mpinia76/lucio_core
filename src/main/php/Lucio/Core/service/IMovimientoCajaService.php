<?php
namespace Lucio\Core\service;


use Lucio\Core\model\Cuenta;

use Lucio\Core\model\MovimientoCaja;

use Cose\Crud\service\ICrudService;

/**
 * interfaz para el servicio de MovimientoCaja
 *
 * @author Marcos
 * @since 09-03-2018
 *
 */
interface IMovimientoCajaService extends ICrudService {


	function getMovimientos( Cuenta $cuenta, \Datetime $fecha = null);

	function getMovimientosTarjetas( $cuentas, \Datetime $fecha = null);

	function getTotales( Cuenta $cuenta = null, \Datetime $fecha = null);

	function getTotalesTarjetas( $cuentas, \Datetime $fecha = null);

	function getTotalesMes( Cuenta $cuenta, \Datetime $fecha = null);

	function getTotalesAnioPorMes( Cuenta $cuenta, $anio);

}
