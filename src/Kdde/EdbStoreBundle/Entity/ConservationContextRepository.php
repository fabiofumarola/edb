<?php
namespace Kdde\EdbStoreBundle\Entity;


use Doctrine\ORM\EntityRepository;

class ConservationContextRepository extends EntityRepository{

	public function findAllByIdLocation($id){
		
		$query =  $this->getEntityManager()->createQuery('SELECT cc FROM 
				KddeEdbStoreBundle:ConservationContext cc JOIN cc.conservationLocation cl WHERE cl.id = :id');
		
		return $query->setParameter('id', $id)->getResult();
	}
	
	public function findByDescriptionAndIdLocation($description, $idLocation){
		
		$query = $this->getEntityManager()->createQuery('Select cc FROM KddeEdbStoreBundle:ConservationContext cc 
				JOIN cc.conservationLocation cl WHERE cc.description = :description AND cl.id = :id');
		
		return $query->setParameter('description', $description)->setParameter('id', $idLocation)->getResult();
	}
}
