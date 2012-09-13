<?php

namespace Kdde\EdbStoreBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="gruppo")
 */
class Group implements RoleInterface{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length="30", unique="true")
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length="30", unique="true", name="role_name")
	 * @var unknown_type
	 */
	protected $roleName;
	
// 	/**
// 	 * @ManyToMany(targetEntity="User", mappedBy="groups")
// 	 **/
// 	private $users;
	
	public function __construct() {
// 		$this->users = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->name;
    }
    
    /**
     * @param String $role
     */
    public function setRoleName($roleName){
    	$this->roleName = $roleName;
    }
    
    public function getRoleName(){
    	return $this->roleName;
    }
    
    public function __toString(){
    	return $this->roleName;
    }

//     /**
//      * Add users
//      *
//      * @param Kdde\EdbStoreBundle\Entity\User $users
//      */
//     public function addUser(\Kdde\EdbStoreBundle\Entity\User $users)
//     {
//         $this->users[] = $users;
//     }

//     /**
//      * Get users
//      *
//      * @return Doctrine\Common\Collections\Collection 
//      */
//     public function getUsers()
//     {
//         return $this->users;
//     }
}