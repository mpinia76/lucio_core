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

class BorrarPreventaRecurrenteTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		\Logger::getLogger(__CLASS__)->info("borrando PreventaRecurrente");

		$this->persistenceContext->beginTransaction();

		$service->delete( 5 );


		$this->persistenceContext->commit();
	}
}
?>
