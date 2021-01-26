<?php

namespace Lucio\Core\Test\conceptosGasto;

use Lucio\Core\model\ConceptoGasto;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;

include_once dirname(__DIR__). '/conf/init.php';

class AddConceptoGastoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getConceptoGastoService();

		\Logger::getLogger(__CLASS__)->info("agregando ConceptoGasto");

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Varios");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Luz");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Gas");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Agua");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Teléfono");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Municipal");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Alquiler");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Supermercado");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Limpieza");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Librería");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Mantenimiento");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Cable/Internet");
		$service->add( $concepto );

		$concepto = new ConceptoGasto();
		$concepto->setNombre("Viáticos");
		$service->add( $concepto );


	}
}
?>
