<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class EpigraphRepository extends EntityRepository {

	
	
	public function findBasicSearch($searchArray, $roles) {
	
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
	
	
		// Read the search parameters
		//--------------------------------------------------------------------------------
		$id = null;
		if (strlen($searchArray['id']))
			$id = $searchArray['id'];
	
		$icvrId = null;
		if (strlen($searchArray['icvr']))
			$icvrId = $searchArray['icvr'];
	
		$principalProgNumber = null;
		if (strlen($searchArray['principalProgNumber']))
			$principalProgNumber = $searchArray['principalProgNumber'];
			
		$type = $searchArray['type'];
	
		$areaId = null;
		if (strlen($searchArray['area']))
		{
			$areaContext = explode('@_@', $searchArray['area']);
			$areaId = $areaContext[0];
			$contextId = $areaContext[1];
			if($contextId == '')
				$contextId = null;
		}
	
		
		$cons_areaId = null;
		if (strlen($searchArray['cons_area']))
		{
			$consareaContext = explode('@_@', $searchArray['cons_area']);
			$cons_areaId = $consareaContext[0];
			$cons_contextId = $consareaContext[1];
			if($cons_contextId == '')
				$cons_contextId = null;
		}
			
		$transcription = null;
		if (strlen($searchArray['transcription']))
			$transcription = $searchArray['transcription'];
	
		$useThesaurus = false;
		if (isset($searchArray['thesaurus']))
			$useThesaurus = true;
	
		$yesDiacr = false;
		if (isset($searchArray['yesdiacr']))
			$yesDiacr = true;
	
		$yesGreek = false;
		if (isset($searchArray['yesgreek']))
			$yesGreek = true;
	
		//--------------------------------------------------------------------------------
	
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
	
	
		if ($cons_areaId != null) {
			$strQuerySelect .= "JOIN ep.conservations co JOIN co.conservationLocation cl ";
			$strQueryWhere .= "AND cl.id = :cons_areaId ";
		}
	
		if ($cons_contextId != null) {
			$strQuerySelect .= "JOIN co.conservationContext cc ";
			$strQueryWhere .= "AND cc.id = :cons_contextId ";
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
	
		if (!$isAdmin)
			$strQuery = $strQuerySelect . "WHERE ep.status = :status " . $strQueryWhere;
		else
			$strQuery = $strQuerySelect . "WHERE 1 = 1 " . $strQueryWhere;
	
		$strQuery = $strQuery . " ORDER BY ep.id";
		$query = $this->getEntityManager()->createQuery($strQuery);
	
		if(!$isAdmin)
			$query->setParameter('status', 2);
	
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
	
	
		if ($cons_areaId != null) {
			$query->setParameter('cons_areaId', $cons_areaId);
		}
	
		if ($cons_contextId != null) {
			$query->setParameter('cons_contextId', $cons_contextId);
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
	
	
	public function findBasicSearch_old($searchArray, $roles) {
		
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
		
		
		// Read the search parameters
		//--------------------------------------------------------------------------------
		$id = null;
		if (strlen($searchArray['id'])) 
			$id = $searchArray['id'];

		$icvrId = null;
		if (strlen($searchArray['icvr']))
			$icvrId = $searchArray['icvr'];
		
		$principalProgNumber = null;
		if (strlen($searchArray['principalProgNumber']))
			$principalProgNumber = $searchArray['principalProgNumber'];
			
		$type = $searchArray['type'];
		
		$areaId = null;
		if (strlen($searchArray['area']))
			$areaId = $searchArray['area'];

		$contextId = null;
		if (strlen($searchArray['context'])) 
			$contextId = $searchArray['context'];
		
		$positionId = null;
		if (strlen($searchArray['position']))
			$positionId = $searchArray['position'];
		
		$cons_areaId = null;
		if (strlen($searchArray['cons_area']))
			$cons_areaId = $searchArray['cons_area'];
		
		$cons_contextId = null;
		if (strlen($searchArray['cons_context']))
			$cons_contextId = $searchArray['cons_context'];
		
		$cons_positionId = null;
		if (strlen($searchArray['cons_position']))
			$cons_positionId = $searchArray['cons_position'];
		
		$transcription = null;
		if (strlen($searchArray['transcription']))
			$transcription = $searchArray['transcription'];

		$useThesaurus = false;
		if (isset($searchArray['thesaurus']))
			$useThesaurus = true;
		
		$yesDiacr = false;
		if (isset($searchArray['yesdiacr']))
			$yesDiacr = true;
		
		$yesGreek = false;
		if (isset($searchArray['yesgreek']))
			$yesGreek = true;
		
		//--------------------------------------------------------------------------------
				
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
		
		if ($positionId != null) {
			$strQuerySelect .= "JOIN pe.pertinencePosition po ";
			$strQueryWhere .= "AND po.id = :positionId ";
		}
		
		if ($cons_areaId != null) {
			$strQuerySelect .= "JOIN ep.conservations co JOIN co.conservationLocation cl ";
			$strQueryWhere .= "AND cl.id = :cons_areaId ";
		}
		
		if ($cons_contextId != null) {
			$strQuerySelect .= "JOIN co.conservationContext cc ";
			$strQueryWhere .= "AND cc.id = :cons_contextId ";
		}
		
		if ($cons_positionId != null) {
			$strQuerySelect .= "JOIN co.conservationPosition cp ";
			$strQueryWhere .= "AND cp.id = :cons_positionId ";
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

		if (!$isAdmin)
			$strQuery = $strQuerySelect . "WHERE ep.status = :status " . $strQueryWhere;
		else
			$strQuery = $strQuerySelect . "WHERE 1 = 1 " . $strQueryWhere;
		
		$strQuery = $strQuery . " ORDER BY ep.id";
		$query = $this->getEntityManager()->createQuery($strQuery);
		
		if(!$isAdmin)
			$query->setParameter('status', 2);
		
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
		
		if ($positionId != null) {
			$query->setParameter('positionId', $positionId);
		}
		
		if ($cons_areaId != null) {
			$query->setParameter('cons_areaId', $cons_areaId);
		}
		
		if ($cons_contextId != null) {
			$query->setParameter('cons_contextId', $cons_contextId);
		}
		
		if ($cons_positionId != null) {
			$query->setParameter('cons_positionId', $cons_positionId);
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