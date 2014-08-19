<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\ConservationContextRepository")
 * @ORM\Table(name="conservazione_contesto")
 */
class ConservationContext {

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
	 * @ORM\Column(type="string", name="trismegistos_id")
	 * @var string
	 */
	protected $trismegistos;
			
	/**
 	 * @ManyToOne(targetEntity="ConservationLocation")
 	 * @JoinColumn(name="id_luogo", referencedColumnName="id")
 	 * @var ConservationLocation
	 */
	protected $conservationLocation;
  

    public function getId()
    {
        return $this->id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setTrismegistos($trismegistos)
    {
    	$this->trismegistos = $trismegistos;
    }
    
    public function getTrismegistos()
    {
    	return $this->trismegistos;
    }

    
    /**
     * Set conservationLocation
     *
     * @param Kdde\EdbStoreBundle\Entity\ConservationLocation $conservationLocation
     */
    public function setConservationLocation(\Kdde\EdbStoreBundle\Entity\ConservationLocation $conservationLocation)
    {
        $this->conservationLocation = $conservationLocation;
    }

    /**
     * Get conservationLocation
     *
     * @return Kdde\EdbStoreBundle\Entity\ConservationLocation 
     */
    public function getConservationLocation()
    {
        return $this->conservationLocation;
    }
}