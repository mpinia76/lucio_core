<?php
namespace Lucio\Core\service\impl;


use Lucio\Core\model\MovimientoCuenta;

use Lucio\Core\model\Cuenta;

use Lucio\Core\criteria\CuentaCriteria;

use Lucio\Core\model\Empleado;

use Lucio\Core\service\ICuentaService;

use Lucio\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para cuenta
 *
 * @author Marcos
 * @since 09-03-2018
 *
 */
class CuentaServiceImpl extends CrudService implements ICuentaService {


	protected function getDAO(){
		return DAOFactory::getCuentaDAO();
	}

	function validateOnAdd( $entity ){

		//unicidad (numero + fecha + horaApertura )

	}


	function validateOnUpdate( $entity ){

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){}




}
