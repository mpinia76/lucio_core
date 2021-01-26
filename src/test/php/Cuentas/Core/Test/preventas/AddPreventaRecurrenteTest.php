<?php

namespace Lucio\Core\Test\preventas;

use Lucio\Core\model\DetallePreventaRecurrente;

use Lucio\Core\utils\LucioUtils;

use Lucio\Core\model\PreventaRecurrente;

use Lucio\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Lucio\Core\service\ServiceFactory;
use Lucio\Core\criteria\PreventaRecurrenteCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddPreventaRecurrenteTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		\Logger::getLogger(__CLASS__)->info("agregando PreventaRecurrente");

		$empleado = ServiceFactory::getEmpleadoService()->get( LucioUtils::CTS_EMPLEADO_DEFAULT );
		$cliente = ServiceFactory::getClienteService()->get( LucioUtils::CTS_CLIENTE_DEFAULT );
		$sucursal = ServiceFactory::getSucursalService()->get( LucioUtils::CTS_SUCURSAL_DEFAULT );

		$preventaRecurrente = new PreventaRecurrente();
		$preventaRecurrente->setCliente($cliente);
		$preventaRecurrente->setVendedor($empleado);
		$preventaRecurrente->setLunes(1);
		$preventaRecurrente->setMiercoles(1);

		$detalle = new DetallePreventaRecurrente();
		$detalle->setCantidad(1);
		$detalle->setObservaciones("8 9 13 22 30 31");
		$detalle->setPrecioUnitario(20);
		$detalle->setProducto( ServiceFactory::getProductoService()->get(1) );
		$preventaRecurrente->addDetalle($detalle);

		$this->persistenceContext->beginTransaction();

		$service->add( $preventaRecurrente );


		$this->persistenceContext->commit();
	}
}
?>
