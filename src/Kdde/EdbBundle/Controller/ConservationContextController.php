<?php

namespace Kdde\EdbBundle\Controller;

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

class ConservationContextController extends Controller {
	
	
	public function listAction($id, $_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationContext');
		$contexts = $repo->findBy(array('conservationLocation' => $id), array('description' => 'ASC'));
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$json = $serializer->serialize($contexts, 'json');
		
		return new Response($json);
	}
	
	
	public function listAllAction($_format){
	
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));
	
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationContext');
		$contexts = $repo->findBy(array(), array('conservationLocation' => 'ASC', 'description' => 'ASC'));
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$json = $serializer->serialize($contexts, 'json');
	
		return new Response($json);
	}
	
	public function newModalAction(){
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$repoCC = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationContext');
		$repoCL = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationLocation');
		$em = $this->getDoctrine()->getEntityManager();
		
		//check if it is in the db
		$description = $this->getRequest()->get('description');
		$idLocation = $this->getRequest()->get('idLocation');
		
		if ($repoCC->findByDescriptionAndIdLocation($description, $idLocation) != null)
			return new Response($serializer->serialize('Error: Existing Pertinence Context', 'json'));
		
		$conservationLocation = $repoCL->find($idLocation);
		
		$conservationContext = new ConservationContext();
		$conservationContext->setDescription($description);
		$conservationContext->setConservationLocation($conservationLocation);
		$em->persist($conservationContext);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
