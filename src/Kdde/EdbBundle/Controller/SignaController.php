<?php

namespace Kdde\EdbBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Kdde\EdbBundle\Form\Type\SignaType;

use Kdde\EdbStoreBundle\Entity\Signa;

use Kdde\EdbStoreBundle\Entity\Technique;

use Kdde\EdbStoreBundle\Entity\Support;

use Kdde\EdbStoreBundle\Entity\PertinenceArea;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;
use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Kdde\EdbBundle\Form\Type\EpigraphType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SignaController extends Controller {
	
	
	public function listAction($_format){
		
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Signa');
		$signa = $repo->findBy(array(),array('description' => 'ASC'));
		
		if ($_format == "json"){
			$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
					JsonEncoder()));
			$json = $serializer->serialize($signa, 'json');
			
			return new Response($json);
		}else if ($_format == "html"){
			return $this->render('KddeEdbBundle:Signa:list.html.twig',array("signa" => $signa));
		}else 
			return new Response("format not supported");
		
	}
	
	public function newModalAction(){
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$description = $this->getRequest()->get("description");
		
		$em = $this->getDoctrine()->getEntityManager();
		$repo = $em->getRepository('KddeEdbStoreBundle:Signa');
				
		$signum = new Signa();
		$signum->setDescription($description);
		$em->persist($signum);
		$em->flush();
		
		return new Response($serializer->serialize('ok', 'json'));
	}
	
	public function createAction(Request $request){
		
		$signa = new Signa();
		
		$form =$this->createForm(new SignaType(), $signa);
		
		if ($request->getMethod() == 'POST'){
			$form->bind($request);
			
			if ($form->isValid()){
				$em = $this->getDoctrine()->getEntityManager();
				$signa = $form->getData();
				$em->persist($signa);
				$em->flush();
				
				$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
				
				return $this->redirect($this->generateUrl('edb_signa_list'));
			}
		}
		
		return $this->render('KddeEdbBundle:Signa:create.html.twig',array('form' => $form->createView()));
	}
}
