<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="biblio_volume")
 */
class BiblioVolume
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
     * @var string
     */
    protected $annoEdizione;

    /**
     * @ORM\Column(type="string", name="citta_edizione")
     * @var string
     */
    protected $cittaEdizione;


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
