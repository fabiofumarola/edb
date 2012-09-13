<?php

namespace Kdde\EdbBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StatusController extends Controller
{
    
    public function indexAction()
    {
    	
    	//$users = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Utente')->findAll();
    	//print_r($users);
    
        return $this->render('KddeEdbBundle:Status:index.html.twig');
    }
}
