<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="data")
 */
class Data {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id_data")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=50, name="da")
	 * @var unknown_type
	 */
	protected $from;
	
	/**
	 * @ORM\Column(type="string", length=50, name="a")
	 * @var unknown_type
	 */
	protected $to;
	

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
     * Set from
     *
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * Get from
     *
     * @return string 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * Get to
     *
     * @return string 
     */
    public function getTo()
    {
        return $this->to;
    }
}