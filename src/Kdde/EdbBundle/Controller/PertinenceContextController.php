<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbStoreBundle\Entity\PertinenceContext;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;

use Kdde\EdbBundle\Form\Type\LiteratureType;

use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Kdde\EdbBundle\Form\Type\EpigraphType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PertinenceContextController extends Controller {
	
	public function listAction($id, $_format){
		
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinenceContext');
		
		//$areas = $repo->findBy(array(),array('description' => 'ASC'));
		$contexts = $repo->findAllByIdArea($id);
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$json = $serializer->serialize($contexts, 'json');
		
		return new Response($json);
	}
	
	public function newModalAction(){
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));
		$repoPC = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinenceContext');
		$repoPA = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinenceArea');
		$em = $this->getDoctrine()->getEntityManager();
		
		//check if it is in the db
		$description = $this->getRequest()->get('description');
		$idArea = $this->getRequest()->get('idArea');
		
		if ($repoPC->findByDescriptionAndIdArea($description, $idArea) != null)
			return new Response($serializer->serialize('Error: Existing Pertinence Context', 'json'));
		
		$area = $repoPA->find($idArea);
		
		$pertinenceContext = new PertinenceContext();
		$pertinenceContext->setDescription($description);
		$pertinenceContext->setArea($area);
		$em->persist($pertinenceContext);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
}
