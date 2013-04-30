<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="biblio_riferimento_epigrafe")
 */
class BiblioRiferimentoEpigrafe
{
	/**
	 * @ORM\Id
	 * @ManyToOne(targetEntity="Epigraph")
	 * @JoinColumn(name="id_epigrafe", referencedColumnName="id_edb")
	 */
	protected $idEpigrafe;
	
	/**
	 * @ORM\Id
	 * @ManyToOne(targetEntity="BiblioRiferimento")
	 * @JoinColumn(name="id_riferimento", referencedColumnName="id")
	 */
	protected $idRiferimento;
	
	/**
	 * @ORM\Column(type="string",name="note")
	 */
	protected $note;
	
	public function getIdEpigrafe()
	{
		return $idEpigrafe;
	}
	
	public function setIdEpigrafe($idEpigrafe)
	{
		$this->idEpigrafe = $idEpigrafe;
	}
	
	public function getIdRiferimento()
	{
		return $idRiferimento;
	}
	
	public function setIdRiferimento($idRiferimento)
	{
		$this->idRiferimento = $idRiferimento;
	}
	
	public function getNote()
	{
		return $note;
	}
	
	public function setNote($note)
	{
		$this->note = $note;
	}
}