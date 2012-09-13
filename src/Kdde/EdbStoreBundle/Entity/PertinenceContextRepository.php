<?php
namespace Kdde\EdbStoreBundle\Entity;


use Doctrine\ORM\EntityRepository;

class PertinenceContextRepository extends EntityRepository{

	public function findAllByIdArea($id){
		
		$query =  $this->getEntityManager()->createQuery('SELECT pc FROM 
				KddeEdbStoreBundle:PertinenceContext pc JOIN pc.area a WHERE a.id = :id');
		
		return $query->setParameter('id', $id)->getResult();
	}
	
	public function findByDescriptionAndIdArea($description, $idArea){
		
		$query = $this->getEntityManager()->createQuery('Select pc FROM KddeEdbStoreBundle:PertinenceContext pc 
				JOIN pc.area a WHERE pc.description = :description AND a.id = :id');
		
		return $query->setParameter('description', $description)->setParameter('id', $idArea)->getResult();
	}
}
