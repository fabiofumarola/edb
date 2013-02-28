<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class EpigraphRepository extends EntityRepository {

	
	public function findBasicSearch($id, $icvrId, $principalProgNumber, $areaId,
			$contextId, $transcription, $useThesaurus, $type) {

		$strQuerySelect = "SELECT ep FROM KddeEdbStoreBundle:Epigraph ep ";
		$strQueryWhere = "";
				
		if ($id != null) {
			$strQueryWhere .= "AND ep.id = :id ";
		}

		if ($icvrId != null) {
			$strQuerySelect .= "JOIN ep.icvr ic ";
			$strQueryWhere .= "AND ic.id = :icvrId ";
		}

		if ($principalProgNumber != null) {
			$strQueryWhere .= "AND ep.principalProgNumber = :principalProgNumber ";
		}

		if ($areaId != null) {
			$strQuerySelect .= "JOIN ep.pertinences pe JOIN pe.pertinenceArea pa ";
			$strQueryWhere .= "AND pa.id = :areaId ";
		}

		if ($contextId != null) {
			$strQuerySelect .= "JOIN pe.context pc ";
			$strQueryWhere .= "AND pc.id = :contextId ";
		}

		if ($transcription != null) {
			if ($useThesaurus == true) {
				$words = str_replace(" ", " & ", $transcription);
				$strQueryWhere .= "AND MATCHTEXT(:queryWords,ep.ts_testo) = 1 ";
			}
			else{
				$words = explode(" ", $transcription);
				foreach($words as $word)
					$strQueryWhere .= "AND LOWER(ep.trascription) LIKE :transcription" . $word . " ";
			}
		}
				
		if ($type != -1)
			$strQueryWhere .= "AND ep.epigraph_type = :epi_type ";
				
		$strQuery = $strQuerySelect . "WHERE ep.isActive = :epi_active " . $strQueryWhere;
		$query = $this->getEntityManager()->createQuery($strQuery);
		
		$query->setParameter('epi_active', true);
		
		if ($id != null) {
			$query->setParameter('id', $id);
		}
		
		if ($icvrId != null) {
			$query->setParameter('icvrId', $icvrId);
		}
		
		if ($principalProgNumber != null) {
			$query->setParameter('principalProgNumber', strtolower($principalProgNumber));
		}
		
		if ($type != -1)
			$query->setParameter('epi_type', $type);
		
		if ($areaId != null) {
			$query->setParameter('areaId', $areaId);
		}

		if ($contextId != null) {
			$query->setParameter('contextId', $contextId);
		}

		if ($transcription != null) {
			if ($useThesaurus == false) {
				foreach($words as $word)	
// 				$transcription = '%'.$transcription . '%';
					$query->setParameter('transcription'.$word, '%'.$word.'%');
			}
			else
			{
				$query->setParameter('queryWords', $words);
			}
		}
		
		return $query;

	}
}