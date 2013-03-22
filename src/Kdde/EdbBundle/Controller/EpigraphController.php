<?php

namespace Kdde\EdbBundle\Controller;
use Kdde\EdbStoreBundle\Entity\EpigraphDating;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\Common\Cache\ArrayCache;

use Kdde\EdbStoreBundle\Entity\Data;

use Kdde\EdbStoreBundle\Entity\Ambito;

use Kdde\EdbStoreBundle\Entity\Material;

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

		if (in_array("administrator", $roles))
			$pendingEpigraphes = $repository->findBy(array('isActive'=> false), array('id' => 'ASC'));
		else
			$pendingEpigraphes = $repository->findBy(array('isActive'=> false, 'compilator' => $compilator), array('id' => 'ASC'));
		

		return $this
				->render('KddeEdbBundle:Epigraph:status.html.twig',
						array('epigraphes' => $pendingEpigraphes));
	}

	public function approveAction($id) {
		
		$epigraph = $this->approveEpigraph($id);
		if ($epigraph == null) {
			$this->get('session')
			->setFlash('error',
					'The epigraph with id ' . $id
					. " is not in the database!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		else
		{
			$this->get('session')
					->setFlash('notice',
							'Your changes were saved, the epigraph with id '
									. $epigraph->getId() . " is approved !");
			return $this->redirect($this->generateUrl('edb_epigraph_status'));
		}
	}

	private function approveEpigraph($id) {
		$repository = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getEntityManager();
		$epigraph = $repository->find($id);
		if($epigraph != null)
		{
			$epigraph->setIsActive(true);
			$em->flush();
		}	
		return $epigraph;
	}
	
	// Codice duplicato. Vedere se possibile ristrutturare
	public function editAction($id, Request $request) {
		
		$repository = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getEntityManager();
		$epigraph = $repository->find($id);
		
		if ($epigraph == null) {
			$this->get('session')
			->setFlash('error',
					'The epigraph with id ' . $id
					. " it is not in the database!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		
		
		//select all the icvr
		$repoIcvr = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Icvr');
		$icvrs = $repoIcvr->findAll();
		
		//select all the bibliography
		$repoLiterature = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Literature');
		$literatures = $repoLiterature->findBy(array(), array('id' => 'ASC'));
		
		$repoSupport = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Support');
		$supports = $repoSupport
		->findBy(array(), array('description' => 'ASC'));
		
		$repoTechnique = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Technique');
		$techniques = $repoTechnique
		->findBy(array(), array('description' => 'ASC'));
		
		$repoPaleography = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Paleography');
		$paleographies = $repoPaleography
		->findBy(array(), array('description' => 'ASC'));
		
		$repoFunzione = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Funzione');
		$funzioni = $repoFunzione
		->findBy(array(), array('description' => 'ASC'));
		
		$repoAmbito = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Ambito');
		$ambiti = $repoAmbito->findBy(array(), array('description' => 'ASC'));
		
		$repoDating = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Dating');
		$datings = $repoDating->findBy(array(), array('description' => 'ASC'));
		
		$repoTypes = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Type');
		$types = $repoTypes->findBy(array(), array('description' => 'ASC'));
		
		$em = $this->getDoctrine()->getEntityManager();
		
		//$form = $this->createForm(new EpigraphType(), new Epigraph());
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();
		
		if ($request->getMethod() == 'POST') {
		
			$serializer = new Serializer(array(new GetSetMethodNormalizer()),
					array('json' => new JsonEncoder()));
		
			$form->bindRequest($request);
		
			if ($form->isValid()) {
		
				$epigraphArray = $request->get('epigraph');
				$epigraph = $this->persistEpigraph($epigraphArray, $epigraph);
				
				$message = 'Your changes to the epigraph ' . $epigraph->getId() . ' have been succesfully saved.';
				
				$approveButton = $request->get('submitAndApproveButton');
				if(isset($approveButton))
				{
					$this->approveEpigraph($epigraph->getId());
					$message = 'Your changes to the epigraph ' . $epigraph->getId() . ' have been succesfully saved and it has been approved!';
				}

				$this->get('session')->setFlash('notice', $message);
				return $this->redirect($this->generateUrl('edb_epigraph_edit', array('id' => $epigraph->getId())));
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
						'datings' => $datings, 'types' => $types,
						'e' => $epigraph,
						'admin' => $isAdmin 
		));
	}

	
	
	
	public function showAction($id) {
		$repository = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getEntityManager();
		$epigraph = $repository->find($id);
	
		if ($epigraph == null || $epigraph->getIsActive() == false) {
			$this->get('session')
					->setFlash('error',
							'The epigraph with id ' . $id
									. " is not in the database or it is still not approved!");
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		
		return $this
				->render('KddeEdbBundle:Epigraph:show.html.twig',
						array('e' => $epigraph));
	}
	
	
	public function originalcontextlistAction($id, $_format) {	
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getEntityManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getPertinence(), 'json');
		return new Response($json);
	}
	
	public function conservationlistAction($id, $_format) {
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getEntityManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getConservations(), 'json');
		return new Response($json);
	}
	
	public function datingslistAction($id, $_format) {
		if ($_format != "json")
			return new Response(json_encode("it supports only json"));
	
		$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
		$em = $this->getDoctrine()->getEntityManager();
		$epigraph = $repository->find($id);
		$serializer = $this->get('jms_serializer');
		$json = $serializer->serialize($epigraph->getDatings(), 'json');
		return new Response($json);
	}
	
	
	public function newAction(Request $request) {

		//select all the icvr
		$repoIcvr = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Icvr');
		$icvrs = $repoIcvr->findAll();

		//select all the bibliography
		$repoLiterature = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Literature');
		$literatures = $repoLiterature->findBy(array(), array('id' => 'ASC'));

		$repoSupport = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Support');
		$supports = $repoSupport
				->findBy(array(), array('description' => 'ASC'));

		$repoTechnique = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Technique');
		$techniques = $repoTechnique
				->findBy(array(), array('description' => 'ASC'));

		$repoPaleography = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Paleography');
		$paleographies = $repoPaleography
				->findBy(array(), array('description' => 'ASC'));

		$repoFunzione = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Funzione');
		$funzioni = $repoFunzione
				->findBy(array(), array('description' => 'ASC'));

		$repoAmbito = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Ambito');
		$ambiti = $repoAmbito->findBy(array(), array('description' => 'ASC'));

		$repoDating = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Dating');
		$datings = $repoDating->findBy(array(), array('description' => 'ASC'));

		$repoTypes = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Type');
		$types = $repoTypes->findBy(array(), array('description' => 'ASC'));

		$em = $this->getDoctrine()->getEntityManager();

		//$form = $this->createForm(new EpigraphType(), new Epigraph());
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();

		if ($request->getMethod() == 'POST') {

			$serializer = new Serializer(array(new GetSetMethodNormalizer()),
					array('json' => new JsonEncoder()));

			$form->bindRequest($request);

			if ($form->isValid()) {

				$epigraphArray = $request->get('epigraph');

				$epigraph = $this->persistEpigraph($epigraphArray, null);
				//$em->persist($epigraph);

				//$em->flush();

				$this->get('session')
						->setFlash('notice',
								'Your changes were saved, the epigraph is saved with id '
										. $epigraph->getId()) . " !";

				return $this->redirect($this->generateUrl('edb_epigraph_edit', array('id' => $epigraph->getId())));
				
				//return new Response($serializer->serialize($epigraphArray, 'json'));
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
								'datings' => $datings, 'types' => $types));
	}

	private function persistEpigraph($epigraphArray, $epigraph) {

		$repoIcvr = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Icvr');
		$repoLiterature = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Literature');
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
		$em = $this->getDoctrine()->getEntityManager();

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

				
			if (isset($epigraphArray['icvr'])) {
				$icvr = $repoIcvr->find($epigraphArray['icvr']);
				$epigraph->setIcvr($icvr);
			}
			else
				$epigraph->setIcvr(null);
			
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

			
			// GIAN: Letteratura. Ignorata perchè da rifare
			//------------------------------------------------------
			if (isset($epigraphArray['literaturesTextArea'])) {
				//split the inserted literatures
				$arrayLiteratureIds = explode(";\r\n",
						$epigraphArray['literaturesTextArea']);
				//for each literature
				foreach ($arrayLiteratureIds as $lit) {

					if (strlen($lit) == 0)
						continue;

					//check if there are references about page numbers
					$arrayLit = explode(",", $lit);
					if (count($arrayLit) == 0)
						continue;
					//get the literature based on the id
					$literature = $repoLiterature->find(trim($arrayLit[0]));
					if ($literature == null)
						continue;

					$epigraphLiterature = new EpigraphLiterature();
					$epigraphLiterature->setLiterature($literature);
					array_shift($arrayLit);
					if (count($arrayLit) > 0)
						$epigraphLiterature
								->setReference(implode(" ", $arrayLit));

					//add to the epigraph
					//$epigraph->addEpigraphLiterature($epigraphLiterature);
					$arrayLiteratures->add($epigraphLiterature);
				}
			}
			//------------------------------------------------------
					

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

			if (isset($epigraphArray['ambitoOnomastico'])) {
				$ambitoOnomastico = $repoAmbito->find($epigraphArray['ambitoOnomastico']);
				$epigraph->setAmbitoOnomastico($ambitoOnomastico);
			}
			else 
				$epigraph->setAmbitoOnomastico(null);

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
			$epigraph->setCompilator($this->get('security.context')->getToken()->getUser());

			// Backward compatibility for OldCompilator
			$oldCompilaterUser = $this->get('security.context')->getToken()->getUser();
			$epigraph->setOldCompilator($oldCompilaterUser->getFirstname() . ' ' . $oldCompilaterUser->getLastname());
			
			
			
			// GIAN: Letteratura. Ignorata perchè da rifare
			//------------------------------------------------------			
			foreach ($arrayLiteratures as $epLit) {
				$epLit->setEpigraph($epigraph);
				$em->persist($epLit);
			}
			//------------------------------------------------------
				
			
			if(!$update)
				$em->persist($epigraph);
			else
			{
				$oldDatings = $epigraph->getDatings();
				foreach($oldDatings as $oldDating)
					$em->remove($oldDating);
			}
			$em->flush();
				
			foreach ($arrayDatings as $epDating) {
				$epDating->setId($epigraph);
				$em->persist($epDating);
			}
			
			$em->flush();
			return $epigraph;

		} catch (Exception $e) {
			throw new Exception("Error send the exception to the admin", 0, $e);
		}
	}

}
