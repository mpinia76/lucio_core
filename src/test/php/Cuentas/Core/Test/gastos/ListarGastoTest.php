<?php

namespace Lucio\Core\Test\gastos;


include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\GastoCriteria;

use Cose\Security\service\SecurityContext;

class ListGastoTest extends GenericTest{

	/**
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getGastoService();

		$this->log("listando gastoss", __CLASS__);

		$criteria = new GastoCriteria();

		$entities = $service->getList( $criteria );

		foreach ($entities as $entity) {

			$this->log("Gasto: " . $entity, __CLASS__);

		}

	}
}
?>
