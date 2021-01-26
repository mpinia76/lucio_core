<?php

namespace Lucio\Core\Test\cajas;

use Lucio\Core\model\CajaChica;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\model\Caja;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\CajaCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCajasTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getCajaChicaService();

		\Logger::getLogger(__CLASS__)->info("agregando caja chica");

		$caja = new CajaChica();
		$caja->setNumero("1");
		$caja->setFecha( new \Datetime() );
		$caja->setSaldoInicial( 0 );
		$caja->setSaldo( 0 );
		$service->add( $caja );


	}
}
?>
