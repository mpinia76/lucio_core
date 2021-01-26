<?php

namespace Lucio\Core\Test\movimientos;

include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Lucio\Core\service\ServiceFactory;

use Cose\Security\service\SecurityContext;

class ListMovimientosTest extends GenericTest{

	/**
	 * @Security( permission="listar_cajas" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getMovimientoCuentaService();

		$this->log("listando movimientos", __CLASS__);

		$caja = ServiceFactory::getCajaService()->get(1);
		$fecha = null;

		$movimientos = $service->getMovimientos( $caja, $fecha );

		foreach ($movimientos as $movimiento) {

			$this->log("Movimiento: " . $movimiento, __CLASS__);

		}

	}
}
?>
