<?php
namespace Lucio\Core\service;


use Lucio\Core\model\Cuenta;

use Lucio\Core\model\Caja;

use Lucio\Core\model\Presupuesto;

use Cose\Crud\service\ICrudService;

use Cose\Security\model\User;

/**
 * interfaz para el servicio de Presupuesto
 *
 * @author Marcos
 * @since 29-03-2019
 *
 */
interface IPresupuestoService extends ICrudService {



	/**
	 * se anula la presupuesto
	 * @param $presupuesto
	 */
	public function anular(Presupuesto $presupuesto, User $user);

	/**
	 * totales de presupuestos del día.
	 * @param \Datetime $fecha
	 */
	public function getTotalesDia(\Datetime $fecha);

	/**
	 * totales de presupuestos del mes
	 * @param $fecha
	 */
	public function getTotalesMes(\Datetime $fecha);


}
