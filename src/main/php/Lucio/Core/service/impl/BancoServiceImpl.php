<?php
namespace Lucio\Core\service\impl;


use Lucio\Core\criteria\BancoCriteria;

use Lucio\Core\model\Cliente;

use Lucio\Core\service\IBancoService;

use Lucio\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para Banco
 *
 * @author Marcos
 * @since 21-03-2018
 *
 */
class BancoServiceImpl extends CrudService implements IBancoService {


	protected function getDAO(){
		return DAOFactory::getBancoDAO();
	}

	function add( $entity ){

		$entity->setSaldo( $entity->getSaldoInicial() );

		parent::add( $entity );


	}

	function validateOnAdd( $entity ){

		//TODO que tenga cliente?

		//TODO unicidad (cliente )

	}


	function validateOnUpdate( $entity ){

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){}



}
