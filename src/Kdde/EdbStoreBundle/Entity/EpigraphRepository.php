<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class EpigraphRepository extends EntityRepository {

	public function getNumEpigraphs($status)
	{
		$strQuery = "SELECT COUNT(ep) FROM KddeEdbStoreBundle:Epigraph ep WHERE ep.status = :status";
		$query = $this->getEntityManager()->createQuery($strQuery);
		$query->setParameter('status', $status);
		return $query->getSingleScalarResult();		
	}
	
	
	
	public function findQuickSearch($searchArray, $roles)
	{
		$id = $searchArray['id_edb'];
		$icvrNumber = $searchArray['icvr_number'];
		$icvrSubNumber = $searchArray['icvr_subnumber'];
		$text = $searchArray['freetext'];
		$biblio = $searchArray['bibliography'];
		
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
		
		// Compose the query
		// --------------------------------------------------------------------------------------------------------
		$strQuerySelect = "SELECT ep FROM KddeEdbStoreBundle:Epigraph ep ";
		$strQueryWhere = " WHERE 1 = 1 ";
		
		// Search by ID
		if(strlen($id))
			$strQueryWhere .= " AND ep.id = :id"; 
		
		// Search by ICVR number and subnumber
		else if(strlen($icvrNumber))
		{
			$strQueryWhere .= " AND ep.principalProgNumber = :icvrNumber";
			
			if(strlen($icvrSubNumber))
				$strQueryWhere .= " AND ep.subNumeration = :icvrSubNumber";
				
		}
		else
		{
// 			// Search by free text
// 			if(strlen($text))
// 			{		
// 				$text_words = explode(" ", $text);
// 				$count_text = 1;
// 				foreach($text_words as $word)
// 				{
// 					$strQueryWhere .= " AND LOWER(ep.ricerca_libera) LIKE CONCAT(CONCAT('%', :text" . $count_text . "),'%')";
// 					$count_text++;
// 				}
// 			}
			// Search by free text
			if(strlen($text))
			{
				// Identify portions of the query that are quoted and non-quoted
				$quoted = array();
				$nonQuoted = array();
				$tokens = explode("\"", $text);
				$index = 0;
				foreach($tokens as $token)
				{
					if($index%2 == 0)
					{
						$subTokens = explode(" ", $token);
						foreach($subTokens as $subToken)
						{
							if($subToken != "")
							{
								$wordLen = strlen($subToken);
								$first = substr($subToken,0,1);
								$last = substr($subToken,($wordLen-1),1);
				
								if($first != "*" && $last != "*")
									array_push($quoted, trim($subToken));
								else
									array_push($nonQuoted, trim($subToken));
							}
						}
					}
					else
					{
						if($token != "")
							array_push($quoted, trim($token));
					}
					$index++;
				}
				
				// Merge quoted and non-quoted portions in a single array
				$words = array_merge($nonQuoted, $quoted);
				
				$count = 1;
				$index = 1;
				
				$op = "ILIKE";
				$field = "ep.ricerca_libera";
				
				foreach($words as $word)
				{
					$wordLen = strlen($word);
					$first = substr($word,0,1);
					$last = substr($word,($wordLen-1),1);
						
					$strQueryWhere .= "AND (" . $op . "(" . $field . ",";
				
					$transc = ":transcription" . $count;
					$transc2 = ":transcription" . ($count+1);
					$transc3 = ":transcription" . ($count+2);
					
						
					$transc = "CONCAT(CONCAT('%'," . $transc . "),'%')";
						
					if($index > sizeof($nonQuoted))
					{
						$transc2 = "CONCAT(" . $transc2 . ",'%')";
						$transc3 = "CONCAT('%'," . $transc3 . ")";
					}
					else
					{
						if($first == "*" && $last != "*")
							$transc2 = "CONCAT('%'," . $transc2 . ")";
						else if ($first != "*" && $last == "*")
							$transc2 = "CONCAT(" . $transc2 . ",'%')";
					}
						
						
					// Handle quoted strings
					if($index > sizeof($nonQuoted))
					{
						$strQueryWhere .= $transc . ") = TRUE OR " . $op . "(" . $field . "," . $transc2 . ") = TRUE OR " . $op . "(" . $field . "," . $transc3 . ") = TRUE ";
						$count = $count+3;
					}
					// Handle non quoted strings (with *)
					else
					{
						if($first == "*" && $last == "*")
						{
							$strQueryWhere .= $transc . ") = TRUE ";
							$count++;
						}
						else
						{
							$strQueryWhere .= $transc . ") = TRUE OR " . $op . "(" . $field . "," . $transc2 . ") = TRUE ";
							$count = $count+2;
						}
					}
					$index++;
					$strQueryWhere .= ") ";
				}
				
			}
			
			// Search by bibliography
			if(strlen($biblio))
			{
				$strQuerySelect .= " JOIN ep.literatures lit_epi";
					
				$biblio_words = explode(" ", $biblio);
				$count_biblio = 1;
				foreach($biblio_words as $word)
				{
					$strQueryWhere .= " AND LOWER(lit_epi.ricerca) LIKE CONCAT(CONCAT('%', :biblio" . $count_biblio . "),'%')";
					$count_biblio++;
				}
			}
		}
		

		
		
		
		// Set the constraint on the status, if not admin
		if (!$isAdmin)
			$strQueryWhere = $strQueryWhere . " AND ep.status = :status";

		
		$strQuery = $strQuerySelect . $strQueryWhere . " ORDER BY ep.id";
		$query = $this->getEntityManager()->createQuery($strQuery);
		// --------------------------------------------------------------------------------------------------------
		
	
		// Set the parameters
		// --------------------------------------------------------------------------------------------------------
		if(strlen($id))
			$query->setParameter('id', $id);
			
		else if(strlen($icvrNumber))
		{
			$query->setParameter('icvrNumber', $icvrNumber);
				
			if(strlen($icvrSubNumber))
				$query->setParameter('icvrSubNumber', $icvrSubNumber);
		
		}
		
		else
		{
// 			if (strlen($text))
// 			{
// 				$count_text = 1;
// 				foreach($text_words as $word)
// 				{
// 					$query->setParameter('text'.$count_text, strtolower($word));
// 					$count_text++;
// 				}
// 			}

			
			if (strlen($text)) {			
				$count = 1;
				$index = 1;
				foreach($words as $word)
				{
					if(!$caseSensitive)
						$word = strtolower($word);
						
					// Handle quoted strings
					if($index > sizeof($nonQuoted))
					{
						$wordTemp = " " . $word . " ";
						$query->setParameter('transcription'.$count, $wordTemp);
						$count++;
		
						$wordTemp = $word . " ";
						$query->setParameter('transcription'.$count, $wordTemp);
						$count++;
		
						$wordTemp = " " . $word;
						$query->setParameter('transcription'.$count, $wordTemp);
						$count++;
					}
					// Handle non quoted strings (with *)
					else
					{
						$wordLen = strlen($word);
						$first = substr($word,0,1);
						$last = substr($word,($wordLen-1),1);
		
						if($first == "*" && $last == "*")
						{
							$word = substr($word, 1, $wordLen-2);
							$query->setParameter('transcription'.$count, $word);
							$count++;
						}
						else if($first == "*")
						{
							$word = substr($word, 1, $wordLen-1);
							$wordTemp = $word . " ";
							$query->setParameter('transcription'.$count, $wordTemp);
							$count++;
								
							$query->setParameter('transcription'.$count, $word);
							$count++;
						}
						else
						{
							$word = substr($word, 0, $wordLen-1);
							$wordTemp = " " . $word;
							$query->setParameter('transcription'.$count, $wordTemp);
							$count++;
								
							$query->setParameter('transcription'.$count, $word);
							$count++;
						}
					}
					$index++;
				}
			}
			
			if (strlen($biblio))
			{
				$count_biblio = 1;
				foreach($biblio_words as $word)
				{
					$query->setParameter('biblio'.$count_biblio, strtolower($word));
					$count_biblio++;
				}
			}
		}
		
		if (!$isAdmin)
			$query->setParameter('status', 2);
		
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
		
		$opisthographic = $searchArray['opisthographic'];
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
		$exactDating = false;
		if (isset($searchArray['exactDating']))
			$exactDating = true;
		$dateInText = $searchArray['dateInText'];
		
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
	
		$caseSensitive = false;
		if (isset($searchArray['sensitive']))
			$caseSensitive = true;
		
		$yesDiacr = false;
		if (isset($searchArray['yesdiacr']))
			$yesDiacr = true;
	
		$yesGreek = false;
		if (isset($searchArray['yesgreek']))
			$yesGreek = true;
		
		if (isset($searchArray['signas'])) {
			$signas = $searchArray['signas'];
		}
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
			$strQuerySelect .= "JOIN ep.literatures lit_epi ";
			
			$biblio_words = explode(" ", $biblio);
			$count_biblio = 1;
			foreach($biblio_words as $word)
			{
				$strQueryWhere .= "AND LOWER(lit_epi.ricerca) LIKE CONCAT(CONCAT('%', :biblio" . $count_biblio . "),'%') ";
				$count_biblio++;
			}
		}
		
		if ($signas != null) {
			$signaCount = 1;
			foreach ($signas as $s) {
				$strQuerySelect .= "JOIN ep.signas sig" . $signaCount . " ";
				$strQueryWhere .= "AND sig" . $signaCount. ".id = :signa" .$signaCount . " ";
				$signaCount++;
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
	
				// Identify portions of the query that are quoted and non-quoted
				$quoted = array();
				$nonQuoted = array();
				$tokens = explode("\"", $transcription);
				$index = 0;
				foreach($tokens as $token)
				{
					if($index%2 == 0)
					{
						$subTokens = explode(" ", $token);
						foreach($subTokens as $subToken)
						{
							if($subToken != "")
							{
								$wordLen = strlen($subToken);
								$first = substr($subToken,0,1);
								$last = substr($subToken,($wordLen-1),1);
								
								if($first != "*" && $last != "*")
									array_push($quoted, trim($subToken));
								else
									array_push($nonQuoted, trim($subToken));
							}
						}
					}
					else
					{
						if($token != "")
							array_push($quoted, trim($token));				
					}
					$index++;
				}
				
				// Merge quoted and non-quoted portions in a single array
				$words = array_merge($nonQuoted, $quoted);			
				
				$count = 1;
				$index = 1;
				
				$op = "ILIKE";
				if($caseSensitive)
					$op = "CLIKE";
				
				foreach($words as $word)
				{
					$wordLen = strlen($word);					
					$first = substr($word,0,1);
					$last = substr($word,($wordLen-1),1);
					
					$strQueryWhere .= "AND (" . $op . "(" . $field . ",";

					if($yesGreek && $yesDiacr)
					{
						$transc = ":transcription" . $count;
						$transc2 = ":transcription" . ($count+1);
						$transc3 = ":transcription" . ($count+2);
					}
					else if($yesGreek)
					{
						$transc = "REMOVEDIACR(:transcription" . $count . ")";
						$transc2 = "REMOVEDIACR(:transcription" . ($count+1) . ")";
						$transc3 = "REMOVEDIACR(:transcription" . ($count+2) . ")";
					}
					else if($yesDiacr)
					{
						$transc = "REMOVEGREEKS(:transcription" . $count . ")";
						$transc2 = "REMOVEGREEKS(:transcription" . ($count+1) . ")";
						$transc3 = "REMOVEGREEKS(:transcription" . ($count+2) . ")";
					}
					else
					{
						$transc = "REMOVEGREEKS(REMOVEDIACR(:transcription" . $count . "))";
						$transc2 = "REMOVEGREEKS(REMOVEDIACR(:transcription" . ($count+1) . "))";
						$transc3 = "REMOVEGREEKS(REMOVEDIACR(:transcription" . ($count+2) . "))";
					}	
					
					$transc = "CONCAT(CONCAT('%'," . $transc . "),'%')";
					
					if($index > sizeof($nonQuoted))
					{
						$transc2 = "CONCAT(" . $transc2 . ",'%')";
						$transc3 = "CONCAT('%'," . $transc3 . ")";
					}
					else
					{
						if($first == "*" && $last != "*")
							$transc2 = "CONCAT('%'," . $transc2 . ")";
						else if ($first != "*" && $last == "*")
							$transc2 = "CONCAT(" . $transc2 . ",'%')";
					}
					
					
					// Handle quoted strings
					if($index > sizeof($nonQuoted))
					{
						$strQueryWhere .= $transc . ") = TRUE OR " . $op . "(" . $field . "," . $transc2 . ") = TRUE OR " . $op . "(" . $field . "," . $transc3 . ") = TRUE ";  
						$count = $count+3;						
					}
					// Handle non quoted strings (with *)
					else	
					{
						if($first == "*" && $last == "*")
						{
							$strQueryWhere .= $transc . ") = TRUE ";
							$count++;
						}
						else
						{
							$strQueryWhere .= $transc . ") = TRUE OR " . $op . "(" . $field . "," . $transc2 . ") = TRUE ";
							$count = $count+2;
						}
					}
					$index++;
					$strQueryWhere .= ") ";
				}
			}		
		}
	
		if ($type != -1)
			$strQueryWhere .= "AND ep.epigraph_type = :epi_type ";
		
		if ($lost != "All")
			$strQueryWhere .= "AND ep.lost = :lost ";
					
		if ($opisthographic != "All")
			$strQueryWhere .= "AND ep.reimpiego_opistografia = :opisthographic ";
		
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
		
		if ($dateInText != "All")
			$strQueryWhere .= "AND ep.dateintext <> :dateintext ";

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

			if($exactDating)
			{
				if(strlen($from))
					$strQueryWhere .= "AND dat.from >= :datefrom ";
					
				if(strlen($to))
					$strQueryWhere .= "AND dat.to <= :dateto ";
			}
			else
			{
				if(strlen($from))
					$strQueryWhere .= "AND dat.to >= :datefrom ";
					
				if(strlen($to))
					$strQueryWhere .= "AND dat.from <= :dateto ";
			}
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
		
		
		if ($opisthographic != "All")
			$query->setParameter('opisthographic', $opisthographic);
		
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
			
		if ($dateInText != "All")
			$query->setParameter('dateintext', $dateInText);
		
		if(strlen($from) || strlen($to))
		{				
			if(strlen($from))
				$query->setParameter('datefrom', $from);
								
			if(strlen($to))
				$query->setParameter('dateto', $to);
		}
		
		if ($signas != null) {
			$signaCount = 1;
			foreach ($signas as $s) {
				$query->setParameter('signa' .$signaCount, $s);
				$signaCount++;
			}
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
				$index = 1;
				foreach($words as $word)
				{
					if(!$caseSensitive)
						$word = strtolower($word);
					
					// Handle quoted strings
					if($index > sizeof($nonQuoted))
					{
						$wordTemp = " " . $word . " ";
						$query->setParameter('transcription'.$count, $wordTemp);
						$count++;
						
						$wordTemp = $word . " ";
						$query->setParameter('transcription'.$count, $wordTemp);
						$count++;
						
						$wordTemp = " " . $word;
						$query->setParameter('transcription'.$count, $wordTemp);
						$count++;
					}
					// Handle non quoted strings (with *)
					else
					{
						$wordLen = strlen($word);
						$first = substr($word,0,1);
						$last = substr($word,($wordLen-1),1);
						
						if($first == "*" && $last == "*")
						{
							$word = substr($word, 1, $wordLen-2);
							$query->setParameter('transcription'.$count, $word);
							$count++;
						}
						else if($first == "*")
						{							
							$word = substr($word, 1, $wordLen-1);
							$wordTemp = $word . " ";
							$query->setParameter('transcription'.$count, $wordTemp);
							$count++;
							
							$query->setParameter('transcription'.$count, $word);
							$count++;
						}
						else
						{
							$word = substr($word, 0, $wordLen-1);
							$wordTemp = " " . $word;
							$query->setParameter('transcription'.$count, $wordTemp);
							$count++;
							
							$query->setParameter('transcription'.$count, $word);
							$count++;
						}
					}
					$index++;
				}
			}
			else
				$query->setParameter('queryWords', $words);
		}
		//--------------------------------------------------------------------------------
		return $query;
	}
}