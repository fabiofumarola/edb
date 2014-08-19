<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="conservazione_luogo")
 */
class ConservationLocation {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=100, name="descrizione")
	 * @var string
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string", name="id_geonames")
	 * @var string
	 */
	protected $idgeonames;
	
	/**
	 * @ORM\Column(type="string", name="nazione")
	 * @var string
	 */
	protected $country;
	
	/**
	 * @ORM\Column(type="string", name="nazione_id_geonames")
	 * @var string
	 */
	protected $countryidgeonames;
    
    public function getId()
    {
        return $this->id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function setIdgeonames($idgeonames)
    {
    	$this->idgeonames = $idgeonames;
    }
    
    public function getIdgeonames()
    {
    	return $this->idgeonames;
    }
    
    public function setCountry($country)
    {
    	$this->country = $country;
    }
    
    public function getCountry()
    {
    	return $this->country;
    }
    
    public function setCountryidgeonames($countryidgeonames)
    {
    	$this->countryidgeonames = $countryidgeonames;
    }
    
    public function getCountryidgeonames()
    {
    	return $this->countryidgeonames;
    }
}