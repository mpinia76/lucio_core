<?php
namespace Lucio\Core\service\impl;


use Lucio\Core\dao\DAOFactory;

use Lucio\Core\service\ICompaniaService;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;


/**
 * servicio para Compania
 *
 * @author Marcos
 * @since 20-01-2021
 *
 */
class CompaniaServiceImpl extends CrudService implements ICompaniaService {


	protected function getDAO(){
		return DAOFactory::getCompaniaDAO();
	}


	/**
	 * redefino el add para agregar funcionalidad
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		/*
		 * Hacemos lo que queremos con la estado.
		 * Por ejemplo, enviar un email al usuario.
		 */

		//agregamos la estado.
		parent::add($entity);

	}

	function validateOnAdd( $entity ){

		/*
		 * Realizamos validaciones sobre la estado.
		 * Por ejemplo, campos obligatorios.
		 */
	}


	function validateOnUpdate( $entity ){

		/*
		 * Validaciones como en el add pero
		 * las necesarias para modificar.
		 */

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){

		/*
		 * validaciones al borrar una estado.
		 */
	}




}
