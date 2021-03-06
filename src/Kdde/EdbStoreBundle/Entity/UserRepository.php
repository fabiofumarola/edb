<?php
namespace Kdde\EdbStoreBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class UserRepository extends EntityRepository implements UserProviderInterface {

	public function loadUserByUsername($username) {
		$q = $this->createQueryBuilder('u')->select('u, g')
				->leftJoin('u.groups', 'g')
				->where('u.username = :username OR u.email = :email')
				->setParameter('username', $username)
				->setParameter('email', $username)->getQuery();
		try {
			// The Query::getSingleResult() method throws an exception
			// if there is no record matching the criteria.
			$user = $q->getSingleResult();
		} catch (NoResultException $e) {
			$message = 'Unable to find an active admin KddeEdbStoreBundle:User object identified by ' . $username;
			throw new UsernameNotFoundException($message, 0, $e);
		}
		return $user;

	}
	public function refreshUser(UserInterface $user) {
		$class = get_class($user);
		if (!$this->supportsClass($class)) {
			throw new UnsupportedUserException(
					sprintf('Instances of "%s" are not supported.', $class));
		}
		return $this->loadUserByUsername($user->getUsername());

	}
	public function supportsClass($class) {
		return $this->getEntityName() === $class
				|| is_subclass_of($class, $this->getEntityName());

	}

	public function findAllOrderedByUsername() {
		return $this->getEntityManager()
				->createQuery('SELECT u FROM KddeEdbStoreBundle:User u ORDER BY u.username ASC')
				->getResult();
	}

}
