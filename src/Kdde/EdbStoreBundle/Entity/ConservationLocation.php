<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="conservazione_luogo")
 */
class ConservationLocation {

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
}