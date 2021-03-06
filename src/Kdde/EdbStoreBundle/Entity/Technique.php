<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tecnica")
 */
class Technique {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=3, name="cod_tecnica")
	 * @var string
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=50, name="desc_tecnica")
	 * @var unknown_type
	 */
	protected $description;

	
	/**
	 * @ORM\Column(type="string", name="url_tecnica")
	 * @var string
	 */
	protected $url;
	

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
    
    
    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
    	return $this->url;
    }
}