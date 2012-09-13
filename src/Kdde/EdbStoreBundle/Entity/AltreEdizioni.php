<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="altre_edizioni")
 */
class AltreEdizioni {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id_bibliografia")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="text", name="autore")
	 * @var unknown_type
	 */
	protected $arrayAutore;
	

   

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
     * Set arrayAutore
     *
     * @param text $arrayAutore
     */
    public function setArrayAutore($arrayAutore)
    {
        $this->arrayAutore = $arrayAutore;
    }

    /**
     * Get arrayAutore
     *
     * @return text 
     */
    public function getArrayAutore()
    {
        return $this->arrayAutore;
    }
}