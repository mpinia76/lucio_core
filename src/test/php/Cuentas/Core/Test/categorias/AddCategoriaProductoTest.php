<?php

namespace Lucio\Core\Test\categorias;

use Lucio\Core\model\CategoriaProducto;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\CajaCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCategoriaProductoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getCategoriaProductoService();

		\Logger::getLogger(__CLASS__)->info("agregando CategoriaProducto");

		$cp = new CategoriaProducto();
		$cp->setNombre("RUBRO GENERAL");
		$service->add( $cp );


	}
}
?>
