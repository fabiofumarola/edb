<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbStoreBundle\Entity\Support;

use Kdde\EdbStoreBundle\Entity\PertinenceArea;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;


use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SupportController extends Controller {
	
	
	public function listAction($_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Support');
		
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
		
		$id = $this->getRequest()->get("id");
		$description = $this->getRequest()->get("description");
		
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('KddeEdbStoreBundle:Support');
		
		if ($repo->find($id) != null)
			return new Response($serializer->serialize('Error: Existing Support', 'json'));
		
		$support = new Support();
		$support->setId($id);
		$support->setDescription($description);
		$em->persist($support);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
