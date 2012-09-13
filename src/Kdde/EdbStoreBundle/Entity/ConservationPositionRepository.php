<?php
namespace Kdde\EdbStoreBundle\Entity;


use Doctrine\ORM\EntityRepository;

class ConservationPositionRepository extends EntityRepository{

	public function findAllByIdContext($id){
		
		$query =  $this->getEntityManager()->createQuery('SELECT cp FROM 
				KddeEdbStoreBundle:ConservationPosition cp JOIN cp.conservationContext cc WHERE cc.id = :id');
		
		return $query->setParameter('id', $id)->getResult();
	}
	
	public function findByDescriptionAndIdContext($description, $idContext){
		
		$query = $this->getEntityManager()->createQuery('Select cp FROM KddeEdbStoreBundle:ConservationPosition cp 
				JOIN cp.conservationContext cc WHERE cp.description = :description AND cc.id = :id');
		
		return $query->setParameter('description', $description)->setParameter('id', $idContext)->getResult();
	}
}
