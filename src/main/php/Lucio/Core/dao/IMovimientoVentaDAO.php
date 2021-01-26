<?php
namespace Lucio\Core\dao;

use Lucio\Core\model\Caja;

use Cose\exception\DAOException;

use Cose\Crud\dao\ICrudDAO;

/**
 * Interface del DAO de MovimientoVenta
 *
 * @author Marcos
 * @since 12-03-2018
 *
 */
interface IMovimientoVentaDAO extends ICrudDAO {

	function getTotalesCajaVentasOnlineCtaCte( Caja $caja );
}
