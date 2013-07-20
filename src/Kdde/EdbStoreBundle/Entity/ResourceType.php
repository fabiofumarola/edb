<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tipo_risorsa_correlata")
 */
class ResourceType {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	
	/**
	 * @ORM\Column(type="string", name="nome")
	 * @var string
	 */
	protected $description;
	
	
	/**
	 * @ORM\Column(type="string", name="riferimento")
	 * @var string
	 */
	protected $reference;
	

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
    
    public function setReference($reference)
    {
    	$this->reference = $reference;
    }
    
    public function getReference()
    {
    	return $this->reference;
    }
}