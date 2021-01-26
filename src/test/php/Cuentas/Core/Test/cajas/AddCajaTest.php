<?php

namespace Lucio\Core\Test\cajas;

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

		$service = ServiceFactory::getCajaService();

		\Logger::getLogger(__CLASS__)->info("agregando caja");

		$caja = new Caja();
		$caja->setNumero("1");
		$caja->setFecha( new \Datetime() );

		$hora = new \DateTime();
		$hora->setTime(7,30);
		$caja->setHoraApertura( $hora );

		$caja->setSaldoInicial( 500 );
		$caja->setSaldo( 500 );
		$caja->setCajero( LucioUtils::getEmpleadoDefault() );
		$service->add( $caja );


	}
}
?>
