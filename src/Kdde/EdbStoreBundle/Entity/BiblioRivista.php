<?php

namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="biblio_rivista")
 */
class BiblioRivista
{
   /**
	 * @ORM\Id
	 * @ORM\Column(type="integer",name="id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	*/
    private $id;

    
    /**
     * @ORM\Column(type="string", name="titolo")
     * @var string
     */
    private $titolo;


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
     * Set titolo
     *
     * @param string $titolo
     * @return BiblioRivista
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    
        return $this;
    }

    /**
     * Get titolo
     *
     * @return string 
     */
    public function getTitolo()
    {
        return $this->titolo;
    }
}
