<?php

namespace Kdde\EdbBundle\Controller;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller {

	public function indexAction() {

		//$users = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Utente')->findAll();
		//print_r($users);

		return $this->render('KddeEdbBundle:Search:index.html.twig');
	}

	public function basicAction(Request $request) {

		$repoIcvr = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Icvr');

		$icvrs = $repoIcvr->findAll();
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();

		return $this
				->render('KddeEdbBundle:Search:basic.html.twig',
						array('form' => $form->createView(), 'icvrs' => $icvrs,));
	}
	
	public function basicDoAction(Request $request){
		
		$charset = $this->getRequest()->getCharsets();
		
		
		$repoSigna = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Signa');
		$repoEpigraph = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		
		$searchArray = $request->get('search',$this->get('session')->getFlash('search',array()));
		$id = null;
		$icvrId = null;
		$principalProgNumber = null;
		$areaId = null;
		$contextId = null;
		$transcription = null;
		$useThesaurus = false;
	
		$anyParameter = false;
	
		if (strlen($searchArray['id'])) {
			$id = $searchArray['id'];
			$anyParameter = true;
			if (!is_numeric($id)) {
				$this->get('session')->setFlash('error', 'The id should be a number !');
				
				return $this->redirect('KddeEdbBundle:Search:basic');
			}
		}
	
		if (strlen($searchArray['icvr'])) {
			$icvrId = $searchArray['icvr'];
			$anyParameter = true;
		}
			
		if (strlen($searchArray['principalProgNumber'])) {
			$principalProgNumber = $searchArray['principalProgNumber'];
			$anyParameter = true;
			if (!is_numeric($principalProgNumber)) {
				$this->get('session')->setFlash('error', 'The ICVR id should be a number !');
				
				return $this->redirect('KddeEdbBundle:Search:basic');
			}
		}
			
	
		if (strlen($searchArray['area'])) {
			$areaId = $searchArray['area'];
			$anyParameter = true;
		}
	
		if (strlen($searchArray['context'])) {
			$contextId = $searchArray['context'];
			$anyParameter = true;
		}
	
		if (strlen($searchArray['transcription'])) {
			$transcription = $searchArray['transcription'];
			$anyParameter = true;
		}
	
		if (isset($searchArray['thesaurus']))
			$useThesaurus = true;
	
		if (!$anyParameter) {
			$this->get('session')->setFlash('error','You should insert at least one parameter !');
			
			return $this->forward('KddeEdbBundle:Search:basic');
		}
		
		//do the query
		$query = $repoEpigraph->findBasicSearch($id, $icvrId, $principalProgNumber,$areaId, $contextId, $transcription, $useThesaurus);
		
		$count = $repoEpigraph->countBasicSearch($id, $icvrId, $principalProgNumber,$areaId, $contextId, $transcription, $useThesaurus);

		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($query, $request->get('page',1), 6);
		
		$this->get('session')->setFlash('search', $searchArray);
		
		return $this->render('KddeEdbBundle:Search:result.html.twig',array('pagination' => $pagination, 'count' =>$count));
	
		
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
