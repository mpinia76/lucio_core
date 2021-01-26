<?php

namespace Lucio\Core\Test\preventas;

include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\PreventaRecurrenteCriteria;

use Cose\Security\service\SecurityContext;

class ListPreventasRecurrentesTest extends GenericTest{

	/**
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		$this->log("listando PreventasRecurrentes", __CLASS__);

		$criteria = new PreventaRecurrenteCriteria();
		//$criteria->setMartes(1);
		$pr = $service->getList( $criteria );

		foreach ($pr as $prevRec) {

			$this->log( $prevRec->__toString(), __CLASS__);

		}

	}
}
?>
