<?php

namespace Kdde\EdbBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PeopleController extends Controller
{
    public function indexAction()
    {
        return $this->render('KddeEdbBundle:InfoPages:people.html.twig');
    }
}
