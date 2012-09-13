<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\ManyToMany;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\ConservationRepository")
 * @ORM\Table(name="conservazione")
 */
class Conservation {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
		
	/**
	 * @ManyToOne(targetEntity="ConservationLocation")
 	 * @JoinColumn(name="luogo", referencedColumnName="id")
	 * @var ConservationLocation
	 */
	protected $conservationLocation;
		
	/**
 	 * @ManyToOne(targetEntity="ConservationContext")
 	 * @JoinColumn(name="contesto", referencedColumnName="id")
 	 * @var ConservationContext
	 */
	protected $conservationContext;
	
	/**
	 * @ManyToOne(targetEntity="ConservationPosition")
	 * @JoinColumn(name="posizione", referencedColumnName="id")
	 * @var ConservationPosition
	 */
	protected $conservationPosition;
	
	/**
	 * @ManyToMany(targetEntity="Epigraph", mappedBy="conservations")
	 * @var Epigraph array
	 */
	private $epigraphes;
	
	public function __construct(){
		$this->epigraphes = new ArrayCollection();
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

    /**
     * Set conservationPosition
     *
     * @param Kdde\EdbStoreBundle\Entity\ConservationPosition $conservationPosition
     */
    public function setConservationPosition(\Kdde\EdbStoreBundle\Entity\ConservationPosition $conservationPosition)
    {
        $this->conservationPosition = $conservationPosition;
    }

    /**
     * Get conservationPosition
     *
     * @return Kdde\EdbStoreBundle\Entity\ConservationPosition 
     */
    public function getConservationPosition()
    {
        return $this->conservationPosition;
    }

    /**
     * Add epigraphes
     *
     * @param Kdde\EdbStoreBundle\Entity\Epigraph $epigraphes
     */
    public function addEpigraph(\Kdde\EdbStoreBundle\Entity\Epigraph $epigraphes)
    {
        $this->epigraphes[] = $epigraphes;
    }

    /**
     * Get epigraphes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEpigraphes()
    {
        return $this->epigraphes;
    }
}