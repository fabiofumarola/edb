<?php

namespace Kdde\EdbBundle\Controller;

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

class ConservationLocationController extends Controller {
	
	public function listAction($_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationLocation');
		
		$areas = $repo->findBy(array(),array('description' => 'ASC'));
		//$areas = $repo->findAllOrderedByDescription();
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$json = $serializer->serialize($areas, 'json');
		
		return new Response($json);
	}
	
	public function newModalAction(){
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		
		$description = $this->getRequest()->get("description");
		
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('KddeEdbStoreBundle:ConservationLocation');
		
		if ($repo->findByDescription($description) != null)
			return new Response($serializer->serialize('Error: Existing Conservation Location', 'json'));
		
		$conservationLocation = new ConservationLocation();
		$conservationLocation->setDescription($description);
		$em->persist($conservationLocation);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
