<?php
namespace Kdde\EdbStoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

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
			$strQuerySelect .= "JOIN ep.pertinence pe JOIN pe.pertinenceArea pa ";
			$strQueryWhere .= "AND pa.id = :areaId ";
		}

		if ($contextId != null) {
			$strQuerySelect .= "JOIN pe.context pc ";
			$strQueryWhere .= "AND pc.id = :contextId ";
		}

		if ($transcription != null) {
			$strQueryWhere .= "AND ep.trascription LIKE :transcription ";
		}
		
		if ($type != -1)
			$strQueryWhere .= "AND ep.epigraph_type = :epi_type ";
				

		if ($useThesaurus = true) {

		}
		
		$strQueryWhere = substr($strQueryWhere, 4, strlen($strQueryWhere));

		$strQuery = $strQuerySelect . "WHERE " . $strQueryWhere;

		$query = $this->getEntityManager()->createQuery($strQuery);
		
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
			$transcription = '%'.$transcription . '%';
			$query->setParameter('transcription', $transcription);
		}
		
		return $query;

	}
	
	public function countBasicSearch($id, $icvrId, $principalProgNumber, $areaId,
			$contextId, $transcription, $useThesaurus, $type){
		$strQuerySelect = "SELECT COUNT(ep.id) FROM KddeEdbStoreBundle:Epigraph ep ";
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
			$strQuerySelect .= "JOIN ep.pertinence pe JOIN pe.pertinenceArea pa ";
			$strQueryWhere .= "AND pa.id = :areaId ";
		}
		
		if ($contextId != null) {
			$strQuerySelect .= "JOIN pe.context pc ";
			$strQueryWhere .= "AND pc.id = :contextId ";
		}
		
		if ($transcription != null) {
			$strQueryWhere .= "AND ep.trascription LIKE :transcription ";
		}
		
		if ($type != -1)
			$strQueryWhere .= "AND ep.epigraph_type = :epi_type ";
		
		if ($useThesaurus = true) {
		
		}
		
		$strQueryWhere = substr($strQueryWhere, 4, strlen($strQueryWhere));
		
		$strQuery = $strQuerySelect . "WHERE " . $strQueryWhere;
		
		$query = $this->getEntityManager()->createQuery($strQuery);
		
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
			$transcription = '%'.$transcription . '%';
			$query->setParameter('transcription', $transcription);
		}
		
		
		
		return $query->getSingleScalarResult();
	}
}