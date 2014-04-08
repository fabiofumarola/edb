<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="funzione")
 */
class Funzione {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=3, name="cod_funzione")
	 * @var string
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100, name="desc_funzione")
	 * @var string
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string", name="url_funzione")
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