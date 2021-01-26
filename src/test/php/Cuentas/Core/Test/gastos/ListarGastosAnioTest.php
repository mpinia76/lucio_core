<?php

namespace Lucio\Core\Test\gastos;


include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\GastoCriteria;

use Cose\Security\service\SecurityContext;

class ListGastosAnioTest extends GenericTest{

	/**
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getMovimientoGastoService();

		$this->log("listando gastoss", __CLASS__);

		$gastos = $service->getTotalesAnioPorMesConcepto(2015);

		$this->log("Anio: " . $gastos["anio"], __CLASS__);
		$this->log("Totales: " . $gastos["totales"], __CLASS__);

		$detalles = $gastos["detalles"];

		foreach ($detalles as $detalleConceptoPorMes) {

			$this->log("***********************************", __CLASS__);
			$this->log("Concepto: " . $detalleConceptoPorMes["concepto"], __CLASS__);
			$this->log("***********************************", __CLASS__);

			for ($mes = 1; $mes <=12; $mes++) {
				$this->log("Mes $mes: " . $detalleConceptoPorMes["gastos"][$mes], __CLASS__);

			}
			$this->log("Total x Concepto " .  $$detalleConceptoPorMes["total"], __CLASS__);

		}

	}
}
?>
