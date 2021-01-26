<?php

namespace Lucio\Core\Test\bancos;

include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\BancoCriteria;
use Lucio\Core\utils\LucioUtils;
use Cose\Security\service\SecurityContext;

class BalanceGastosTest extends GenericTest{

	/**
	 * @Security( permission="listar_bancos" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getMovimientoGastoService();

		$this->log("balance de gastos", __CLASS__);

		$desde = new \DateTime("2015-01-01");
		$hasta = new \DateTime("2015-02-08");

		$totales = $service->getBalance( $desde, $hasta );

		$this->log("Total: " . LucioUtils::formatMontoToView($totales) , __CLASS__);


	}
}
?>
