<?php

namespace Lucio\Core\Test\ventas;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AnularVentaTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getVentaService();

		\Logger::getLogger(__CLASS__)->info("anulando");

		$venta = $service->get( 62  );

		$service->anular($venta, LucioUtils::getUserByUsername("bernardo"));


	}
}
?>
