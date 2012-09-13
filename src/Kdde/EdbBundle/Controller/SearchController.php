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
		$repoSigna = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Signa');
		$repoEpigraph = $this->getDoctrine()
				->getRepository('KddeEdbStoreBundle:Epigraph');

		$icvrs = $repoIcvr->findAll();
		$defaultData = array();
		$form = $this->createFormBuilder($defaultData)->getForm();

		if ($request->getMethod() == 'POST') {

			$serializer = new Serializer(array(new GetSetMethodNormalizer()),
					array('json' => new JsonEncoder()));

			$searchArray = $request->get('search');
			$id = null;
			$icvrId = null;
			$principalProgNumber = null;
			$areaId = null;
			$contextId = null;
			$transcription = null;
			$useThesaurus = false;

			$anyParameter = false;
			$anyError = false;

			if (strlen($searchArray['id'])) {
				$id = $searchArray['id'];
				$anyParameter = true;
				if (!is_numeric($id)) {
					$anyError = true;
					$this->get('session')
					->setFlash('error', 'The id should be a number !');
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
					$anyError = true;
					$this->get('session')
					->setFlash('error', 'The ICVR id should be a number !');
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
				$this->get('session')
						->setFlash('error',
								'You should insert at least one parameter !');
			}else if (!$anyError){
				
				//do the query
				$epigraphes = $repoEpigraph
				->findBasicSearch($id, $icvrId, $principalProgNumber,
						$areaId, $contextId, $transcription, $useThesaurus);
				
				$count = count($epigraphes);
				
				return $this
				->render('KddeEdbBundle:Search:result.html.twig',
						array('epigraphes' => $epigraphes,
								'count' => $count));
				
			}
		}
		return $this
				->render('KddeEdbBundle:Search:basic.html.twig',
						array('form' => $form->createView(), 'icvrs' => $icvrs,));
	}

	public function retrieveBasicAction(Request $request) {

	}
}
