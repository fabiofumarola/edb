<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="materiale")
 */
class Material {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id_materiale")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;
		
	/**
 	 * @ManyToOne(targetEntity="Support")
 	 * @JoinColumn(name="supporto", referencedColumnName="cod_supporto")
 	 * @var Context
	 */
	protected $support;
	
	/**
	 * @ManyToOne(targetEntity="Technique")
	 * @JoinColumn(name="tecnica", referencedColumnName="cod_tecnica")
	 * @var Context
	 */
	protected $technique;
	
	/**
	 * @ORM\Column(type="string", length="10", name="altezza")
	 * @var string
	 */
	protected $height;
	
	/**
	 * @ORM\Column(type="string", length="10", name="larghezza")
	 * @var string
	 */
	protected $width = 'n.d.';
	
	/**
	 * @ORM\Column(type="string", length="10", name="spessore")
	 * @var string
	 */
	protected $tickness = 'n.d.';


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
     * Set height
     *
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Get height
     *
     * @return string 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set width
     *
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Get width
     *
     * @return string 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set tickness
     *
     * @param string $tickness
     */
    public function setTickness($tickness)
    {
        $this->tickness = $tickness;
    }

    /**
     * Get tickness
     *
     * @return string 
     */
    public function getTickness()
    {
        return $this->tickness;
    }

    /**
     * Set support
     *
     * @param Kdde\EdbStoreBundle\Entity\Support $support
     */
    public function setSupport(\Kdde\EdbStoreBundle\Entity\Support $support)
    {
        $this->support = $support;
    }

    /**
     * Get support
     *
     * @return Kdde\EdbStoreBundle\Entity\Support 
     */
    public function getSupport()
    {
        return $this->support;
    }

    /**
     * Set technique
     *
     * @param Kdde\EdbStoreBundle\Entity\Technique $technique
     */
    public function setTechnique(\Kdde\EdbStoreBundle\Entity\Technique $technique)
    {
        $this->technique = $technique;
    }

    /**
     * Get technique
     *
     * @return Kdde\EdbStoreBundle\Entity\Technique 
     */
    public function getTechnique()
    {
        return $this->technique;
    }
}