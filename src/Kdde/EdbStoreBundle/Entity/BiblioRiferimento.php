<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BiblioRiferimento
 */
class BiblioRiferimento
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $titolo;

    /**
     * @var string
     */
    private $volume;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var integer
     */
    private $pagineDa;

    /**
     * @var integer
     */
    private $pagineA;

    /**
     * @var string
     */
    private $autori;

    /**
     * @var integer
     */
    private $anno;

    /**
     * @var string
     */
    private $cittaEdizione;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $doi;

    /**
     * @var \Kdde\EdbStoreBundle\Entity\BiblioRivista
     */
    private $idRivista;

    /**
     * @var \Kdde\EdbStoreBundle\Entity\BiblioConvegno
     */
    private $idConvegno;

    /**
     * @var \Kdde\EdbStoreBundle\Entity\BiblioVolume
     */
    private $idVolume;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idEpigrafe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEpigrafe = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return BiblioRiferimento
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set sigla
     *
     * @param string $sigla
     * @return BiblioRiferimento
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    
        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     * @return BiblioRiferimento
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    
        return $this;
    }

    /**
     * Get titolo
     *
     * @return string 
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * Set volume
     *
     * @param string $volume
     * @return BiblioRiferimento
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    
        return $this;
    }

    /**
     * Get volume
     *
     * @return string 
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return BiblioRiferimento
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set pagineDa
     *
     * @param integer $pagineDa
     * @return BiblioRiferimento
     */
    public function setPagineDa($pagineDa)
    {
        $this->pagineDa = $pagineDa;
    
        return $this;
    }

    /**
     * Get pagineDa
     *
     * @return integer 
     */
    public function getPagineDa()
    {
        return $this->pagineDa;
    }

    /**
     * Set pagineA
     *
     * @param integer $pagineA
     * @return BiblioRiferimento
     */
    public function setPagineA($pagineA)
    {
        $this->pagineA = $pagineA;
    
        return $this;
    }

    /**
     * Get pagineA
     *
     * @return integer 
     */
    public function getPagineA()
    {
        return $this->pagineA;
    }

    /**
     * Set autori
     *
     * @param string $autori
     * @return BiblioRiferimento
     */
    public function setAutori($autori)
    {
        $this->autori = $autori;
    
        return $this;
    }

    /**
     * Get autori
     *
     * @return string 
     */
    public function getAutori()
    {
        return $this->autori;
    }

    /**
     * Set anno
     *
     * @param integer $anno
     * @return BiblioRiferimento
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;
    
        return $this;
    }

    /**
     * Get anno
     *
     * @return integer 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set cittaEdizione
     *
     * @param string $cittaEdizione
     * @return BiblioRiferimento
     */
    public function setCittaEdizione($cittaEdizione)
    {
        $this->cittaEdizione = $cittaEdizione;
    
        return $this;
    }

    /**
     * Get cittaEdizione
     *
     * @return string 
     */
    public function getCittaEdizione()
    {
        return $this->cittaEdizione;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return BiblioRiferimento
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set doi
     *
     * @param string $doi
     * @return BiblioRiferimento
     */
    public function setDoi($doi)
    {
        $this->doi = $doi;
    
        return $this;
    }

    /**
     * Get doi
     *
     * @return string 
     */
    public function getDoi()
    {
        return $this->doi;
    }

    /**
     * Set idRivista
     *
     * @param \Kdde\EdbStoreBundle\Entity\BiblioRivista $idRivista
     * @return BiblioRiferimento
     */
    public function setIdRivista(\Kdde\EdbStoreBundle\Entity\BiblioRivista $idRivista = null)
    {
        $this->idRivista = $idRivista;
    
        return $this;
    }

    /**
     * Get idRivista
     *
     * @return \Kdde\EdbStoreBundle\Entity\BiblioRivista 
     */
    public function getIdRivista()
    {
        return $this->idRivista;
    }

    /**
     * Set idConvegno
     *
     * @param \Kdde\EdbStoreBundle\Entity\BiblioConvegno $idConvegno
     * @return BiblioRiferimento
     */
    public function setIdConvegno(\Kdde\EdbStoreBundle\Entity\BiblioConvegno $idConvegno = null)
    {
        $this->idConvegno = $idConvegno;
    
        return $this;
    }

    /**
     * Get idConvegno
     *
     * @return \Kdde\EdbStoreBundle\Entity\BiblioConvegno 
     */
    public function getIdConvegno()
    {
        return $this->idConvegno;
    }

    /**
     * Set idVolume
     *
     * @param \Kdde\EdbStoreBundle\Entity\BiblioVolume $idVolume
     * @return BiblioRiferimento
     */
    public function setIdVolume(\Kdde\EdbStoreBundle\Entity\BiblioVolume $idVolume = null)
    {
        $this->idVolume = $idVolume;
    
        return $this;
    }

    /**
     * Get idVolume
     *
     * @return \Kdde\EdbStoreBundle\Entity\BiblioVolume 
     */
    public function getIdVolume()
    {
        return $this->idVolume;
    }

    /**
     * Add idEpigrafe
     *
     * @param \Kdde\EdbStoreBundle\Entity\Epigrafe $idEpigrafe
     * @return BiblioRiferimento
     */
    public function addIdEpigrafe(\Kdde\EdbStoreBundle\Entity\Epigrafe $idEpigrafe)
    {
        $this->idEpigrafe[] = $idEpigrafe;
    
        return $this;
    }

    /**
     * Remove idEpigrafe
     *
     * @param \Kdde\EdbStoreBundle\Entity\Epigrafe $idEpigrafe
     */
    public function removeIdEpigrafe(\Kdde\EdbStoreBundle\Entity\Epigrafe $idEpigrafe)
    {
        $this->idEpigrafe->removeElement($idEpigrafe);
    }

    /**
     * Get idEpigrafe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdEpigrafe()
    {
        return $this->idEpigrafe;
    }
}
