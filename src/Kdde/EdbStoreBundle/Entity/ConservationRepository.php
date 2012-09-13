<?php
namespace Kdde\EdbStoreBundle\Entity;


use Doctrine\ORM\EntityRepository;

class ConservationRepository extends EntityRepository{

	public function findOneByLocationContextPosition($contextId, $locationId, $positionId){
		
		$query = $this->getEntityManager()->createQuery('Select c FROM KddeEdbStoreBundle:Conservation c
				JOIN c.conservationLocation cl JOIN c.conservationContext cc JOIN c.conservationPosition cp WHERE cl.id = :contextId AND cc.id = :locationId 
				AND cp.id = :positionId');
		
		return $query->setParameter('contextId', $contextId)->setParameter('locationId', $locationId)->setParameter('positionId', $positionId)->getResult();
	}
}
