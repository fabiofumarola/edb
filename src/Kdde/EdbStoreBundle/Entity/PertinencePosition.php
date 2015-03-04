<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\PertinencePositionRepository")
 * @ORM\Table(name="pertinenza_posizione")
 */
class PertinencePosition {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=255, name="descrizione")
	 * @var string
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string", name="link_norbert")
	 * @var string
	 */
	protected $link;
			
	/**
 	 * @ManyToOne(targetEntity="PertinenceContext")
 	 * @JoinColumn(name="id_contesto", referencedColumnName="id")
 	 * @var PertinenceContext
	 */
	protected $pertinenceContext;

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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function getLink()
    {
    	return $this->link;
    }
    
    public function setLink($link)
    {
    	$this->link = link;
    }
    
    
    /**
     * Set pertinenceContext
     *
     * @param Kdde\EdbStoreBundle\Entity\PertinenceContext $pertinenceContext
     */
    public function setPertinenceContext(\Kdde\EdbStoreBundle\Entity\PertinenceContext $pertinenceContext)
    {
        $this->pertinenceContext = $pertinenceContext;
    }

    /**
     * Get pertinenceContext
     *
     * @return Kdde\EdbStoreBundle\Entity\PertinenceContext 
     */
    public function getPertinenceContext()
    {
        return $this->pertinenceContext;
    }
}