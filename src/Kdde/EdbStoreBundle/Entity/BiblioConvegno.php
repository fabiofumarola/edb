<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BiblioConvegno
 */
class BiblioConvegno
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titolo;

    /**
     * @var string
     */
    private $editori;

    /**
     * @var integer
     */
    private $annoEdizione;

    /**
     * @var string
     */
    private $cittaEdizione;

    /**
     * @var string
     */
    private $luogoConvegno;

    /**
     * @var string
     */
    private $dataConvegno;


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
