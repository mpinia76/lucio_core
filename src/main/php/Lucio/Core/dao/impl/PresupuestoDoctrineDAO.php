<?php
namespace Lucio\Core\dao\impl;

use Lucio\Core\utils\LucioUtils;

use Doctrine\ORM\Query\Expr\Andx;

use Lucio\Core\dao\IPresupuestoDAO;

use Lucio\Core\model\Presupuesto;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;
/**
 * dao para Presupuesto
 *
 * @author Marcos
 * @since 29-03-2019
 *
 */
class PresupuestoDoctrineDAO extends CrudDAO implements IPresupuestoDAO{

	protected function getClazz(){
		return get_class( new Presupuesto() );
	}

	protected function getQueryBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select(array('v', 'c'))
	   				->from( $this->getClazz(), "v")
                    ->leftJoin('v.cliente1', 'cia1')
                    ->leftJoin('v.cliente2', 'cia2')
					->leftJoin('v.cliente', 'c');

		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select('count(v.oid)')
	   				->from( $this->getClazz(), "v")
                    ->leftJoin('v.cliente1', 'cia1')
                    ->leftJoin('v.cliente2', 'cia2')

					->leftJoin('v.cliente', 'c');

		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){

		$fecha = $criteria->getFecha();
		if( !empty($fecha) ){
			$fecha->setTime(0,0,0);
			$queryBuilder->andWhere( "v.fecha >= '" . $fecha->format("Y-m-d") . "'");
			$fecha->modify("+1 day");
			$queryBuilder->andWhere( "v.fecha < '" . $fecha->format("Y-m-d") . "'");
		}

		$fechaDesde = $criteria->getFechaDesde();
		if( !empty($fechaDesde) ){
			$queryBuilder->andWhere( "v.fecha >= '" . $fechaDesde->format("Y-m-d") . "'");
		}

		$fechaHasta = $criteria->getFechaHasta();
		if( !empty($fechaHasta) ){
			$queryBuilder->andWhere( "v.fecha <= '" . $fechaHasta->format("Y-m-d") . "'");
		}



        $cliente = $criteria->getCliente();
        if( !empty($cliente) && $cliente!=null){
            if (is_object($cliente)) {
                $clienteOid = $cliente->getOid();
                if(!empty($clienteOid))
                    $queryBuilder->andWhere( "c.oid= $clienteOid" );
            }
            else $queryBuilder->andWhere( "c.nombre like '%$cliente%'");

        }

        $compania = $criteria->getCompania();
        if( !empty($compania) && $compania!=null){
            if (is_object($compania)) {
                $companiaOid = $compania->getOid();
                if(!empty($companiaOid)){
                    $queryBuilder->orWhere("cia1.oid  like :oid1");
                    $queryBuilder->setParameter( "oid1" , "$companiaOid" );
                    $queryBuilder->orWhere("cia2.oid  like :oid2");
                    $queryBuilder->setParameter( "oid2" , "$companiaOid" );


                }

            }
            else{
                $queryBuilder->orWhere("upper(cia1.nombre)  like :nombre1");
                $queryBuilder->setParameter( "nombre1" , "%$compania%" );
                $queryBuilder->orWhere("upper(cia2.nombre)  like :nombre2");
                $queryBuilder->setParameter( "nombre2" , "%$compania%" );
            }


        }



		$estadoNot = $criteria->getEstadoNotEqual();
		if( !empty($estadoNot) ){
			$queryBuilder->andWhere( "v.estado != " . $estadoNot );
		}

		$estado = $criteria->getEstado();
		if( !empty($estado) ){
			$queryBuilder->andWhere( "v.estado = " . $estado );
		}

		$estados = $criteria->getEstados();
		if( !empty($estados) && count( $estados>0) ){

			$strEstados = implode(",", $estados );

			$queryBuilder->andWhere( $queryBuilder->expr()->in("v.estado", $strEstados) );
		}

        $observaciones = $criteria->getObservaciones();
        if( !empty($observaciones) ){
            $queryBuilder->andWhere("upper(v.observaciones)  like :observaciones");
            $queryBuilder->setParameter( "observaciones" , "%$observaciones%" );
        }


	}

	protected function getFieldName($name){

		$hash = array();

		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "v.$name";
		}

	}

	public function getTotalesDia(\Datetime $fecha){

		try {
			$presupuestoClass = get_class( new Presupuesto() );

			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$q = $this->getEntityManager()->createQuery(
				"SELECT
					COUNT(v.oid) as cantidad, SUM(v.monto) as monto
					FROM $presupuestoClass v
					WHERE MONTH(v.fecha) = " . $fecha->format("m") . " AND
					YEAR(v.fecha) = " . $fecha->format("Y")  . " AND
					DAY(v.fecha) = " . $fecha->format("d")
			);

			$r = $q->getScalarResult();

			return $r;

		} catch (\Doctrine\ORM\Query\QueryException $e) {

			throw new DAOException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new DAOException( $e->getMessage() );

		}
	}

	public function getTotalesMes(\Datetime $fecha){

		try {

			$presupuestoClass = get_class( new Presupuesto() );

			$emConfig = $this->getEntityManager()->getConfiguration();
    		$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');

			$q = $this->getEntityManager()->createQuery(
				"SELECT
					COUNT(v.oid) as cantidad, SUM(v.monto) as monto
					FROM $presupuestoClass v
					WHERE MONTH(v.fecha) = " . $fecha->format("m") . " AND
					YEAR(v.fecha) = " . $fecha->format("Y")
			);

			$r = $q->getScalarResult();

			return $r;

		} catch (\Doctrine\ORM\Query\QueryException $e) {

			throw new DAOException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new DAOException( $e->getMessage() );

		}
	}
}
