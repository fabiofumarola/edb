<?php

namespace Kdde\EdbBundle\Controller;
use Kdde\EdbStoreBundle\Entity\EpigraphDating;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\Common\Cache\ArrayCache;

use Kdde\EdbStoreBundle\Entity\Data;

use Kdde\EdbStoreBundle\Entity\Ambito;

use Kdde\EdbStoreBundle\Entity\Material;

use Kdde\EdbStoreBundle\Entity\RelatedResource;

use Kdde\EdbStoreBundle\Entity\Conservation;

use Kdde\EdbStoreBundle\Entity\Pertinence;

use Kdde\EdbStoreBundle\Entity\EpigraphLiterature;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kdde\EdbStoreBundle\Entity\BiblioRiferimentoEpigrafe;

class EpigraphController extends Controller {

	public function indexAction() {

		//$users = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Utente')->findAll();
		//print_r($users);

		return $this->render('KddeEdbBundle:Epigraph:index.html.twig');
	}

	public function statusAction() {
		$compilator = $this->get('security.context')->getToken()->getUser();
		$roles = $this->get('security.context')->getToken()->getRoles();
		
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');

		// Get the created epigraph of the logged user only
		$pendingEpigraphes = $repository->findBy(array('status'=> 0, 'compilator' => $compilator), array('id' => 'ASC'));
		
		// If the user is an admin, add the pending epigraphs of all the users
		if (in_array("administrator", $roles))
			$pendingEpigraphes = array_merge($pendingEpigraphes, $repository->findBy(array('status'=> 1), array('id' => 'ASC')));
				
		return $this->render('KddeEdbBundle:Epigraph:status.html.twig',	array('epigraphes' => $pendingEpigraphes));
	}

	public function approveAction($id) {
		
		$epigraph = $this->setStatus($id,2);
		if ($epigraph == null) {
			$this->get('session')
			->getFlashBag()->add('error', 'The epigraph with id ' . $id . " is not in the database!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		else
		{
			$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved, the epigraph with id '	. $epigraph->getId() . " is approved !");
			return $this->redirect($this->generateUrl('edb_epigraph_status'));
		}
	}

	private function setStatus($id, $status) {
		$repository = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);
		if($epigraph != null)
		{
			$epigraph->setStatus($status);
			$em->flush();
		}	
		return $epigraph;
	}
	
	// Codice duplicato. Vedere se possibile ristrutturare
	public function editAction($id, Request $request) {
		$roles = $this->get('security.context')->getToken()->getRoles();	
		
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);

		$currentUser = $this->get('security.context')->getToken()->getUser();
		
		if ($epigraph == null || 
				($epigraph->getStatus() == 1 && !in_array("administrator", $roles)) ||
				($epigraph->getStatus() == 0 && $epigraph->getCompilator() != $currentUser && !in_array("administrator", $roles))) {
			$this->get('session')->getFlashBag()->add('error', 'The epigraph with id ' . $id . " is not in the database or you cannot access it!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		
		//select all the icvr
		$repoIcvr = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Icvr');
		$icvrs = $repoIcvr->findAll();
		
		//select all the bibliography
		$repoLiterature = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRiferimento');
		$literatures = $repoLiterature->findBy(array(), array('id' => 'ASC'));
		
		$repoSupport = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Support');
		$supports = $repoSupport->findBy(array(), array('description' => 'ASC'));
		
		$repoTechnique = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Technique');
		$techniques = $repoTechnique->findBy(array(), array('description' => 'ASC'));
		
		$repoPaleography = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Paleography');
		$paleographies = $repoPaleography->findBy(array(), array('description' => 'ASC'));
		
		$repoFunzione = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Funzione');
		$funzioni = $repoFunzione->findBy(array(), array('description' => 'ASC'));
		
		$repoAmbito = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Ambito');
		$ambiti = $repoAmbito->findBy(array(), array('description' => 'ASC'));
		
		$repoDating = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Dating');
		$datings = $repoDating->findBy(array(), array('description' => 'ASC'));
		
		$repoTypes = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Type');
		$types = $repoTypes->findBy(array(), array('description' => 'ASC'));
		
		$repoRefSources = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ResourceType');
		$refSources = $repoRefSources->findBy(array(), array('description' => 'ASC'));
		
		$em = $this->getDoctrine()->getManager();
		
		//$form = $this->createForm(new EpigraphType(), new Epigraph());
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();
		
		if ($request->getMethod() == 'POST') {
		
			$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		
			$form->bind($request);
		
			if ($form->isValid()) 
			{
				$epigraphArray = $request->get('epigraph');
				$submitAsNew = $request->get('submitButtonNew');
				
				if(isset($submitAsNew))
					$epigraph = null;
							
				$epigraph = $this->persistEpigraph($epigraphArray, $epigraph);
				
				$message = 'Your changes to the epigraph ' . $epigraph->getId() . ' have been successfully saved.';
								
				$approveButton = $request->get('submitAndApproveButton');
				$backButton = $request->get('submitAndBackButton');
				$sendToAdminButton = $request->get('submitToAdminButton');
				if(isset($approveButton))
				{
					$this->setStatus($epigraph->getId(), 2);
					$message = 'Your changes to the epigraph ' . $epigraph->getId() . ' have been successfully saved and it has been approved!';
				}
				else if(isset($backButton))
				{
					$this->setStatus($epigraph->getId(), 0);
					$message = 'Your changes to the epigraph ' . $epigraph->getId() . ' have been successfully saved and it has been returned back to compiler!';
				}
				else if(isset($sendToAdminButton))
				{
					$this->setStatus($epigraph->getId(), 1);
					$message = 'Your changes to the epigraph ' . $epigraph->getId() . ' have been successfully saved and it has been sent to admins for approval!';
				}
				else if(isset($submitAsNew))
					$message = 'A new epigraph with id '. $epigraph->getId() . " has been created!";
				
				$this->get('session')->getFlashBag()->add('notice', $message);
				
				if(isset($submitAsNew))
					return $this->redirect($this->generateUrl('edb_epigraph_edit', array('id' => $epigraph->getId())));
				else
					return $this->redirect($this->generateUrl('edb_epigraph_show', array('id' => $epigraph->getId())));
			}
		}
		$isAdmin = false;
		$roles = $this->get('security.context')->getToken()->getRoles();	
		if (in_array("administrator", $roles))
			$isAdmin = true;
		
		return $this
		->render('KddeEdbBundle:Epigraph:edit.html.twig',
				array('form' => $form->createView(), 'icvrs' => $icvrs,
						'literatures' => $literatures,
						'supports' => $supports,
						'techniques' => $techniques,
						'paleographies' => $paleographies,
						'functions' => $funzioni,
						'onomasticAreas' => $ambiti,
						'datings' => $datings, 
						'types' => $types,
						'e' => $epigraph,
						'admin' => $isAdmin,
						'refSources' => $refSources
		));
	}

	
	
	
	public function showAction($id) {
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);
	
		$roles = $this->get('security.context')->getToken()->getRoles();	
		
		if ($epigraph == null || (!in_array("administrator", $roles) && $epigraph->getStatus() < 2))	
		{
			// Check if the logged user is the author
			$loggedUsername = $this->get('security.context')->getToken()->getUser();
			$userRepository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');
			$compilator = $userRepository->find($epigraph->getCompilator());
			if($compilator != $loggedUsername)
			{	
				$this->get('session')->getFlashBag()->add('error', 'The epigraph  EDB' . $id . " is not in the database or you do not have enough privileges to access it!");
				return $this->redirect($this->generateUrl('edb_homepage'));
			}
		}
		
		// Experimental. Authentication for pcas
		//--------------------------------------------------------------------------------------------
		
		$imageUrl = null;
		$url = 'http://www.archeologiasacra.net/pcas-web/EDB/' . $id . '/scheda.html';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_USERPWD, 'pcas:pcas123');
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Sample Code');

		$response = curl_exec($curl);
		$resultStatus = curl_getinfo($curl);

		$split = explode('<img id="fotoSchedaBig" style="max-width:600px;" src="',$response);
		if(sizeof($split) == 2)
		{
			$imageUrl = explode('"', $split[1]);
			$imageUrl = $imageUrl[0];
		}
		//-------------------------------------------------------------------------------------------
		
		return $this->render('KddeEdbBundle:Epigraph:show.html.twig', array('e' => $epigraph, 'imageUrl' => $imageUrl));
	}
	
	
	public function showicvrAction($id) {
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		
		$epigraph = $repository->findBy(array('principalProgNumber' => $id));
		$roles = $this->get('security.context')->getToken()->getRoles();
	
		if(sizeof($epigraph) > 1)
		{
			$this->get('session')->getFlashBag()->add('error', 'There are multiple epigraphs corresponding to ICVR ' . $id . "!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		else if(sizeof($epigraph) > 0)
			$epigraph = $epigraph[0];
		else
		{
			$this->get('session')->getFlashBag()->add('error', 'The epigraph corresponding to ICVR ' . $id . " is not in the database!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
			
		if(!in_array("administrator", $roles) && $epigraph->getStatus() < 2)	
		{
			// Check if the logged user is the author
			$loggedUsername = $this->get('security.context')->getToken()->getUser();
			$userRepository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');
			$compilator = $userRepository->find($epigraph->getCompilator());
			if($compilator != $loggedUsername)
			{	
				$this->get('session')->getFlashBag()->add('error', 'You do not have enough privileges to access the requested epigraph!');
				return $this->redirect($this->generateUrl('edb_homepage'));
			}
		}
	
		// Experimental. Authentication for pcas
		//--------------------------------------------------------------------------------------------
	
		$imageUrl = null;
		$url = 'http://www.archeologiasacra.net/pcas-web/EDB/' . $id . '/scheda.html';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_USERPWD, 'pcas:pcas123');
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Sample Code');
	
		$response = curl_exec($curl);
		$resultStatus = curl_getinfo($curl);
	
		$split = explode('<img id="fotoSchedaBig" style="max-width:600px;" src="',$response);
		if(sizeof($split) == 2)
		{
			$imageUrl = explode('"', $split[1]);
			$imageUrl = $imageUrl[0];
		}
		//-------------------------------------------------------------------------------------------
	
		return $this->render('KddeEdbBundle:Epigraph:show.html.twig', array('e' => $epigraph, 'imageUrl' => $imageUrl));
	}
	
	
	public function showicvrsubAction($id, $sub) {
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
	
		// Explode number and subnumber	
		$epigraph = $repository->findBy(array('principalProgNumber' => $id, 'subNumeration' => $sub));
		
		if(sizeof($epigraph) >0)
			$epigraph = $epigraph[0];
		else
		{
			$this->get('session')->getFlashBag()->add('error', 'The epigraph corresponding to ICVR ' . $id . "." . $sub . " does not exist!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		
		$roles = $this->get('security.context')->getToken()->getRoles();
		if ($epigraph == null || (!in_array("administrator", $roles) && $epigraph->getStatus() < 2))	
		{
			
			
			// Check if the logged user is the author
			$loggedUsername = $this->get('security.context')->getToken()->getUser();
			$userRepository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');
			$compilator = $userRepository->find($epigraph->getCompilator());
			if($compilator != $loggedUsername)
			{	
				$this->get('session')->getFlashBag()->add('error', 'The epigraph  EDB' . $id . " is not in the database or you do not have enough privileges to access it!");
				return $this->redirect($this->generateUrl('edb_homepage'));
			}
		}
	
		// Experimental. Authentication for pcas
		//--------------------------------------------------------------------------------------------
	
		$imageUrl = null;
		$url = 'http://www.archeologiasacra.net/pcas-web/EDB/' . $id . '/scheda.html';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_USERPWD, 'pcas:pcas123');
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Sample Code');
	
		$response = curl_exec($curl);
		$resultStatus = curl_getinfo($curl);
	
		$split = explode('<img id="fotoSchedaBig" style="max-width:600px;" src="',$response);
		if(sizeof($split) == 2)
		{
			$imageUrl = explode('"', $split[1]);
			$imageUrl = $imageUrl[0];
		}
		//-------------------------------------------------------------------------------------------
	
		return $this->render('KddeEdbBundle:Epigraph:show.html.twig', array('e' => $epigraph, 'imageUrl' => $imageUrl));
	}
	
	
	public function referenceslistAction($id, $_format) 
	{
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));
		
		
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getLiteratures(), 'json');
		return new Response($json);
	}
	
	public function relresourceslistAction($id, $_format)
	{
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));
	
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:RelatedResource');
		$em = $this->getDoctrine()->getManager();
		$relresources = $repository->findBy(array('idEpigrafe' => $id));
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($relresources, 'json');
		return new Response($json);
	}
	
	
	
	
	public function originalcontextlistAction($id, $_format) {	
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getPertinence(), 'json');
		return new Response($json);
	}
	
	public function conservationlistAction($id, $_format) {
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getConservations(), 'json');
		return new Response($json);
	}
	
	public function datingslistAction($id, $_format) {
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));
	
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getDatings(), 'json');
		return new Response($json);
	}
	
	
	public function newAction(Request $request) {

		//select all the icvr
		$repoIcvr = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Icvr');
		$icvrs = $repoIcvr->findAll();

		//select all the bibliography
		$repoLiterature = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRiferimento');
		$literatures = $repoLiterature->findBy(array(), array('id' => 'ASC'));

		$repoSupport = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Support');
		$supports = $repoSupport->findBy(array(), array('description' => 'ASC'));

		$repoTechnique = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Technique');
		$techniques = $repoTechnique->findBy(array(), array('description' => 'ASC'));

		$repoPaleography = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Paleography');
		$paleographies = $repoPaleography->findBy(array(), array('description' => 'ASC'));

		$repoFunzione = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Funzione');
		$funzioni = $repoFunzione->findBy(array(), array('description' => 'ASC'));

		$repoAmbito = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Ambito');
		$ambiti = $repoAmbito->findBy(array(), array('description' => 'ASC'));

		$repoDating = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Dating');
		$datings = $repoDating->findBy(array(), array('description' => 'ASC'));

		$repoTypes = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Type');
		$types = $repoTypes->findBy(array(), array('description' => 'ASC'));

		$repoRefSources = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ResourceType');
		$refSources = $repoRefSources->findBy(array(), array('description' => 'ASC'));
		
		
		$em = $this->getDoctrine()->getManager();

		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();

		if ($request->getMethod() == 'POST') {

			$serializer = new Serializer(array(new GetSetMethodNormalizer()),
					array('json' => new JsonEncoder()));

			$form->bind($request);

			if ($form->isValid()) {

				$epigraphArray = $request->get('epigraph');

				$epigraph = $this->persistEpigraph($epigraphArray, null);
			
				$this->get('session')->getFlashBag()->add('notice','Your changes were saved, the epigraph is saved with id '. $epigraph->getId()) . " !";

				return $this->redirect($this->generateUrl('edb_epigraph_show', array('id' => $epigraph->getId())));
			}
		}
		
		
		return $this
				->render('KddeEdbBundle:Epigraph:new.html.twig',
						array('form' => $form->createView(), 'icvrs' => $icvrs,
								'literatures' => $literatures,
								'supports' => $supports,
								'techniques' => $techniques,
								'paleographies' => $paleographies,
								'functions' => $funzioni,
								'onomasticAreas' => $ambiti,
								'datings' => $datings, 
								'types' => $types,
								'refSources' => $refSources
		));
	}

	private function persistEpigraph($epigraphArray, $epigraph) {

		$repoIcvr = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Icvr');
		$repoReference = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRiferimento');
		$repoSupport = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Support');
		$repoTechnique = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Technique');
		$repoPaleography = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Paleography');
		$repoFunzione = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Funzione');
		$repoAmbito = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Ambito');
		$repoDating = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Dating');
		$repoLocus = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:LocusInventionis');
		$repoPertinence = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Pertinence');
		$repoPertinenceArea = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinenceArea');
		$repoPertinenceContext = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinenceContext');
		$repoPertinencePosition = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:PertinencePosition');
		$repoConservLocation = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationLocation');
		$repoConservContext = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationContext');
		$repoConservPosition = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ConservationPosition');
		$repoConservation = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Conservation');
		$repoSigna = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Signa');
		$repoTypes = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Type');
		$repoResourceTypes = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:ResourceType');
		$em = $this->getDoctrine()->getManager();

		$arrayLiteratures = new ArrayCollection();
		$arrayDatings = new ArrayCollection();

		
		try {

			// Check if it is an update
			$update = true;
			if($epigraph == null)
			{
				$epigraph = new Epigraph();
				$update = false;
			}

				
			if (isset($epigraphArray['icvr']) && $epigraphArray['icvr'] != "null") {
				$icvr = $repoIcvr->find($epigraphArray['icvr']);
				$epigraph->setIcvr($icvr);
			}
			else
				$epigraph->removeIcvr();
			
			if (isset($epigraphArray['principalProgNumber']))
				$epigraph->setPrincipalProgNumber($epigraphArray['principalProgNumber']);
			else 
				$epigraph->setPrincipalProgNumber(null);

			
			if (isSet($epigraphArray['lost']))
				$epigraph->setLost('S');
			else
				$epigraph->setLost('N');
				

			if (isset($epigraphArray['subNumeration'])) 
				$epigraph->setSubNumeration($epigraphArray['subNumeration']);
			else
				$epigraph->setSubNumeration(null);

				
			if (isset($epigraphArray['dateInText'])) {
				if ($epigraphArray['dateInText'] == 'on')
					$epigraph->setDateintext(true);
			} else
				$epigraph->setDateintext(false);
			

			if (isset($epigraphArray['datingIds'])) {
				$datingIds= $epigraphArray['datingIds'];
				foreach ($datingIds as $ids) {
					$split = explode("@-@", $ids);
						
					$dating = new EpigraphDating();
					$dating->setFrom($split[0]);
					$dating->setTo($split[1]);
					$arrayDatings->add($dating);
				}
			}
			
			$epigraph->emptyPertinences();
			if (isset($epigraphArray['originalIds'])) {
				$originalIds = $epigraphArray['originalIds'];
				foreach ($originalIds as $ids) {
					$split = explode("@-@", $ids);
										
					$c = $repoPertinence->findOneBy(array('pertinenceArea' => $split[0], 'context' => $split[1], 'pertinencePosition' => $split[2], 'inSitu'=> $split[3]));
					if ($c == null) {
						$c = new Pertinence();
						$locus = $repoLocus->find(1);
						$pertinenceArea = $repoPertinenceArea
								->find($split[0]);
						$pertinenceContext = $repoPertinenceContext
								->find($split[1]);
						$pertinencePosition = $repoPertinencePosition
								->find($split[2]);
						$c->setLocus($locus);
						$c->setPertinenceArea($pertinenceArea);
						$c->setContext($pertinenceContext);
						$c->setPertinencePosition($pertinencePosition);
						
						$c->setInSitu($split[3]);
					}
					$epigraph->addPertinence($c);
				}
			}
			
			if (isset($epigraphArray['geoPosition']))
				$epigraph->setGeoPosition($epigraphArray['geoPosition']);
			else
				$epigraph->setGeoPosition(null);

			$epigraph->emptyConservations();
			if (isset($epigraphArray['conservationsIds'])) {
				$conservationIds = $epigraphArray['conservationsIds'];
				foreach ($conservationIds as $ids) {
					$split = explode("@-@", $ids);
					$c = $repoConservation->findOneByLocationContextPosition($split[0], $split[1], $split[2]);

					if ($c == null) {
						$c = new Conservation();
						$conservationLocation = $repoConservLocation->find($split[0]);
						$conservationContext = $repoConservContext->find($split[1]);
						$conservationPosition = $repoConservPosition->find($split[2]);
						$c->setConservationLocation($conservationLocation);
						$c->setConservationContext($conservationContext);
						$c->setConservationPosition($conservationPosition);
						$epigraph->addConservation($c);
						
					} else {
						$epigraph->addConservation($c[0]);
					}
				}
			}
			
			if (isset($epigraphArray['material'])) {
				$arrayMaterial = $epigraphArray['material'];
				$support = $repoSupport->find($arrayMaterial['support']);
				$technique = $repoTechnique->find($arrayMaterial['technique']);

				$material = new Material();
				$material->setSupport($support);
				$material->setTechnique($technique);
				$material->setHeight($arrayMaterial['height']);
				$material->setWidth($arrayMaterial['width']);
				$material->setTickness($arrayMaterial['tickness']);
				$epigraph->setMaterial($material);
			}
			else
				$epigraph->setMaterial(null);

			if (isset($epigraphArray['altMinLetters']))
				$epigraph->setAltMinLetters($epigraphArray['altMinLetters']);
			else
				$epigraph->setAltMinLetters('n.d.');

			if (isset($epigraphArray['altMaxLetters']))
				$epigraph->setAltMaxLetters($epigraphArray['altMaxLetters']);
			else
				$epigraph->setAltMaxLetters('n.d.');
			
			if (isset($epigraphArray['paleography'])) {
				$paleography = $repoPaleography->find($epigraphArray['paleography']);
				$epigraph->setPaleography($paleography);
			}
			else
				$epigraph->setPaleography($null);

			$type = $repoTypes->find($epigraphArray['epi_type']);
			$epigraph->setEpigraphType($type);

			if (isset($epigraphArray['funzione'])) {
				$funzione = $repoFunzione->find($epigraphArray['funzione']);
				$epigraph->setFunzione($funzione);
			}
			else
				$epigraph->setFunzione(null);

			
			if (isset($epigraphArray['transcription'])) {
				$epigraph->setTrascription($epigraphArray['transcription']);
			}
			else
				$epigraph->setTrascription(null);

			if ($epigraphArray['ambitoOnomastico'] != '') 
			{
				$ambitoOnomastico = $repoAmbito->find($epigraphArray['ambitoOnomastico']);
				$epigraph->setAmbitoOnomastico($ambitoOnomastico);
			}
			else
				$epigraph->removeAmbitoOnomastico();

			$epigraph->emptySignas();
			if (isset($epigraphArray['signas'])) {
				$signas = $epigraphArray['signas'];
				foreach ($signas as $s) {
					$signa = $repoSigna->find($s);
					if ($signa)
						$epigraph->addSigna($signa);
				}
			}
			
			if (isset($epigraphArray['reimpiego_opistografia'])) {
				if ($epigraphArray['reimpiego_opistografia'] == 'on')
					$epigraph->setReimpiegoOpistografia('S');
			} else
				$epigraph->setReimpiegoOpistografia('N');

			if (isset($epigraphArray['metricText'])) {
				if ($epigraphArray['metricText'] == 'on')
					$epigraph->setMetricText('S');
			} else
				$epigraph->setMetricText('N');

			if (isset($epigraphArray['greek'])) {
				if ($epigraphArray['greek'] == 'on')
					$epigraph->setGreek('S');
			} else
				$epigraph->setGreek('N');

			if (isset($epigraphArray['presenceLG'])) {
				if ($epigraphArray['presenceLG'] == 'on')
					$epigraph->setPresenceLG('S');
			} else
				$epigraph->setPresenceLG('N');

			if (isset($epigraphArray['criticalApparatus'])) {
				$epigraph->setCriticalApparatus($epigraphArray['criticalApparatus']);
			}

			if (isset($epigraphArray['divergentText'])) {
				if ($epigraphArray['divergentText'] == 'on')
					$epigraph->setDivergentText(true);
				else
					$epigraph->setDivergentText(false);
			} else
				$epigraph->setDivergentText(false);

			if (isset($epigraphArray['comment']))
				$epigraph->setComment($epigraphArray['comment']);
			else
				$epigraph->setComment(null);

			// Compilator needs User object
			// old was: $epigraph->setCompilator($this->get('security.context')->getToken()->getUser()->getId());
			
			if(!$update)
			{
				$epigraph->setCompilator($this->get('security.context')->getToken()->getUser());

				// Backward compatibility for OldCompilator
				$oldCompilaterUser = $this->get('security.context')->getToken()->getUser();
				$epigraph->setOldCompilator($oldCompilaterUser->getFirstname() . ' ' . $oldCompilaterUser->getLastname());
			}
			else
			new \DateTime("now");
			
			$epigraph->setLastCompilator($this->get('security.context')->getToken()->getUser());
			$epigraph->setEditedAt(new \DateTime("now"));

			if(!$update)
				$em->persist($epigraph);
			else
			{
				$oldDatings = $epigraph->getDatings();
				foreach($oldDatings as $oldDating)
					$em->remove($oldDating);
				
				$oldReferences = $epigraph->getLiteratures();
				foreach($oldReferences as $oldLit)
					$em->remove($oldLit);
				
				$oldRelatedResources = $epigraph->getRelatedResources();
				foreach($oldRelatedResources as $oldLit)
					$em->remove($oldLit);
			}
			$em->flush();
				
			foreach ($arrayDatings as $epDating) {
				$epDating->setId($epigraph);
				$em->persist($epDating);
			}
			
			if (isset($epigraphArray['references'])) {
				$references = $epigraphArray['references'];
				foreach ($references as $s) {
					$splits = explode("@_@", $s);
					$refId = $splits[0];
					$note = $splits[1];
					$relationship = $splits[2];
					$reference = $repoReference->find($refId);
					if ($reference)
					{
						$biblioReference = new BiblioRiferimentoEpigrafe();
						$biblioReference->setIdEpigrafe($epigraph);
						$biblioReference->setIdRiferimento($reference);
						if(strlen($note) > 0)
							$biblioReference->setNote($note);
						$biblioReference->setRelazione($relationship);
						$em->persist($biblioReference);
					}
				}
			}
			
			if (isset($epigraphArray['relatedResources'])) {
				$relatedResources = $epigraphArray['relatedResources'];
				foreach ($relatedResources as $ids) {
					$split = explode("@-@", $ids);
					$c = new RelatedResource();
					$c->setIdEpigrafe($epigraph);
					$c->setRelationType($split[1]);
					$c->setResourceRef($split[2]);
					$c->setResourceType($repoResourceTypes->find($split[0]));
					$em->persist($c);
				}
			}
			
			$em->flush();
			return $epigraph;

		} catch (Exception $e) {
			throw new Exception("Error send the exception to the admin", 0, $e);
		}
	}

}
