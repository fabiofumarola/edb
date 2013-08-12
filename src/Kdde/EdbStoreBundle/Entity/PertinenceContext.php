<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\PertinenceContextRepository")
 * @ORM\Table(name="pertinenza_contesto")
 */
class PertinenceContext {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100, name="descrizione")
	 * @var string
	 */
	protected $description;
			
	/**
 	 * @ManyToOne(targetEntity="PertinenceArea")
 	 * @JoinColumn(name="id_area", referencedColumnName="id")
 	 * @var Context
	 */
	protected $area;
	
	/**
	 * @ORM\Column(type="geopoint", name="geoposition")
	 * @var string
	 */
	protected $geoposition;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id){
    	$this->id = $id;
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
     * Set area
     *
     * @param Kdde\EdbStoreBundle\Entity\PertinenceArea $area
     */
    public function setArea(\Kdde\EdbStoreBundle\Entity\PertinenceArea $area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return Kdde\EdbStoreBundle\Entity\PertinenceArea 
     */
    public function getArea()
    {
        return $this->area;
    }
    
    public function getGeoposition(){
    	return $this->geoposition;
    }
    
    public function setGeoposition($geoposition)
    {
    	$this->geoposition = $geoposition;
    }
}