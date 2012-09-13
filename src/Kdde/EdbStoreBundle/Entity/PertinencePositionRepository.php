<?php
namespace Kdde\EdbStoreBundle\Entity;


use Doctrine\ORM\EntityRepository;

class PertinencePositionRepository extends EntityRepository{

	public function findAllOrderedByDescriptionAndByContextId($id){
		
		$query =  $this->getEntityManager()->createQuery('SELECT pp FROM 
				KddeEdbStoreBundle:PertinencePosition pp JOIN pp.pertinenceContext pc WHERE pc.id = :id');
		
		return $query->setParameter('id', $id)->getResult();
	}
	
	public function findByDescriptionAndIdContext($description, $idContext){
		
		$query = $this->getEntityManager()->createQuery('Select pp FROM KddeEdbStoreBundle:PertinencePosition pp 
				JOIN pp.pertinenceContext pc WHERE pp.description = :description AND pc.id = :id');
		
		return $query->setParameter('description', $description)->setParameter('id', $idContext)->getResult();
	}
}
