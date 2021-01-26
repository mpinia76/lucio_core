<?php

namespace Lucio\Core\Test\sucursales;

use Lucio\Core\criteria\TareaCriteria;


include_once dirname(__DIR__). '/conf/init.php';

use Lucio\Core\Test\GenericTest;
use Lucio\Core\service\ServiceFactory;

use Cose\Security\service\SecurityContext;

class ListClientesTest extends GenericTest{

	/**
	 * @Security( permission="listar_tareas" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getTareaService();

		$this->log("listando tareas", __CLASS__);

		$criteria = new TareaCriteria();

		$entities = $service->getList( $criteria );

		foreach ($entities as $entity) {

			$this->log("Tarea: " . $entity, __CLASS__);

		}

	}
}
?>
