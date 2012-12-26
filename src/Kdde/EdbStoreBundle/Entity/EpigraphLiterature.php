<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="epigrafe_literature")
 */
class EpigraphLiterature {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;

	/**
	 * @ManyToOne(targetEntity="Epigraph",inversedBy="literatures")
 	 * @JoinColumn(name="id_epigrafe", referencedColumnName="id_edb")
	 * @var Epigraph
	 */
	protected $epigraph;
	
	/**
	 * @ManyToOne(targetEntity="Literature",inversedBy="epigraphes")
 	 * @JoinColumn(name="id_literature", referencedColumnName="cod_literature")
	 */
	protected $literature;
	
	/**
	 * @ORM\Column(type="string", length=255, name="riferimento")
	 * @var unknown_type
	 */
	protected $reference;
	   

    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
     * Set reference
     *
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set epigraph
     *
     * @param Kdde\EdbStoreBundle\Entity\Epigraph $epigraph
     */
    public function setEpigraph(\Kdde\EdbStoreBundle\Entity\Epigraph $epigraph)
    {
        $this->epigraph = $epigraph;
    }

    /**
     * Get epigraph
     *
     * @return Kdde\EdbStoreBundle\Entity\Epigraph 
     */
    public function getEpigraph()
    {
        return $this->epigraph;
    }

    /**
     * Set literature
     *
     * @param Kdde\EdbStoreBundle\Entity\Literature $literature
     */
    public function setLiterature(\Kdde\EdbStoreBundle\Entity\Literature $literature)
    {
        $this->literature = $literature;
    }

    /**
     * Get literature
     *
     * @return Kdde\EdbStoreBundle\Entity\Literature 
     */
    public function getLiterature()
    {
        return $this->literature;
    }
    
    public function __toString(){
    	return $this->literature->getId();
    }
}