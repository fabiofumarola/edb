<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbStoreBundle\Entity\ConservationPosition;

use Kdde\EdbStoreBundle\Entity\ConservationContext;

use Kdde\EdbStoreBundle\Entity\ConservationLocation;

use Kdde\EdbStoreBundle\Entity\PertinenceArea;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;

use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Kdde\EdbBundle\Form\Type\EpigraphType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConservationPositionController extends Controller {
	
	public function listAction($id, $_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationPosition');
// 		$contexts = $repo->findAllByIdContext($id);
		$contexts = $repo->findBy(array('conservationContext' => $id), array('description' => 'ASC'));
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$json = $serializer->serialize($contexts, 'json');
		
		return new Response($json);
	}
	
	public function newModalAction(){
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$repoCP = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationPosition');
		$repoCC = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationContext');
		$em = $this->getDoctrine()->getEntityManager();
		
		//check if it is in the db
		$description = $this->getRequest()->get('description');
		$idContext = $this->getRequest()->get('idContext');
		
		if ($repoCP->findByDescriptionAndIdContext($description, $idContext) != null)
			return new Response($serializer->serialize('Error: Existing Pertinence Position', 'json'));
		
		$conservationContext = $repoCC->find($idContext);
		
		$conservationPosition = new ConservationPosition();
		$conservationPosition->setDescription($description);
		$conservationPosition->setConservationContext($conservationContext);
		$em->persist($conservationPosition);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
