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
	 * @ORM\OrderBy({"anno" = "ASC"})
	 */
	protected $idRiferimento;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string",name="relazione")
	 */
	protected $relazione;
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string",name="note")
	 */
	protected $note = '';
	
	/**
	 * @ORM\Column(type="string", name="campo_ricerca")
	 * @var string
	 */
	protected $ricerca;
	
	public function getIdEpigrafe()
	{
		return $this->idEpigrafe;
	}
	
	public function setIdEpigrafe($idEpigrafe)
	{
		$this->idEpigrafe = $idEpigrafe;
	}
	
	public function getIdRiferimento()
	{
		return $this->idRiferimento;
	}
	
	public function setIdRiferimento($idRiferimento)
	{
		$this->idRiferimento = $idRiferimento;
	}
	
	public function getRelazione()
	{
		return $this->relazione;
	}
	
	public function setRelazione($relazione)
	{
		$this->relazione = $relazione;
	}
	
	public function getNote()
	{
		return $this->note;
	}
	
	public function setNote($note)
	{
		$this->note = $note;
	}
}