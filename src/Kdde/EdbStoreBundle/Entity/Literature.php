<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\OneToMany;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="literature")
 */
class Literature {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="string",length="50", name="cod_literature")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="text", name="desc_literature")
	 * @var unknown_type
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="text", name="note_literature")
	 * @var unknown_type
	 */
	protected $note;
	
	/**
	 * @OneToMany(targetEntity="EpigraphLiterature", mappedBy="literature")
	 * @var EpigraphLiterature
	 */
    protected $epigraphes;
    
        
    public function __construct()
    {
        $this->epigraphes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
   
    public function __toString(){
    	return $this->title;
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
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set note
     *
     * @param text $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return text 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Add epigraphes
     *
     * @param Kdde\EdbStoreBundle\Entity\EpigraphLiterature $epigraphes
     */
    public function addEpigraphLiterature(\Kdde\EdbStoreBundle\Entity\EpigraphLiterature $epigraphes)
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