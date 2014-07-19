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

	
	public function quickAction(Request $request)
	{
		$form = $this->createFormBuilder(array())->getForm();
		return $this->render('KddeEdbBundle:Search:quick.html.twig',
				array('form' => $form->createView()
					));
	}
	
	public function quickDoAction(Request $request)
	{
		// Read the search parameters
		$searchArray = $request->get('search',$this->get('session')->get('search',array()));
		
		// Get the epigraph repository
		$repoEpigraph = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		
		// Check if an EDB ID has been specified and if it is numeric
		if (strlen($searchArray['id_edb'])) 
		{
			$id = $searchArray['id_edb'];
			$anyParameter = true;
			if (!is_numeric($id)) {
				$this->get('session')->getFlashBag()->add('error', 'ID EDB must be a number!');				
				return $this->redirect($this->generateUrl('edb_search_quick'));
			}
		}
		
		// Check if the ICVR number is specified
		if (strlen($searchArray['icvr_number']))
			$anyParameter = true;
				
		// Check if the ICVR subnumber is specified alone
		if (strlen($searchArray['icvr_subnumber']))
		{
			$anyParameter = true;
	
			if (!strlen($searchArray['icvr_number']))
			{
				$this->get('session')->getFlashBag()->add('error', 'ICVR subnumber cannot be specified without the ICVR number!');
				return $this->redirect($this->generateUrl('edb_search_quick'));
			}
		}
		
		// Check if the Free Text is specified
		if (strlen($searchArray['freetext']))
			$anyParameter = true;
		
		// Check if the Bibliography is specified
		if (strlen($searchArray['bibliography']))
			$anyParameter = true;
		
		// Check if at least a search parameter has been specified		
		if(!$anyParameter)
		{
			$this->get('session')->getFlashBag()->add('error', 'You should specify at least one search parameter!');
			return $this->redirect($this->generateUrl('edb_search_quick'));
		}
			
		// Perform the query
		$roles = $this->get('security.context')->getToken()->getRoles();
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
		$query = $repoEpigraph->findQuickSearch($searchArray, $roles);
		
		// Paginate the results
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($query,$request->get('page',1),500);
		
		// Return the results
		$this->get('session')->set('search', $searchArray);		
		return $this->render('KddeEdbBundle:Search:result.html.twig',array('pagination' => $pagination, 'count' =>$pagination->getTotalItemCount(), 'isAdmin' => $isAdmin, ));
	}
	
	
	
	
	
	public function basicAction(Request $request) 
	{		
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

		$repoDating = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Dating');
		$datings = $repoDating->findBy(array(), array('description' => 'ASC'));
		
		$repoCompilers = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');
		$compilers = $repoCompilers->findBy(array(), array('firstname' => 'ASC'));
				
		return $this
				->render('KddeEdbBundle:Search:basic.html.twig',
						array('form' => $form->createView(), 
								'icvrs' => $icvrs, 
								'types' => $types,
								'functions' => $functions,
								'supports' => $supports,
								'techniques' => $techniques,
								'datings' => $datings,
								'compilers' => $compilers
		));
	}
	
	public function basicDoAction(Request $request){
		
		//Enable LOG of query
// 		$this
// 		->get('doctrine')
// 		->getConnection()
// 		->getConfiguration()
// 		->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
		
		$repoSigna = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Signa');
		$repoEpigraph = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		
		$searchArray = $request->get('search',$this->get('session')->get('search',array()));
		
	
		$anyParameter = false;	
		if ($searchArray['icvr'] != "All" && $searchArray['icvr'] != 'AllIcvr' && $searchArray['icvr'] != 'AllNotIcvr') 
			$anyParameter = true;

		if (strlen($searchArray['biblio']))
			$anyParameter = true;
			
		if (strlen($searchArray['icvr_number'])) {
			$principalProgNumber = $searchArray['icvr_number'];
			$anyParameter = true;
			if (!is_numeric($principalProgNumber)) {
				$this->get('session')->getFlashBag()->add('error', 'The ICVR number should be an integer!');
				return $this->redirect($this->generateUrl('edb_search_basic'));
			}
		}
				
		if ($searchArray['lost'] != "All")
		{
			$anyParameter = true;
			$searchArray['cons_area'] = null;
		}

		if ($searchArray['opisthographic'] != "All")
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
		
		if ($searchArray['compiler'] != "All")
			$anyParameter = true;
		
		if (isset($searchArray['thesaurus']))
			$useThesaurus = true;
		
		if ($searchArray['dateInText'] != "All")
			$anyParameter = true;
	
		$yesDiacr = false;
		if (isset($searchArray['yesdiacr']))
			$yesDiacr = true;
		
		$yesGreek = false;
		if (isset($searchArray['yesgreek']))
			$yesGreek = true;
		
		if($searchArray['dating'] != 'All' || $searchArray['from'] != '' || $searchArray['to'] != '')
			$anyParameter = true;
				
		
		$incorrectDating = false;
		if(isset($searchArray['from']))
		{
			$from = $searchArray['from'];
			if(strlen($from) && !ctype_digit($from))
				$incorrectDating = true;
		}
			
		if(isset($searchArray['to']))
		{
			$to = $searchArray['to'];
			if(strlen($to) && !ctype_digit($to))
				$incorrectDating = true;
		}
		
		if(isset($searchArray['from']) && isset($searchArray['to']) && !$incorrectDating && $to < $from)
			$incorrectDating = true;
		
		
		if (!$anyParameter) {
			$this->get('session')->getFlashBag()->add('error','You should specify at least one search parameter!');
			return $this->forward('KddeEdbBundle:Search:basic');
		}
		
		if($incorrectDating)
		{
			$this->get('session')->getFlashBag()->add('error','The specified time span is invalid!');
			return $this->forward('KddeEdbBundle:Search:basic');
		}
		
		
		
		$em = $this->get('doctrine')->getManager();
		
		
		$roles = $this->get('security.context')->getToken()->getRoles();
		$isAdmin = false;
		if (in_array("administrator", $roles))
			$isAdmin = true;
				
		//do the query
		$query = $repoEpigraph->findBasicSearch($searchArray, $roles);
	
		$paginator = $this->get('knp_paginator');
		$pagination = $paginator->paginate($query,$request->get('page',1),500);
				

		$this->get('session')->set('search', $searchArray);
						
		return $this->render('KddeEdbBundle:Search:result.html.twig',array('pagination' => $pagination, 'count' => $pagination->getTotalItemCount(), 'isAdmin' => $isAdmin, ));
	}
}