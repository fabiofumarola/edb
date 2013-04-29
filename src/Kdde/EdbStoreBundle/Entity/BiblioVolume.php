<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BiblioVolume
 */
class BiblioVolume
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
     * @return BiblioVolume
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
     * @return BiblioVolume
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
     * @return BiblioVolume
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
     * @return BiblioVolume
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
}
