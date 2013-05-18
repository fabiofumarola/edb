<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbBundle\Form\Type\LiteratureType;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LiteratureController extends Controller {
	

	public function indexAction() {
		$literatures = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Literature')->findAll();

		return $this
				->render('KddeEdbBundle:Literature:literatures.html.twig',
						array('literatures' => $literatures));
	}

	public function newAction() {

		$em = $this->getDoctrine()->getEntityManager();
		$form = $this->createFormBuilder(array())->getForm();

		$repoRiviste = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRivista');
		$riviste = $repoRiviste->findBy(array(), array('titolo' => 'ASC'));
		
		$repoConferenze = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioConvegno');
		$conferenze = $repoConferenze->findBy(array(), array('titolo' => 'ASC'));
		
		$repoVolumi = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioVolume');
		$volumi = $repoVolumi->findBy(array(), array('titolo' => 'ASC'));
		
		
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') {
			$form->bindRequest($this->getRequest());

			if ($form->isValid()) {
				$literature = $form->getData();
				$em->persist($literature);
				$em->flush();

				$this->get('session')
						->setFlash('notice', 'Your changes were saved!');

				return $this->redirect($this->generateUrl('edb_literature_list'));
			}
		}

		return $this
				->render('KddeEdbBundle:Literature:create.html.twig',
						array('form' => $form->createView(),
								'riviste' => $riviste,
								'conferenze' => $conferenze,
								'volumi' => $volumi
		));
	}

	public function newModalAction() {
		
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
				JsonEncoder()));

		$em = $this->getDoctrine()->getEntityManager();
		
		$litRepo = $this->getDoctrine()
		->getRepository('KddeEdbStoreBundle:Literature');

		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') {

			$literature = new Literature();
			$literature->setId($request->request->get('id'));
			
			if ($litRepo->find($literature->getId()) != null)
				return new Response($serializer->serialize('literature already stored', 'json'));
			
			$literature
					->setDescription(
							$request->request->get('description'));
			$literature->setNote($request->request->get('note'));

			$em->persist($literature);
			$em->flush();

			return new Response($serializer->serialize('ok','json'));
			//return $this->redirect($this->generateUrl('edb_literature_list'));
		}
		return new Response($serializer->serialize('access by post','json'));
		//return $this->render('KddeEdbBundle:Literature:create.html.twig', array('form' => $form->createView()));
	}
}
