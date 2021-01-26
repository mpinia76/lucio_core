<?php

namespace Lucio\Core\Test\conceptosMovimiento;

use Lucio\Core\model\ConceptoMovimiento;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;

include_once dirname(__DIR__). '/conf/init.php';

class AddConceptoMovimientoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getConceptoMovimientoService();

		\Logger::getLogger(__CLASS__)->info("agregando ConceptoMovimiento");

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Venta");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Pago");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Gasto");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Anulación Venta");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Anulación Gasto");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Pago de premio");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Anulación Pago de premio");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Retiro de efectivo");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Anulación Retiro de efectivo");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Transferencia entre cuentas");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Anulación Transferencia entre cuentas");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Pedido");
		$service->add( $concepto );

		$concepto = new ConceptoMovimiento();
		$concepto->setNombre("Anulación Pedido");
		$service->add( $concepto );
	}
}
?>
