<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\ManyToMany;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="signa")
 */
class Signa {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length="2", name="cod_signa")
	 * @var unknown_type
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length="50", name="desc_signa")
	 * @var unknown_type
	 */
	protected $description;
	
// 	/**
// 	 * @ManyToMany(targetEntity="Epigraph", mappedBy="signas")
// 	 * @var Epigraph array
// 	 */
// 	protected $epigraphes;
	
	public function __construct()
	{
		//$this->epigraphes = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
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
    
//     /**
//      * Add epigraphes
//      *
//      * @param Kdde\EdbStoreBundle\Entity\Epigraph $epigraphes
//      */
//     public function addEpigraph(\Kdde\EdbStoreBundle\Entity\Epigraph $epigraphes)
//     {
//         $this->epigraphes[] = $epigraphes;
//     }

//     /**
//      * Get epigraphes
//      *
//      * @return Doctrine\Common\Collections\Collection 
//      */
//     public function getEpigraphes()
//     {
//         return $this->epigraphes;
//     }
}