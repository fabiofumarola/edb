<?php

namespace Kdde\EdbBundle\Controller;


use Kdde\EdbStoreBundle\Entity\Epigraph;

use Kdde\EdbBundle\Form\Type\EpigraphType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class EpigraphController extends Controller
{
    
    public function indexAction()
    {
    	
    	//$users = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Utente')->findAll();
    	//print_r($users);
    
        return $this->render('KddeEdbBundle:Epigraph:index.html.twig');
    }
    
    public function newAction(){
    	
    	$form = $this->createForm(new EpigraphType(), new Epigraph());
    	
    	$request = $this->getRequest();
    	
    	if ($request->getMethod() == 'POST'){
    		$form->bindRequest($this->getRequest());
    			
    		if ($form->isValid()) {
    			$data = $form->getData();
    			
    			echo print_r($data);
    			
    			//$em->flush();
    				
    			$this->get('session')->setFlash('notice', 'Your changes were saved!');
    				
    			return $this->redirect($this->generateUrl('edb_homepage'));
    		}
    	}
    	return $this->render('KddeEdbBundle:Epigraph:new.html.twig', array('form' => $form->createView()));
    }
}
