<?php

namespace Lucio\Core\Test\empleados;

use Lucio\Core\model\Empleado;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\EmpleadoCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddEmpleadoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getEmpleadoService();

		\Logger::getLogger(__CLASS__)->info("agregando empleado");

		$empleado = new Empleado();
		$empleado->setNombre("TITULAR COMERCIO");
		$empleado->setApellido("");
		$empleado->setNumero("0");
		$empleado->setFechaIngreso( new \DateTime() );
		$service->add( $empleado );

		$empleado = new Empleado();
		$empleado->setNombre("José Marcos");
		$empleado->setApellido("Iribarne");
		$empleado->setNumero("1");
		$empleado->setFechaIngreso( new \DateTime() );
		$service->add( $empleado );


	}
}
?>
