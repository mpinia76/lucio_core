<?php

namespace Lucio\Core\Test\clientes;

use Lucio\Core\model\Cliente;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\ClienteCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddClientesTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getClienteService();

		\Logger::getLogger(__CLASS__)->info("agregando cliente");

		$cliente = new Cliente();
		$cliente->setNombre("CLIENTE MOSTRADOR");
		$cliente->setApellido("");
		$service->add( $cliente );


	}
}
?>
