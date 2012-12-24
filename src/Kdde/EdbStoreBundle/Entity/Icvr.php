<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="icvr")
 */
class Icvr {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id_edizione")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=4, name="corpus")
	 * @var unknown_type
	 */
	protected $corpus = 'ICVR';
	
	
	/**
	 * @ORM\Column(type="string", length=5, name="volume")
	 * @var unknown_type
	 */
	protected $volume = 'ICVR';
	

	public function __construct(){
		
	}
	
	

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
     * Set corpus
     *
     * @param string $corpus
     */
    public function setCorpus($corpus)
    {
        $this->corpus = $corpus;
    }

    /**
     * Get corpus
     *
     * @return string 
     */
    public function getCorpus()
    {
        return $this->corpus;
    }

    /**
     * Set volume
     *
     * @param string $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * Get volume
     *
     * @return string 
     */
    public function getVolume()
    {
        return $this->volume;
    }
    
    public function __toString(){
    	return $this->volume;
    }
}