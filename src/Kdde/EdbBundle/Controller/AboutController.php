<?php

namespace Kdde\EdbBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AboutController extends Controller
{
    public function indexAction()
    {    	
    	$repository = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:Epigraph');
    	$em = $this->getDoctrine()->getManager();

    	// Get the total number of epigraphs
    	$em = $this->getDoctrine()->getManager();
    	$qb = $em->createQueryBuilder();
    	$qb->select('count(ep.id)');
    	$qb->from('KddeEdbStoreBundle:Epigraph','ep');
    	$numberTotal = $qb->getQuery()->getSingleScalarResult();
    	
    	// Get the number of online epigraphs
    	$qb = $em->createQueryBuilder();
    	$qb->select('count(ep.id)');
    	$qb->from('KddeEdbStoreBundle:Epigraph','ep');
    	$qb->where('ep.status = ?1');
    	$qb->setParameter(1, 2);
    	$numberOnline = $qb->getQuery()->getSingleScalarResult();
    	
    	// Compute the difference (pending epigraphs)
    	$numberPending = $numberTotal - $numberOnline;
    	
    	return $this->render('KddeEdbBundle:InfoPages:about.html.twig', 
    			array('numberTotal' => $numberTotal,
    					'numberOnline' => $numberOnline, 
    					'numberPending' => $numberPending));
    }
}
