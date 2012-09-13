<?php

namespace Kdde\EdbBundle\Controller;

use Kdde\EdbStoreBundle\Entity\Epigraph;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
//     	$epigraph = new Epigraph();
    	
//     	$epigraph = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph')->find(27106);
//     	echo $epigraph->getFunzione()->getDescription();
    	//$user = $this->get('security.context')->getToken()->getUser();
    	

    
        return $this->render('KddeEdbBundle:Default:index.html.twig');
    }
}
