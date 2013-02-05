<?php
namespace Kdde\EdbStoreBundle\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * @ORM\Entity
 * @ORM\Table(name="data_epigrafe")
 * @ExclusionPolicy("None")
 */
class EpigraphDating {
	
	/**
	 * @ORM\ManyToOne(targetEntity="Epigraph", inversedBy="literatures")
	 * @ORM\JoinColumn(name="id_epigrafe", referencedColumnName="id_edb")
	 * @Exclude
	 */
	protected $id;
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", length=50, name="da")
	 * @var unknown_type
	 */
	protected $from;
	
	/**
	 * @ORM\Id
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
	 * Set id
	 *
	 * @param integer $from
	 */
	public function setId($id)
	{
		return $this->id = $id;
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
