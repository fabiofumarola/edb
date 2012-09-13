<?php
namespace Kdde\EdbStoreBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraint as Assert;

use Doctrine\ORM\Mapping\JoinTable;

use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utente")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 * @ORM\Entity(repositoryClass="Kdde\EdbStoreBundle\Entity\UserRepository")
 */
class User implements AdvancedUserInterface {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	
	/**
	 * @ORM\Column(type="string", length="100")
	 */
	protected $lastname;
	
	/**
	 * @ORM\Column(type="string", length="100")
	 */
	protected $firstname;

	/**
	 * @ORM\Column(type="string", length="25", unique="true")
	 */
	protected $username;

	/**
	 * @ORM\Column(type="string", length="32")
	 */
	protected $salt;

	/**
	 * @ORM\Column(type="string", length="255")
	 */
	protected $password;

	/**
	 * @ORM\Column(type="string", length="60", unique="true")
	 */
	protected $email;

	/**
	 * @ORM\Column(name="is_active", type="boolean")
	 */
	protected $isActive;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $last_login;

	/**
	 * @ManyToMany(targetEntity="Group", inversedBy="users")
	 * @JoinTable(name="utente_gruppo")
	 **/
	private $groups;

	public function __construct() {
		$this->isActive = true;
		$this->salt = md5(uniqid(null, true));
		$this->groups = new ArrayCollection();
		$this->isActive = false;
	}
	
	public function setId($id){
		$this->id = $id;
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	public function getGroups() {
		return $this->groups;
	}

	/**
	 * Set username
	 *
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * Get username
	 *
	 * @return string 
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Set salt
	 *
	 * @param string $salt
	 */
	public function setSalt($salt) {
		$this->salt = $salt;
	}

	/**
	 * Get salt
	 *
	 * @return string 
	 */
	public function getSalt() {
		return $this->salt;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * Get password
	 *
	 * @return string 
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Get email
	 *
	 * @return string 
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Set isActive
	 *
	 * @param boolean $isActive
	 */
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
	}

	/**
	 * Get isActive
	 *
	 * @return boolean 
	 */
	public function getIsActive() {
		return $this->isActive;
	}

	/**
	 * Set last_login
	 *
	 * @param string $lastLogin
	 */
	public function setLastLogin($lastLogin) {
		$this->last_login = $lastLogin;
	}

	/**
	 * Get last_login
	 *
	 * @return string 
	 */
	public function getLastLogin() {
		return $this->last_login;
	}

	/**
	 * Set lastname
	 *
	 * @param string $lastname
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Get lastname
	 *
	 * @return string 
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Set firstname
	 *
	 * @param string $firstname
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Get firstname
	 *
	 * @return string 
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Add groups
	 *
	 * @param Kdde\EdbStoreBundle\Entity\Group $groups
	 */
	public function addGroup(\Kdde\EdbStoreBundle\Entity\Group $groups) {
		$this->groups[] = $groups;
	}
	public function isAccountNonExpired() {
		return true;

	}
	
	public function isAccountNonLocked() {
		return true;
	}
	
	public function isCredentialsNonExpired() {
		return true;
	}
	
	public function isEnabled() {
		return $this->isActive;

	}
	
	public function getRoles(){
		return $this->groups->toArray();
	}
	
	public function eraseCredentials(){
		
	}
	
	public function equals(UserInterface $user){
		return $this->username === $user->getUsername();
	}

}
