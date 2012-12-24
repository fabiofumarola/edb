<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="luogo")
 */
class Location {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id_luogo")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=50, name="locus_inventionis")
	 * @var unknown_type
	 */
	protected $locusInventionis = 'Roma';
	
	/**
	 * @ORM\Column(type="string", length=100, name="citta_conservazione")
	 * @var unknown_type
	 */
	protected $conservationCity = 'n.d.';
	
	/**
	 * @ORM\Column(type="string", length=255, name="struttura_conservazione")
	 * @var unknown_type
	 */
	protected $conservationBuilding = 'n.d.';
	
	/**
	 * @ORM\Column(type="string", length=255, name="pos_specifica_conservazione")
	 * @var unknown_type
	 */
	protected $conservationSpecificPosition = 'n.d.';
	
	
	/**
	 * @ORM\Column(type="string", length=50, name="area_di_pertinenza")
	 * @var unknown_type
	 */
	protected $pertinenceArea = 'n.d.';
	
	/**
 	 * @ManyToOne(targetEntity="Context")
 	 * @JoinColumn(name="contesto_di_pertinenza", referencedColumnName="cod_contesto")
 	 * @var Context
	 */
	protected $pertinenceContext;
	
	/**
	 * @ORM\Column(type="string", length=255, name="posizione_nel_contesto")
	 * @var unknown_type
	 */
	protected $contextPosition = 'n.d.';
	
	/**
	 * @ORM\Column(type="string", length=50, name="specifica_pos_contesto")
	 * @var unknown_type
	 */
	protected $specificContextPosition = 'n.d.';
	
	

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
     * Set locusInventionis
     *
     * @param string $locusInventionis
     */
    public function setLocusInventionis($locusInventionis)
    {
        $this->locusInventionis = $locusInventionis;
    }

    /**
     * Get locusInventionis
     *
     * @return string 
     */
    public function getLocusInventionis()
    {
        return $this->locusInventionis;
    }

    /**
     * Set conservationCity
     *
     * @param string $conservationCity
     */
    public function setConservationCity($conservationCity)
    {
        $this->conservationCity = $conservationCity;
    }

    /**
     * Get conservationCity
     *
     * @return string 
     */
    public function getConservationCity()
    {
        return $this->conservationCity;
    }

    /**
     * Set conservationBuilding
     *
     * @param string $conservationBuilding
     */
    public function setConservationBuilding($conservationBuilding)
    {
        $this->conservationBuilding = $conservationBuilding;
    }

    /**
     * Get conservationBuilding
     *
     * @return string 
     */
    public function getConservationBuilding()
    {
        return $this->conservationBuilding;
    }

    /**
     * Set conservationSpecificPosition
     *
     * @param string $conservationSpecificPosition
     */
    public function setConservationSpecificPosition($conservationSpecificPosition)
    {
        $this->conservationSpecificPosition = $conservationSpecificPosition;
    }

    /**
     * Get conservationSpecificPosition
     *
     * @return string 
     */
    public function getConservationSpecificPosition()
    {
        return $this->conservationSpecificPosition;
    }

    /**
     * Set pertinenceArea
     *
     * @param string $pertinenceArea
     */
    public function setPertinenceArea($pertinenceArea)
    {
        $this->pertinenceArea = $pertinenceArea;
    }

    /**
     * Get pertinenceArea
     *
     * @return string 
     */
    public function getPertinenceArea()
    {
        return $this->pertinenceArea;
    }

    /**
     * Set contextPosition
     *
     * @param string $contextPosition
     */
    public function setContextPosition($contextPosition)
    {
        $this->contextPosition = $contextPosition;
    }

    /**
     * Get contextPosition
     *
     * @return string 
     */
    public function getContextPosition()
    {
        return $this->contextPosition;
    }

    /**
     * Set specificContextPosition
     *
     * @param string $specificContextPosition
     */
    public function setSpecificContextPosition($specificContextPosition)
    {
        $this->specificContextPosition = $specificContextPosition;
    }

    /**
     * Get specificContextPosition
     *
     * @return string 
     */
    public function getSpecificContextPosition()
    {
        return $this->specificContextPosition;
    }

    /**
     * Set pertinenceContext
     *
     * @param Kdde\EdbStoreBundle\Entity\Context $pertinenceContext
     */
    public function setPertinenceContext(\Kdde\EdbStoreBundle\Entity\Context $pertinenceContext)
    {
        $this->pertinenceContext = $pertinenceContext;
    }

    /**
     * Get pertinenceContext
     *
     * @return Kdde\EdbStoreBundle\Entity\Context 
     */
    public function getPertinenceContext()
    {
        return $this->pertinenceContext;
    }
}