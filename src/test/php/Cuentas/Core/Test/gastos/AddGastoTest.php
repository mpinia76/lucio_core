<?php

namespace Lucio\Core\Test\gastos;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\model\EstadoGasto;

use Lucio\Core\model\Gasto;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\GastoCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddGastoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getSucursalService();

		\Logger::getLogger(__CLASS__)->info("agregando Gasto");

		$gasto = new Gasto();
		$gasto->setEstado(EstadoGasto::Realizado);
		$gasto->setFechaHora( new \Datetime() );
		$gasto->setMonto(380);

		$gasto->setVendedor( LucioUtils::getEmpleadoDefault() );

		$gasto->setUser(LucioUtils::getUserByUsername("bernardo"));
		$gasto->setConcepto( LucioUtils::getConceptoGastoVarios() );

		$service->add( $gasto );


	}
}
?>
