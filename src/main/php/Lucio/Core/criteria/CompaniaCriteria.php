<?php
namespace Lucio\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de compania
 *
 * @author Marcos
 *
 */
class CompaniaCriteria extends Criteria{

	private $nombre;
	private $mail;
	private $documento;

	private $tieneCtaCte;

	private $razonSocial;

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getMail()
	{
	    return $this->mail;
	}

	public function setMail($mail)
	{
	    $this->mail = $mail;
	}

	public function getDocumento()
	{
	    return $this->documento;
	}

	public function setDocumento($documento)
	{
	    $this->documento = $documento;
	}

	public function getTieneCtaCte()
	{
	    return $this->tieneCtaCte;
	}

	public function setTieneCtaCte($tieneCtaCte)
	{
	    $this->tieneCtaCte = $tieneCtaCte;
	}

	public function getRazonSocial()
	{
	    return $this->razonSocial;
	}

	public function setRazonSocial($razonSocial)
	{
	    $this->razonSocial = $razonSocial;
	}
}
