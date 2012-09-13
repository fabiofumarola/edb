<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbStoreBundle\Entity\Paleography;

use Kdde\EdbStoreBundle\Entity\Technique;

use Kdde\EdbStoreBundle\Entity\Support;

use Kdde\EdbStoreBundle\Entity\PertinenceArea;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;

use Kdde\EdbBundle\Form\Type\LiteratureType;

use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Kdde\EdbBundle\Form\Type\EpigraphType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaleographyController extends Controller {
	
	
	public function listAction($_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Paleography');
		
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
		$repo = $em->getRepository('KddeEdbStoreBundle:Paleography');
		
		if ($repo->find($id) != null)
			return new Response($serializer->serialize('Error: Existing Paleography', 'json'));
		
		$paleography = new Paleography();
		$paleography->setId($id);
		$paleography->setDescription($description);
		$em->persist($paleography);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
