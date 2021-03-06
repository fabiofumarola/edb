<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="paleografia")
 */
class Paleography {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=5, name="cod_paleografia")
	 * @var string
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=50, name="desc_paleografia")
	 * @var string
	 */
	protected $description;


    /**
     * Set id
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get id
     *
     * @return string 
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