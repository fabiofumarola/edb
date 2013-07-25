<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\ExclusionPolicy;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="risorsa_correlata")
 * @ExclusionPolicy("None")
 */
class RelatedResource {

	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Epigraph", inversedBy="relatedResources")
	 * @ORM\JoinColumn(name="id_epigrafe", referencedColumnName="id_edb")
	 * @Exclude
	 */
	protected $idEpigrafe;

	
	/**
	 * @ORM\Id
	 * @ManyToOne(targetEntity="ResourceType")
	 * @JoinColumn(name="tipo_risorsa", referencedColumnName="id")
	 * @var integer
	 */
	protected $resourceType;
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", name="riferimento_risorsa")
	 * @var string
	 */
	protected $resourceRef;
	
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", name="tipo_relazione")
	 * @var string
	 */
	protected $relationType;

	

    public function getIdEpigrafe()
    {
        return $this->id;
    }
    
    public function setIdEpigrafe($id)
    {
    	$this->id = $id;
    }
    
    public function setResourceType($resourceType)
    {
        $this->resourceType = $resourceType;
    }

    public function getResourceType()
    {
        return $this->resourceType;
    }

    public function setResourceRef($resourceRef)
    {
        $this->resourceRef = $resourceRef;
    }

    public function getResourceRef()
    {
        return $this->resourceRef;
    }

    public function setRelationType($relationType)
    {
        $this->relationType = $relationType;
    }

    public function getRelationType()
    {
        return $this->relationType;
    }
}