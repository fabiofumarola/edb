<?php

namespace Kdde\EdbBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PublicationsController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('KddeEdbBundle:InfoPages:publications.html.twig');
    }
}
