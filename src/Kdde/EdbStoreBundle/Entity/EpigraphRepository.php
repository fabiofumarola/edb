<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class EpigraphRepository extends EntityRepository {

	public function findQuickSearch($searchArray, $roles)
	{
		$id = $searchArray['id_edb'];
		$icvrNumber = $searchArray['icvr_number'];
		$icvrSubNumber = $searchArray['icvr_subnumber'];
		$text = $searchArray['freetext'];
		$biblio = $searchArray['bibliography'];
		
		// Compose the query
		// --------------------------------------------------------------------------------------------------------
		$strQuery = "SELECT ep FROM KddeEdbStoreBundle:Epigraph ep WHERE 1 = 1";
		
		
		if(strlen($id))
			$strQuery .= " AND ep.id = :id"; 
		

		$strQuery = $strQuery . " ORDER BY ep.id";
		$query = $this->getEntityManager()->createQuery($strQuery);
		// --------------------------------------------------------------------------------------------------------
		
	
		// Set the parameters
		// --------------------------------------------------------------------------------------------------------
		if(strlen($id))
			$query->setParameter('id', $id);
			
		// --------------------------------------------------------------------------------------------------------
		return $query;
	}
	
	
	
	
	
	
	
	public function findBasicSearch($searchArray, $roles) {
	
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
	
	
		// Read the search parameters
		//--------------------------------------------------------------------------------	
		$icvrId = $searchArray['icvr'];
		$icvrNumber = $searchArray['icvr_number'];
		
		$biblio = null;
		if (strlen($searchArray['biblio']))
			$biblio = $searchArray['biblio'];

		$type = $searchArray['type'];
		$inSitu = $searchArray['insitu'];
		$lost = $searchArray['lost'];
		
		$opistographic = $searchArray['opistographic'];
		$metrical = $searchArray['metrical'];
		$greek = $searchArray['greek'];
		$greeklatin = $searchArray['greeklatin'];
		
		$support = $searchArray['support'];
		$notSupport = isset($searchArray['notSupport']);
		
		$technique = $searchArray['technique'];
		$notTechnique = isset($searchArray['notTechnique']);
		
		$function = $searchArray['function'];
		$notFunction = isset($searchArray['notFunction']);
		
		$compiler = $searchArray['compiler'];
			
		$dating = $searchArray['dating'];
		$from = $searchArray['from'];
		$to = $searchArray['to'];
			
		
		$areaId = null;
		$notArea = isset($searchArray['notOriginalContext']);
		$contextId = null;
		if (strlen($searchArray['area']))
		{
			$areaContext = explode('@_@', $searchArray['area']);
			$areaId = $areaContext[0];
			$contextId = $areaContext[1];
			if($contextId == '')
				$contextId = null;
		}
	
		$cons_areaId = null;
		$cons_contextId = null;
		$notConsArea = isset($searchArray['notConservation']);
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

		
		
		// Compose the query
		//--------------------------------------------------------------------------------
		$strQuerySelect = "SELECT ep FROM KddeEdbStoreBundle:Epigraph ep ";
		$strQueryWhere = "";
	
	
		if ($icvrId != "All") 
		{
			if($icvrId == "AllIcvr")
				$strQueryWhere .= "AND ep.icvr is NOT NULL ";
			else if($icvrId == "AllNotIcvr")
				$strQueryWhere .= "AND ep.icvr is NULL ";
			else	
			{
				$strQuerySelect .= "JOIN ep.icvr ic ";
				$strQueryWhere .= "AND ic.id = :icvrId ";
			}
		}
		
		if (strlen($icvrNumber)) 
			$strQueryWhere .= "AND ep.principalProgNumber = :icvrNumber ";
				
		
		if ($areaId != null || $inSitu != "All")
		{	
			$strQuerySelect .= "JOIN ep.pertinences pe ";
			
			if($areaId != null)
			{
				if($notArea)
					$strQueryWhere .= "AND pe.pertinenceArea <> :areaId ";
				else 
					$strQueryWhere .= "AND pe.pertinenceArea = :areaId ";
			}
				
			if($inSitu != "All")
				$strQueryWhere .= "AND pe.inSitu = :inSitu ";	
			
			if ($contextId != null) 
			{
				if($notArea)
					$strQueryWhere .= "AND pe.context <> :contextId ";
				else
					$strQueryWhere .= "AND pe.context = :contextId ";
			}
		}
	

	
		if ($cons_areaId != null) 
		{
			$strQuerySelect .= "JOIN ep.conservations co ";
			
			if($notConsArea)
				$strQueryWhere .= "AND co.conservationLocation <> :cons_areaId ";
			else
				$strQueryWhere .= "AND co.conservationLocation = :cons_areaId ";
									
			if ($cons_contextId != null) 
			{
				if($notConsArea)
					$strQueryWhere .= "AND co.conservationContext <> :cons_contextId ";
				else
					$strQueryWhere .= "AND co.conservationContext = :cons_contextId ";
			}
		}
	
		
		
		if ($biblio != null) 
		{	
			$strQuerySelect .= "JOIN ep.literatures lit_epi JOIN lit_epi.idRiferimento lit ";
			
			$biblio_words = explode(" ", $biblio);
			$count_biblio = 1;
			foreach($biblio_words as $word)
			{
				$strQueryWhere .= "AND LOWER(lit.ricerca) LIKE CONCAT(CONCAT('%', :biblio" . $count_biblio . "),'%') ";
				$count_biblio++;
			}
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
						$transc = "LOWER(CONCAT(CONCAT('%', :transcription" . $count . "),'%')) ";
					else if($yesGreek)
						$transc = "LOWER(CONCAT(CONCAT('%',REMOVEDIACR(:transcription" . $count . ")),'%')) ";
					else if($yesDiacr)
						$transc = "LOWER(CONCAT(CONCAT('%',REMOVEGREEKS(:transcription" . $count . ")),'%')) ";
					else
						$transc = "LOWER(CONCAT(CONCAT('%',REMOVEGREEKS(REMOVEDIACR(:transcription" . $count . "))),'%')) ";
					$strQueryWhere .= $transc;
						
					$count++;
				}
			}
		}
	
		if ($type != -1)
			$strQueryWhere .= "AND ep.epigraph_type = :epi_type ";
		
		if ($lost != "All")
			$strQueryWhere .= "AND ep.lost = :lost ";
					
		if ($opistographic != "All")
			$strQueryWhere .= "AND ep.reimpiego_opistografia = :opistographic ";
		
		if ($metrical != "All")
			$strQueryWhere .= "AND ep.metricText = :metrical ";
		
		if ($greek != "All")
			$strQueryWhere .= "AND ep.greek = :greek ";
		
		if ($greeklatin != "All")
			$strQueryWhere .= "AND ep.presenceLG = :greeklatin ";
		
		if ($function != "All")
		{
			if($notFunction)
				$strQueryWhere .= "AND ep.funzione <> :function ";
			else
				$strQueryWhere .= "AND ep.funzione = :function ";
		}
		
		if ($support != "All" || $technique != "All")
		{
			$strQuerySelect .= "JOIN ep.material mat ";
				
			if ($technique != "All")
			{
				if($notTechnique)
					$strQueryWhere .= "AND mat.technique <> :technique ";
				else
					$strQueryWhere .= "AND mat.technique = :technique ";		
			}
		
			if ($support != "All")
			{
				if($notSupport)
					$strQueryWhere .= "AND mat.support <> :support ";
				else		
					$strQueryWhere .= "AND mat.support = :support ";
			}
		}
		
		if ($compiler != "All")
			$strQueryWhere .= "AND ep.oldCompilator LIKE CONCAT(CONCAT('%', :compiler),'%') ";

		if(strlen($from) || strlen($to))
		{
			$strQuerySelect .= "JOIN ep.datings dat ";
				
			if(strlen($from))
				$strQueryWhere .= "AND dat.to >= :datefrom ";
				
			if(strlen($to))
				$strQueryWhere .= "AND dat.from <= :dateto ";
		}
		
		
			
		if (!$isAdmin)
			$strQuery = $strQuerySelect . "WHERE ep.status = :status " . $strQueryWhere;
		else
			$strQuery = $strQuerySelect . "WHERE 1 = 1 " . $strQueryWhere;
	
		$strQuery = $strQuery . " ORDER BY ep.id";
		$query = $this->getEntityManager()->createQuery($strQuery);
		//--------------------------------------------------------------------------------
				
		
		
		// Set the parameters
		//--------------------------------------------------------------------------------
		if(!$isAdmin)
			$query->setParameter('status', 2);
		
		if ($icvrId != "All" && $icvrId != "AllIcvr" && $icvrId != "AllNotIcvr")
			$query->setParameter('icvrId', $icvrId);	
		
		if ($icvrNumber != null) 
			$query->setParameter('icvrNumber', $icvrNumber);
				
		if ($type != -1)
			$query->setParameter('epi_type', $type);
	
		if ($lost != 'All')
			$query->setParameter('lost', $lost);
		
		if ($areaId != null) 
			$query->setParameter('areaId', $areaId);
	
		if($inSitu != "All")
			$query->setParameter('inSitu', $inSitu);
		
		if ($contextId != null) 
			$query->setParameter('contextId', $contextId);
		
		if ($cons_areaId != null) 
			$query->setParameter('cons_areaId', $cons_areaId);
		
		if ($cons_contextId != null) 
			$query->setParameter('cons_contextId', $cons_contextId);
		
		
		if ($opistographic != "All")
			$query->setParameter('opistographic', $opistographic);
		
		if ($metrical != "All")
			$query->setParameter('metrical', $metrical);
						
		if ($greek != "All")
			$query->setParameter('greek', $greek);
						
		if ($greeklatin != "All")
			$query->setParameter('greeklatin', $greeklatin);
		
		if ($function != "All")
			$query->setParameter('function', $function);		
		
		if ($technique != "All")
			$query->setParameter('technique', $technique);
				
		if ($support != "All")
			$query->setParameter('support', $support);

		if ($compiler != "All")
			$query->setParameter('compiler', $compiler);
			
		if(strlen($from) || strlen($to))
		{				
			if(strlen($from))
				$query->setParameter('datefrom', $from);
								
			if(strlen($to))
				$query->setParameter('dateto', $to);
		}
		
		
		
		if ($biblio != null) 
		{
			$count_biblio = 1;
			foreach($biblio_words as $word)
			{
				$query->setParameter('biblio'.$count_biblio, strtolower($word));
				$count_biblio++;
			}
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
		//--------------------------------------------------------------------------------
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