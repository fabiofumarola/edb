<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbStoreBundle\Entity\PertinencePosition;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PertinencePositionController extends Controller {
	
	public function listAction($id, $_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinencePosition');
		
		$positions = $repo->findAllOrderedByDescriptionAndByContextId($id);
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$json = $serializer->serialize($positions, 'json');
		
		return new Response($json);
	}
	
	public function newModalAction(){
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		
		$repoPC = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinenceContext');
		$repoPP = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinencePosition');
		$em = $this->getDoctrine()->getEntityManager();
		
		//check if it is in the db
		$description = $this->getRequest()->get('description');
		$idContext = $this->getRequest()->get('idContext');
		
		if ($repoPP->findByDescriptionAndIdContext($description, $idContext) != null)
			return new Response($serializer->serialize('Error: Existing Pertinence Position', 'json'));
		
		$context = $repoPC->find($idContext);
		
		$pPosition = new PertinencePosition();
		$pPosition->setDescription($description);
		$pPosition->setPertinenceContext($context);
		$em->persist($pPosition);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
