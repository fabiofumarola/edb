<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbBundle\Form\Type\LiteratureType;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Serializer;

use Symfony\Component\HttpFoundation\Response;

use Kdde\EdbStoreBundle\Entity\Epigraph;
use Kdde\EdbStoreBundle\Entity\BiblioRivista;
use Kdde\EdbStoreBundle\Entity\BiblioConvegno;
use Kdde\EdbStoreBundle\Entity\BiblioVolume;
use Kdde\EdbStoreBundle\Entity\BiblioRiferimento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LiteratureController extends Controller {
	

	public function indexAction() {
		$literatures = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRiferimento')->findBy(array(), array('tipo' => 'ASC', 'id' => 'ASC'));
		return $this->render('KddeEdbBundle:Literature:literatures.html.twig',array('literatures' => $literatures));
	}
	
	public function indexModalAction($type) {
		$references = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRiferimento')->findBy(array('tipo'=>$type), array('tipo' => 'ASC', 'id' => 'ASC'));
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$json = $serializer->serialize($references, 'json');
		return new Response($json);
	}
	
	public function singleModalAction($refId) {
		$references = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRiferimento')->findBy(array('id'=>$refId));
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$json = $serializer->serialize($references, 'json');
		return new Response($json);
	}

	public function newAction() {

		$em = $this->getDoctrine()->getEntityManager();
		$form = $this->createFormBuilder(array())->getForm();		
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST') {
			$form->bind($this->getRequest());

			if ($form->isValid()) {
				$literature = $form->getData();
				$em->persist($literature);
				$em->flush();

				$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');

				return $this->redirect($this->generateUrl('edb_literature_list'));
			}
		}

		return $this
				->render('KddeEdbBundle:Literature:create.html.twig',
						array('form' => $form->createView()));
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
	
	
	
	// Action to get the list of journal
	public function listJournalAction($_format)
	{
		if ($_format != "json")
			return new Response(json_encode("Tt supports only json"));
	
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRivista');
	
		$riviste = $repo->findBy(array(),array('titolo' => 'ASC'));
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$json = $serializer->serialize($riviste, 'json');
	
		return new Response($json);
	}
	
	
	// Action to add a new journal
	public function newJournalModalAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
	
 		$repoRivista = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRivista');
	
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
	
			$rivista = new BiblioRivista();
			$rivista->setTitolo($request->request->get('name'));
				
			if ($repoRivista->findBy(array('titolo' => $rivista->getTitolo())) != null) 
				return new Response($serializer->serialize('Journal already stored!', 'json'));
					
			$em->persist($rivista);
			$em->flush();
	
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	
	
	
	public function newJournalReferenceAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
		$em->getConfiguration()->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
		
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
			$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioRivista');
			$biblio = $repo->findOneById($request->request->get('journal'));
			
			$riferimento = new BiblioRiferimento();
			$riferimento->setTipo("Rivista");
			$riferimento->setId("dummy");
			$riferimento->setAutori($request->request->get('authors'));
			$riferimento->setTitolo($request->request->get('title'));
			$riferimento->setIdRivista($biblio);	
			
			$number = $request->request->get('number');
			if($number != "")
				$riferimento->setNumero($number);
			
			$riferimento->setAnno($request->request->get('year'));	
			$riferimento->setPagineDa($request->request->get('pagesFrom'));
			$riferimento->setPagineA($request->request->get('pagesTo'));
			
			$figs = $request->request->get('figs');
			if($figs != "")
				$riferimento->setFigure($figs);
			
			$url = $request->request->get('refUrl');
			if($url != "")
				$riferimento->setUrl($url);
			
			$doi = $request->request->get('doi');
			if($doi != "")
				$riferimento->setDoi($doi);
			
			$em->persist($riferimento);		
			$em->flush();
			
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	
	
	
	public function newConferenceReferenceAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$request = $this->getRequest();
		
		if ($request->getMethod() == 'POST') {
			$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioConvegno');
			$biblio = $repo->findOneById($request->request->get('conference'));
				
			$riferimento = new BiblioRiferimento();
			$riferimento->setTipo("Convegno");
			$riferimento->setId("dummy");
			$riferimento->setAutori($request->request->get('authors'));
			$riferimento->setTitolo($request->request->get('title'));
			$riferimento->setIdConvegno($biblio);
			$riferimento->setPagineDa($request->request->get('pagesFrom'));
			$riferimento->setPagineA($request->request->get('pagesTo'));
								
			$url = $request->request->get('refUrl');
			if($url != "")
				$riferimento->setUrl($url);
				
			$doi = $request->request->get('doi');
			if($doi != "")
				$riferimento->setDoi($doi);
				
			$em->persist($riferimento);
			$em->flush();
				
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	


	public function newVolumeReferenceAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
			$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioVolume');
			$biblio = $repo->findOneById($request->request->get('volume'));
	
			$riferimento = new BiblioRiferimento();
			$riferimento->setTipo("Volume");
			$riferimento->setId("dummy");
			$riferimento->setAutori($request->request->get('authors'));
			$riferimento->setTitolo($request->request->get('title'));
			$riferimento->setIdVolume($biblio);
			$riferimento->setPagineDa($request->request->get('pagesFrom'));
			$riferimento->setPagineA($request->request->get('pagesTo'));
	
			$url = $request->request->get('refUrl');
			if($url != "")
				$riferimento->setUrl($url);
	
			$doi = $request->request->get('doi');
			if($doi != "")
				$riferimento->setDoi($doi);
	
			$em->persist($riferimento);
			$em->flush();
	
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	

	
	
	public function newMonographReferenceAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
	
			$riferimento = new BiblioRiferimento();
			$riferimento->setTipo("Monografia");
			$riferimento->setId("dummy");
			$riferimento->setAutori($request->request->get('authors'));
			$riferimento->setTitolo($request->request->get('title'));
			$riferimento->setAnno($request->request->get('year'));
			$riferimento->setCittaEdizione($request->request->get('city'));
				
			$url = $request->request->get('refUrl');
			if($url != "")
				$riferimento->setUrl($url);
	
			$doi = $request->request->get('doi');
			if($doi != "")
				$riferimento->setDoi($doi);
	
			$em->persist($riferimento);
			$em->flush();
	
			
			
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	


	
	public function newCorpusReferenceAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
			$riferimento = new BiblioRiferimento();
			$riferimento->setTipo("Corpus");
			$riferimento->setId("dummy");
			$riferimento->setSigla($request->request->get('abbr'));
			$riferimento->setTitolo($request->request->get('title'));
			
			$year = $request->request->get('year');
			if($year != "")
				$riferimento->setAnno($year);
			
			$editors = $request->request->get('editors');
			if($editors != "")
				$riferimento->setEditori($editors);
			
			$number = $request->request->get('number');
			if($number != "")
				$riferimento->setNumero($request->request->get('number'));
			
			$city = $request->request->get('city');
			if($city != "")
				$riferimento->setCittaEdizione($request->request->get('city'));
	
			$url = $request->request->get('refUrl');
			if($url != "")
				$riferimento->setUrl($url);
	
			$doi = $request->request->get('doi');
			if($doi != "")
				$riferimento->setDoi($doi);
	
			$em->persist($riferimento);
			$em->flush();			
				
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	
	public function newRepertoryReferenceAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
	
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
			$riferimento = new BiblioRiferimento();
			$riferimento->setTipo("Repertorio");
			$riferimento->setId("dummy");
			$riferimento->setSigla($request->request->get('abbr'));
			$riferimento->setTitolo($request->request->get('title'));
				
			$url = $request->request->get('refUrl');
			if($url != "")
				$riferimento->setUrl($url);
	
			$doi = $request->request->get('doi');
			if($doi != "")
				$riferimento->setDoi($doi);
	
			$em->persist($riferimento);
			$em->flush();
	
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	
	
	// Action to get the list of conferences
	public function listConferenceAction($_format)
	{
		if ($_format != "json")
			return new Response(json_encode("Tt supports only json"));
	
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioConvegno');
	
		$convegni = $repo->findBy(array(),array('titolo' => 'ASC'));
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$json = $serializer->serialize($convegni, 'json');
	
		return new Response($json);
	}
	
	
	
	// Action to add a new conference
	public function newConferenceModalAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
		
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
	
			$conferenza = new BiblioConvegno();
			$conferenza->setTitolo($request->request->get('name'));
			$conferenza->setEditori($request->request->get('editors'));
			$conferenza->setAnnoEdizione($request->request->get('year'));
			$conferenza->setCittaEdizione($request->request->get('city_edition'));
			$conferenza->setLuogoConvegno($request->request->get('city'));
			$conferenza->setDataConvegno($request->request->get('date'));
			$em->persist($conferenza);
			$em->flush();
	
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
	
	
	
	// Action to get the list of volumes
	public function listVolumeAction($_format)
	{
		if ($_format != "json")
			return new Response(json_encode("Tt supports only json"));
	
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:BiblioVolume');
	
		$volumi = $repo->findBy(array(),array('titolo' => 'ASC'));
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
		$json = $serializer->serialize($volumi, 'json');
	
		return new Response($json);
	}
	
	
	// Action to add a new conference
	public function newVolumeModalAction() {
	
		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	
		$em = $this->getDoctrine()->getEntityManager();
		
		$request = $this->getRequest();
	
		if ($request->getMethod() == 'POST') {
	
			$volume = new BiblioVolume();
			$volume->setTitolo($request->request->get('name'));
			$volume->setEditori($request->request->get('editors'));
			$volume->setAnnoEdizione($request->request->get('year'));
			$volume->setCittaEdizione($request->request->get('city_edition'));
			$em->persist($volume);
			$em->flush();
	
			return new Response($serializer->serialize('ok','json'));
		}
		return new Response($serializer->serialize('Access by post','json'));
	}
}
