<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\PertinenceRepository")
 * @ORM\Table(name="pertinenza")
 */
class Pertinence {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ManyToOne(targetEntity="LocusInventionis")
 	 * @JoinColumn(name="locus", referencedColumnName="id")
	 * 
	 */
	protected $locus;
	
	/**
	 * @ManyToOne(targetEntity="PertinenceArea")
 	 * @JoinColumn(name="area", referencedColumnName="id")
	 * @var PertinenceArea
	 */
	protected $pertinenceArea;
		
	/**
 	 * @ManyToOne(targetEntity="PertinenceContext")
 	 * @JoinColumn(name="contesto", referencedColumnName="id")
 	 * @var Context
	 */
	protected $context;
	
	/**
	 * @ManyToOne(targetEntity="PertinencePosition")
	 * @JoinColumn(name="posizione", referencedColumnName="id")
	 * @var Context
	 */
	protected $pertinencePosition;
	
	/**
	 * @ORM\Column(type="boolean", name="in_situ")
	 * @var string
	 */
	protected $inSitu;
	

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
     * Set inSitu
     *
     * @param boolean $inSitu
     */
    public function setInSitu($inSitu)
    {
        $this->inSitu = $inSitu;
    }

    /**
     * Get inSitu
     *
     * @return boolean 
     */
    public function getInSitu()
    {
        return $this->inSitu;
    }

    /**
     * Set locus
     *
     * @param Kdde\EdbStoreBundle\Entity\LocusInventionis $locus
     */
    public function setLocus(\Kdde\EdbStoreBundle\Entity\LocusInventionis $locus)
    {
        $this->locus = $locus;
    }

    /**
     * Get locus
     *
     * @return Kdde\EdbStoreBundle\Entity\LocusInventionis 
     */
    public function getLocus()
    {
        return $this->locus;
    }

    /**
     * Set pertinenceArea
     *
     * @param Kdde\EdbStoreBundle\Entity\PertinenceArea $pertinenceArea
     */
    public function setPertinenceArea(\Kdde\EdbStoreBundle\Entity\PertinenceArea $pertinenceArea)
    {
        $this->pertinenceArea = $pertinenceArea;
    }

    /**
     * Get pertinenceArea
     *
     * @return Kdde\EdbStoreBundle\Entity\PertinenceArea 
     */
    public function getPertinenceArea()
    {
        return $this->pertinenceArea;
    }

    /**
     * Set context
     *
     * @param Kdde\EdbStoreBundle\Entity\PertinenceContext $context
     */
    public function setContext(\Kdde\EdbStoreBundle\Entity\PertinenceContext $context)
    {
        $this->context = $context;
    }

    /**
     * Get context
     *
     * @return Kdde\EdbStoreBundle\Entity\PertinenceContext 
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set pertinencePosition
     *
     * @param Kdde\EdbStoreBundle\Entity\PertinencePosition $pertinencePosition
     */
    public function setPertinencePosition(\Kdde\EdbStoreBundle\Entity\PertinencePosition $pertinencePosition)
    {
        $this->pertinencePosition = $pertinencePosition;
    }

    /**
     * Get pertinencePosition
     *
     * @return Kdde\EdbStoreBundle\Entity\PertinencePosition 
     */
    public function getPertinencePosition()
    {
        return $this->pertinencePosition;
    }
}