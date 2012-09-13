<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\ConservationPositionRepository")
 * @ORM\Table(name="conservazione_posizione")
 */
class ConservationPosition {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length="255", name="descrizione")
	 * @var string
	 */
	protected $description;
			
	/**
 	 * @ManyToOne(targetEntity="ConservationContext")
 	 * @JoinColumn(name="id_contesto", referencedColumnName="id")
 	 * @var PertinenceContext
	 */
	protected $conservationContext;


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

    /**
     * Set conservationContext
     *
     * @param Kdde\EdbStoreBundle\Entity\ConservationContext $conservationContext
     */
    public function setConservationContext(\Kdde\EdbStoreBundle\Entity\ConservationContext $conservationContext)
    {
        $this->conservationContext = $conservationContext;
    }

    /**
     * Get conservationContext
     *
     * @return Kdde\EdbStoreBundle\Entity\ConservationContext 
     */
    public function getConservationContext()
    {
        return $this->conservationContext;
    }
}