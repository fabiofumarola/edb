<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="biblio_convegno")
 */
class BiblioConvegno
{
    /**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	*/
    protected $id;

    /**
     * @ORM\Column(type="string", name="titolo")
     * @var string
     */
    protected $titolo;

    /**
     * @ORM\Column(type="string", name="editori")
     * @var string
     */
    protected $editori;

    /**
     * @ORM\Column(type="integer", name="anno_edizione")
     * @var integer
     */
    protected $annoEdizione;

    /**
     * @ORM\Column(type="string", name="citta_edizione")
     * @var string
     */
    protected $cittaEdizione;

    /**
     * @ORM\Column(type="string", name="luogo_convegno")
     * @var string
     */
    protected $luogoConvegno;

    /**
     * @ORM\Column(type="string", name="data_convegno")
     * @var string
     */
    protected $dataConvegno;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     * @return BiblioConvegno
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
     * Set editori
     *
     * @param string $editori
     * @return BiblioConvegno
     */
    public function setEditori($editori)
    {
        $this->editori = $editori;
    
        return $this;
    }

    /**
     * Get editori
     *
     * @return string 
     */
    public function getEditori()
    {
        return $this->editori;
    }

    /**
     * Set annoEdizione
     *
     * @param integer $annoEdizione
     * @return BiblioConvegno
     */
    public function setAnnoEdizione($annoEdizione)
    {
        $this->annoEdizione = $annoEdizione;
    
        return $this;
    }

    /**
     * Get annoEdizione
     *
     * @return integer 
     */
    public function getAnnoEdizione()
    {
        return $this->annoEdizione;
    }

    /**
     * Set cittaEdizione
     *
     * @param string $cittaEdizione
     * @return BiblioConvegno
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
     * Set luogoConvegno
     *
     * @param string $luogoConvegno
     * @return BiblioConvegno
     */
    public function setLuogoConvegno($luogoConvegno)
    {
        $this->luogoConvegno = $luogoConvegno;
    
        return $this;
    }

    /**
     * Get luogoConvegno
     *
     * @return string 
     */
    public function getLuogoConvegno()
    {
        return $this->luogoConvegno;
    }

    /**
     * Set dataConvegno
     *
     * @param string $dataConvegno
     * @return BiblioConvegno
     */
    public function setDataConvegno($dataConvegno)
    {
        $this->dataConvegno = $dataConvegno;
    
        return $this;
    }

    /**
     * Get dataConvegno
     *
     * @return string 
     */
    public function getDataConvegno()
    {
        return $this->dataConvegno;
    }
}
