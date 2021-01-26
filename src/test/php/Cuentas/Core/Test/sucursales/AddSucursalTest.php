<?php

namespace Lucio\Core\Test\sucursals;

use Lucio\Core\model\Sucursal;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddSucursalsTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getSucursalService();

		\Logger::getLogger(__CLASS__)->info("agregando sucursal");

		$sucursal = new Sucursal();
		$sucursal->setNombre("CASA MATRIZ");
		$service->add( $sucursal );


	}
}
?>
