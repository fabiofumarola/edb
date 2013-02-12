<?php

namespace Kdde\EdbBundle\Controller;
use Kdde\EdbStoreBundle\Entity\PertinenceContext;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;

use Kdde\EdbBundle\Form\Type\LiteratureType;
use Kdde\EdbBundle\Form\Type\PertinenceContextType;

use Kdde\EdbStoreBundle\Entity\Literature;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Kdde\EdbBundle\Form\Type\EpigraphType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PertinenceContextController extends Controller {

	public function listAction($id, $_format) {

		if ($_format != "json")
			return new Response(json_encode("it supports only json"));

		$repo = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:PertinenceContext');

		//$areas = $repo->findBy(array(),array('description' => 'ASC'));
// 		$contexts = $repo->findAllByIdArea($id);
		$contexts = $repo->findBy(array('area'=>$id), array('description' => 'ASC'));
		$serializer = new Serializer(array(new GetSetMethodNormalizer()),
				array('json' => new JsonEncoder()));
		$json = $serializer->serialize($contexts, 'json');

		return new Response($json);
	}

	public function newModalAction() {

		$serializer = new Serializer(array(new GetSetMethodNormalizer()),
				array('json' => new JsonEncoder()));
		$repoPC = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:PertinenceContext');
		$repoPA = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:PertinenceArea');
		$em = $this->getDoctrine()->getEntityManager();

		//check if it is in the db
		$description = $this->getRequest()->get('description');
		$idArea = $this->getRequest()->get('idArea');

		if ($repoPC->findByDescriptionAndIdArea($description, $idArea) != null)
			return new Response(
					$serializer
							->serialize('Error: Existing Pertinence Context',
									'json'));

		$area = $repoPA->find($idArea);

		$pertinenceContext = new PertinenceContext();
		$pertinenceContext->setDescription($description);
		$pertinenceContext->setArea($area);
		$em->persist($pertinenceContext);
		$em->flush();

		return new Response($serializer->serialize('ok', 'json'));
	}

	public function editAction() {

		$em = $this->getDoctrine()->getEntityManager();

		$repo = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:PertinenceContext');
		$repoArea = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:PertinenceArea');
		$pertContext = new PertinenceContext();

		$areas = $repoArea->findAll();

		$form = $this->createForm(new PertinenceContextType(), $pertContext);

		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') {
			$form->bindRequest($this->getRequest());

			if ($form->isValid()) {
				$pertContext = $form->getData();
				$elements =  $request->get('Original_Context');
				if (isset($elements['area'])){
					$areaId = $elements['area'];
					$pertContext->setArea($repoArea->find($areaId));
				}
				$em->merge($pertContext);
				$em->flush();
				$this->get('session')
						->setFlash('notice', 'Your changes were saved!');
				
				return $this->redirect($this->generateUrl('edb_pertinence_context_edit'));
			}
		}
		return $this
				->render('KddeEdbBundle:PertinenceContext:edit.html.twig',
						array('form' => $form->createView(),
								'pertinenceAreas' => $areas));
	}
}
