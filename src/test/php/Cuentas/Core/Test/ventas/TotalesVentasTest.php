<?php

namespace Lucio\Core\Test\ventas;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class TotalesVentasTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getVentaService();

		\Logger::getLogger(__CLASS__)->info("totales de venta del día");

		$totales = $service->getTotalesDia( new \Datetime() );

		\Logger::getLogger(__CLASS__)->info( "cantidad: " . $totales["cantidad"]);
		\Logger::getLogger(__CLASS__)->info( "monto: " . $totales["monto"]);

		\Logger::getLogger(__CLASS__)->info("totales de venta del mes");

		$totales = $service->getTotalesMes( new \Datetime() );

		\Logger::getLogger(__CLASS__)->info( "cantidad: " . $totales["cantidad"]);
		\Logger::getLogger(__CLASS__)->info( "monto: " . $totales["monto"]);

	}
}
?>
