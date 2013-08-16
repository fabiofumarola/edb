<?php

namespace Kdde\EdbBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;

use Doctrine\ORM\Query\ResultSetMapping;

class SearchController extends Controller {

	public function indexAction() {
		return $this->render('KddeEdbBundle:Search:index.html.twig');
	}

	public function basicAction(Request $request) {

		$repoIcvr = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Icvr');
		$icvrs = $repoIcvr->findAll();
		
		$repoTypes = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Type');
		$types = $repoTypes->findBy(array(), array('description' => 'ASC'));
		
		$repoFunctions = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Funzione');
		$functions = $repoFunctions->findBy(array(), array('description' => 'ASC'));
		
		$repoSupport = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Support');
		$supports = $repoSupport->findBy(array(), array('description' => 'ASC'));
		
		$repoTechnique = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Technique');
		$techniques = $repoTechnique->findBy(array(), array('description' => 'ASC'));
		
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();

		
		
		return $this
				->render('KddeEdbBundle:Search:basic.html.twig',
						array('form' => $form->createView(), 
								'icvrs' => $icvrs, 
								'types' => $types,
								'functions' => $functions,
								'supports' => $supports,
								'techniques' => $techniques
		));
	}
	
	public function basicDoAction(Request $request){
		
		$repoSigna = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Signa');
		$repoEpigraph = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		
		$searchArray = $request->get('search',$this->get('session')->get('search',array()));
		
	
		$anyParameter = false;
	
		if (strlen($searchArray['id'])) {
			$id = $searchArray['id'];
			$anyParameter = true;
			if (!is_numeric($id)) {
				$this->get('session')->getFlashBag()->add('error', 'The id should be a number !');
				return $this->redirect('KddeEdbBundle:Search:basic');
			}
		}
	
		if (strlen($searchArray['icvr'])) 
			$anyParameter = true;

			
		if (strlen($searchArray['principalProgNumber'])) {
			$principalProgNumber = $searchArray['principalProgNumber'];
			$anyParameter = true;
			if (!is_numeric($principalProgNumber)) {
				$this->get('session')->getFlashBag()->add('error', 'The ICVR id should be a number !');
				return $this->redirect('KddeEdbBundle:Search:basic');
			}
		}
		
		$type = $searchArray['type'];
		if ($type != -1)
			$anyParameter = true;
		
		if ($searchArray['lost'] != "All")
		{
			$anyParameter = true;
			$searchArray['cons_area'] = null;
		}

		if ($searchArray['opistographic'] != "All")
			$anyParameter = true;

		if ($searchArray['metrical'] != "All")
			$anyParameter = true;
		
		if ($searchArray['greek'] != "All")
			$anyParameter = true;
		
		if ($searchArray['greeklatin'] != "All")
			$anyParameter = true;
		
		if ($searchArray['support'] != "All")
			$anyParameter = true;
		
		if ($searchArray['technique'] != "All")
			$anyParameter = true;
		
		if ($searchArray['function'] != "All")
			$anyParameter = true;
				
		if (strlen($searchArray['area'])) 
			$anyParameter = true;
	
		if (strlen($searchArray['cons_area']))
			$anyParameter = true;
	
		if (strlen($searchArray['transcription'])) 
			$anyParameter = true;
				
		if ($searchArray['insitu'] != "All")
			$anyParameter = true;
		
		if (isset($searchArray['thesaurus']))
			$useThesaurus = true;
	
		$yesDiacr = false;
		if (isset($searchArray['yesdiacr']))
			$yesDiacr = true;
		
		$yesGreek = false;
		if (isset($searchArray['yesgreek']))
			$yesGreek = true;
		
		
		
		if (!$anyParameter) {
			$this->get('session')->getFlashBag()->add('error','You should specify at least one parameter !');
			return $this->forward('KddeEdbBundle:Search:basic');
		}
		
		
		
		$em = $this->get('doctrine')->getEntityManager();
		
		
		$roles = $this->get('security.context')->getToken()->getRoles();
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
		
		//do the query
		$query = $repoEpigraph->findBasicSearch($searchArray, $roles);
	
			
		
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($query,$request->get('page',1),50);
				
		$count = $pagination->getTotalItemCount();

		$this->get('session')->set('search', $searchArray);
						
		return $this->render('KddeEdbBundle:Search:result.html.twig',array('pagination' => $pagination, 'count' =>$count, 'isAdmin' => $isAdmin, ));
	}

	public function mediumAction(Request $request){
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();
		return $this->render('KddeEdbBundle:Search:medium.html.twig',array('form'=> $form->createView()));
	}
	
	public function advancedAction(Request $request){
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();
		return $this->render('KddeEdbBundle:Search:advanced.html.twig',array('form'=> $form->createView()));
	}
}