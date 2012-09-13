<?php
namespace Kdde\EdbStoreBundle\Entity;


use Doctrine\ORM\EntityRepository;

class PertinenceRepository extends EntityRepository{

	public function findOneByAreaContextPosition($locusId,$areaId,$contextId,$positionId,$inSitu){
		$query = $this->getEntityManager()->createQuery('SELECT p FROM 
				KddeEdbStoreBundle:Pertinence p JOIN p.locus l JOIN p.pertinenceArea pa JOIN p.context pc JOIN 
				p.pertinencePosition pp WHERE l.id = :locusId AND pa.id = :areaId AND pc.id = :contextId and p.inSitu = :inSitu');
		
		return $query->setParameter('locusId', $locusId)->setParameter('areaId', $areaId)->setParameter('contextId', $contextId)->setParameter('inSitu', $inSitu)
		->getResult(); 
	}
}
