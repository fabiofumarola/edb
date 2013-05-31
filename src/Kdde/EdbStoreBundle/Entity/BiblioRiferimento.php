<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="biblio_riferimento")
 */
class BiblioRiferimento
{
   /**
	 * @ORM\Id
	 * @ORM\Column(type="string",name="id")
	*/
    protected $id;

    /**
     * @ORM\Column(type="string", name="tipo")
     */
    protected $tipo;

    /**
     * @ORM\Column(type="string", name="sigla")
     * @var string
     */
    protected $sigla;

    /**
     * @ORM\Column(type="string", name="titolo")
     * @var string
     */
    protected $titolo;

    /**
     * @ORM\Column(type="string", name="volume")
     * @var string
     */
    protected $volume;

    /**
     * @ORM\Column(type="string", name="numero")
     * @var string
     */
    protected $numero;

    /**
     * @ORM\Column(type="integer", name="pagine_da")
     * @var integer
     */
    protected $pagineDa;

    /**
     * @ORM\Column(type="integer", name="pagine_a")
     * @var integer
     */
    protected $pagineA;

    /**
     * @ORM\Column(type="string", name="autori")
     * @var string
     */
    protected $autori;

    /**
     * @ORM\Column(type="string", name="anno")
     * @var integer
     */
    protected $anno;

    /**
     * @ORM\Column(type="string", name="citta_edizione")
     * @var string
     */
    protected $cittaEdizione;

    /**
     * @ORM\Column(type="string", name="figure")
     * @var string
     */
    protected $figure;
    
    /**
     * @ORM\Column(type="string", name="url")
     * @var string
     */
    protected $url;

    /**
     * @ORM\Column(type="string", name="doi")
     * @var string
     */
    protected $doi;

	/**
     * @ManyToOne(targetEntity="BiblioRivista")
     * @JoinColumn(name="id_rivista", referencedColumnName="id")
     */
    protected $idRivista;


	/**
     * @ManyToOne(targetEntity="BiblioConvegno")
     * @JoinColumn(name="id_convegno", referencedColumnName="id")
     */
    protected $idConvegno;

    
	/**
     * @ManyToOne(targetEntity="BiblioVolume")
     * @JoinColumn(name="id_volume", referencedColumnName="id")
     */
    protected $idVolume;


    /**
     * Constructor
     */
    public function __construct()
    { 
    	
    }
    
    /**
     * Set id
     * @param string $id
     * @return string
     */
    public function setId($id)
    {
    	$this->id = $id;
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
     * Set figure
     *
     * @param string $figure
     * @return string
     */
    public function setFigure($figure)
    {
    	$this->figure = $figure;
    
    	return $this;
    }
    
    /**
     * Get figures
     *
     * @return string
     */
    public function getFigure()
    {
    	return $this->figure;
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
    public function setIdRivista($idRivista)
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
}
