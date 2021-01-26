<?php
namespace Lucio\Core\service\impl;


use Lucio\Core\model\CategoriaProducto;

use Lucio\Core\model\Cuenta;

use Lucio\Core\service\IMovimientoCuentaService;

use Lucio\Core\model\MovimientoVenta;

use Lucio\Core\service\ServiceFactory;

use Lucio\Core\model\Caja;

use Lucio\Core\model\Venta;

use Lucio\Core\model\EstadoVenta;

use Lucio\Core\service\IVentaService;

use Lucio\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\Security\model\User;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para MovimientoVenta
 *
 * @author Marcos
 * @since 12-03-2018
 *
 */
class MovimientoVentaServiceImpl extends MovimientoCajaServiceImpl {


	protected function getDAO(){
		return DAOFactory::getMovimientoVentaDAO();
	}

	public function getTotalesCajaVentasOnlineCtaCte( Caja $caja ){

		$result = $this->getDAO()->getTotalesCajaVentasOnlineCtaCte($caja);
		$totales = $result[0];
		return $totales["haber"] - $totales["debe"];

	}

	function getTotales( Cuenta $cuenta=null, \Datetime $fecha = null){

		$result = $this->getDAO()->getTotales($cuenta, $fecha);
		$totales = $result[0];
		return $totales["haber"] - $totales["debe"];

	}



	function getTotalesPorCategoria( Cuenta $cuenta=null, \Datetime $fecha = null){

		$result = $this->getDAO()->getTotalesPorCategoria($cuenta, $fecha);
		return $result;

	}

	function getTotalesMes( Cuenta $cuenta=null, \Datetime $fecha = null){

		$result = $this->getDAO()->getTotalesMes($cuenta, $fecha);
		return $result;

	}

	function getTotalesAnioPorMes( Cuenta $cuenta=null, $anio){

		$result = $this->getDAO()->getTotalesAnioPorMes($cuenta, $anio);
		return $result;

	}

}
