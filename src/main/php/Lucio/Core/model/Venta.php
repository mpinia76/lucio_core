<?php

namespace Lucio\Core\model;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * Venta
 *
 * @Entity @Table(name="lucio_venta")
 *
 * @author Marcos
 * @since 12-03-2018
 */

class Venta extends Entity{

    //variables de instancia.

    /**
     * @Column(type="datetime")
     * @var \Datetime
     */
    private $fecha;

    /**
     * @ManyToOne(targetEntity="Cliente",cascade={"merge"})
     * @JoinColumn(name="cliente_oid", referencedColumnName="oid")
     * @var Cliente
     **/
    private $cliente;

    /**
     * @ManyToOne(targetEntity="Cliente",cascade={"merge"})
     * @JoinColumn(name="cliente_oid1", referencedColumnName="oid")
     * @var Cliente1
     **/
    private $cliente1;

    /**
     * @ManyToOne(targetEntity="Cliente",cascade={"merge"})
     * @JoinColumn(name="cliente_oid2", referencedColumnName="oid")
     * @var Cliente2
     **/
    private $cliente2;



    /**
     * @Column(type="float")
     * @var float
     */
    private $monto;

    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $montoPagadoCliente;




    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $montoPagadoCliente1;




    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $montoPagadoCliente2;

    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $montoDebe;


    /**
     * @return Cliente1
     */
    public function getCliente1()
    {
        return $this->cliente1;
    }

    /**
     * @param Cliente1 $cliente1
     */
    public function setCliente1($cliente1)
    {
        $this->cliente1 = $cliente1;
    }

    /**
     * @return Cliente2
     */
    public function getCliente2()
    {
        return $this->cliente2;
    }

    /**
     * @param Cliente2 $cliente2
     */
    public function setCliente2($cliente2)
    {
        $this->cliente2 = $cliente2;
    }

    /**
     * @return float
     */
    public function getMontoPagadoCliente()
    {
        return $this->montoPagadoCliente;
    }

    /**
     * @param float $montoPagadoCliente
     */
    public function setMontoPagadoCliente($montoPagadoCliente)
    {
        $this->montoPagadoCliente = $montoPagadoCliente;
    }

    /**
     * @return float
     */
    public function getMontoDebeCliente()
    {
        return $this->montoDebeCliente;
    }

    /**
     * @param float $montoDebeCliente
     */
    public function setMontoDebeCliente($montoDebeCliente)
    {
        $this->montoDebeCliente = $montoDebeCliente;
    }

    /**
     * @return float
     */
    public function getMontoPagadoCliente1()
    {
        return $this->montoPagadoCliente1;
    }

    /**
     * @param float $montoPagadoCliente1
     */
    public function setMontoPagadoCliente1($montoPagadoCliente1)
    {
        $this->montoPagadoCliente1 = $montoPagadoCliente1;
    }

    /**
     * @return float
     */
    public function getMontoDebeCliente1()
    {
        return $this->montoDebeCliente1;
    }

    /**
     * @param float $montoDebeCliente1
     */
    public function setMontoDebeCliente1($montoDebeCliente1)
    {
        $this->montoDebeCliente1 = $montoDebeCliente1;
    }

    /**
     * @return float
     */
    public function getMontoPagadoCliente2()
    {
        return $this->montoPagadoCliente2;
    }

    /**
     * @param float $montoPagadoCliente2
     */
    public function setMontoPagadoCliente2($montoPagadoCliente2)
    {
        $this->montoPagadoCliente2 = $montoPagadoCliente2;
    }

    /**
     * @return float
     */
    public function getMontoDebeCliente2()
    {
        return $this->montoDebeCliente2;
    }

    /**
     * @param float $montoDebeCliente2
     */
    public function setMontoDebeCliente2($montoDebeCliente2)
    {
        $this->montoDebeCliente2 = $montoDebeCliente2;
    }

    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $ganancia;

    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $montoDevolucion;

    /**
     * @Column(type="float", nullable=true)
     * @var float
     */
    private $montoActualizado;

    /**
     * @Column(type="integer")
     * @var EstadoVenta
     */
    private $estado;

    /**
     * @Column(type="string", nullable=true)
     * @var string
     */
    private $observaciones;




    /**
     * @ManyToOne(targetEntity="Cose\Security\model\User",cascade={"merge"})
     * @JoinColumn(name="user_oid", referencedColumnName="oid")
     *
     * usuario q generó la operación
     **/
    private $user;


    /**
     * @OneToMany(targetEntity="DetalleVenta", mappedBy="venta", cascade={"persist"})
     **/
    private $detalles;

    /**
     * @OneToMany(targetEntity="DevolucionVenta", mappedBy="venta", cascade={"persist"})
     **/
    private $devoluciones;

    public function __construct(){
        $this->detalles = array();
        $this->devoluciones = array();
        //$this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return "";
    }




    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }



    public function getMonto()
    {
        return $this->monto;
    }

    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    public function getMontoDebe()
    {
        return $this->montoDebe;
    }

    public function setMontoDebe($montoDebe)
    {
        $this->montoDebe = $montoDebe;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }



    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function addDetalle( DetalleVenta $detalle ){

        $detalle->setVenta( $this );
        $this->detalles[] = $detalle;

    }

    public function addDevolucion( DevolucionVenta $devolucion ){

        $devolucion->setVenta( $this );
        $this->devoluciones[] = $devolucion;

    }

    public function getDetalles()
    {
        return $this->detalles;
    }

    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;
    }

    public function getDevoluciones()
    {
        return $this->devoluciones;
    }

    public function setDevoluciones($devoluciones)
    {
        $this->devoluciones = $devoluciones;
    }

    public  function podesAnularte(){

        return $this->getEstado() != EstadoVenta::Anulada;

    }

    public  function podesCobrarte(){

        return ($this->getEstado() != EstadoVenta::Anulada) && ($this->getEstado() != EstadoVenta::Pagada);

    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getMontoPagado()
    {
        return $this->montoPagado;
    }

    public function setMontoPagado($montoPagado)
    {
        $this->montoPagado = $montoPagado;
    }

    public function getGanancia()
    {
        return $this->ganancia;
    }

    public function setGanancia($ganancia)
    {
        $this->ganancia = $ganancia;
    }

    public function getMontoDevolucion()
    {
        return $this->montoDevolucion;
    }

    public function setMontoDevolucion($montoDevolucion)
    {
        $this->montoDevolucion = $montoDevolucion;
    }

    public function getMontoActualizado()
    {
        return $this->montoActualizado;
    }

    public function setMontoActualizado($montoActualizado)
    {
        $this->montoActualizado = $montoActualizado;
    }
}
?>
