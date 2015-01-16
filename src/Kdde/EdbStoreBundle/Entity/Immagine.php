<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity
 * @ORM\Table(name="immagine")
 */
class Immagine {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="id_immagine")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var unknown_type
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", name="tipo")
	 * @var unknown_type
	 */
	protected $tipo;
	
	/**
	 * @ORM\Column(type="string", name="concessione")
	 * @var unknown_type
	 */
	protected $concessione;
	
	/**
	 * @ORM\Column(type="string", name="fonte")
	 * @var unknown_type
	 */
	protected $fonte;
	
	/**
	 * @ORM\Column(type="integer", name="anno")
	 * @var unknown_type
	 */
	protected $anno;
	
	/**
	 * @ORM\Column(type="string", name="url")
	 * @var unknown_type
	 */
	protected $url;

	/**
	 * 
 	 * @ManyToOne(targetEntity="BiblioRiferimento")
 	 * @JoinColumn(name="ref_biblio", referencedColumnName="id")
	 */
	protected $refbiblio;
		
	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}
	
	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}
	public function getTipo()
	{
		return $this->tipo;
	}
	
	public function setConcessione($concessione)
	{
		$this->concessione = $concessione;
	}
	public function getConcessione()
	{
		return $this->concessione;
	}
	
	public function setFonte($fonte)
	{
		$this->fonte = $fonte;
	}
	public function getFonte()
	{
		return $this->fonte;
	}
	
	public function setAnno($anno)
	{
		$this->anno = $anno;
	}
	public function getAnno()
	{
		return $this->anno;
	}
	
	public function setUrl($url)
	{
		$this->url = $url;
	}
	public function getUrl()
	{
		return $this->url;
	}
   
	public function setRefbiblio($refbiblio)
	{
		$this->refbiblio = $refbiblio;
	}
	public function getRefbiblio()
	{
		return $this->refbiblio;
	}
}