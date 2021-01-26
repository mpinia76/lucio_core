<?php
namespace Lucio\Core\dao;

use Cose\exception\DAOException;

use Cose\Crud\dao\ICrudDAO;

/**
 * Interface del DAO de Combo
 *
 * @author Marcos
 *
 */
interface IComboDAO extends ICrudDAO {
	function vaciarProductos($oid);
}
