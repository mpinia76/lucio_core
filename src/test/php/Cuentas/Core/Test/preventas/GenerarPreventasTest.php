<?php

namespace Lucio\Core\Test\preventas;

use Lucio\Core\model\DetallePreventaRecurrente;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\model\PreventaRecurrente;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\PreventaRecurrenteCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class GenerarPreventasTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		\Logger::getLogger(__CLASS__)->info("generando preventas");

		$this->persistenceContext->beginTransaction();

		$fecha = new \DateTime();
		$fecha->modify("+2 days");
		$service->generarPreventas( $fecha );


		$this->persistenceContext->commit();
	}
}
?>
