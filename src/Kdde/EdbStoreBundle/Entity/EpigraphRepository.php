<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class EpigraphRepository extends EntityRepository {

	
	public function findBasicSearch($id, $icvrId, $principalProgNumber, $areaId,
			$contextId, $transcription, $useThesaurus, $type, $yesGreek, $yesDiacr) {

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
				if($yesGreek && $yesDiacr)
					$field = "ep.trascription";
				else if($yesGreek)
					$field = "ep.trascription_nodiacr";
				else if($yesDiacr)
					$field = "ep.trascription_nogreek";
				else
					$field = "ep.trascription_nodiacr_nogreek";
				
				$words = explode(" ", $transcription);
				$count = 1;
				foreach($words as $word)
				{					
					$strQueryWhere .= "AND LOWER(" . $field . ") LIKE ";
					if($yesGreek && $yesDiacr)
						$transc = "CONCAT(CONCAT('%', :transcription" . $count . "),'%') ";
					else if($yesGreek)
						$transc = "CONCAT(CONCAT('%',REMOVEDIACR(:transcription" . $count . ")),'%') ";
					else if($yesDiacr)
						$transc = "CONCAT(CONCAT('%',REMOVEGREEKS(:transcription" . $count . ")),'%') ";
					else
						$transc = "CONCAT(CONCAT('%',REMOVEGREEKS(REMOVEDIACR(:transcription" . $count . "))),'%') ";
					$strQueryWhere .= $transc;
					
					$count++;
				}
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
			$query->setParameter('principalProgNumber', $principalProgNumber);
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
				$count = 1;
				foreach($words as $word)	
				{
					$query->setParameter('transcription'.$count, $word);
					$count++;
				}
			}
			else
			{
				$query->setParameter('queryWords', $words);
			}
		}
		
		return $query;

	}
}