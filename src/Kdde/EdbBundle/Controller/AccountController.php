<?php
namespace Kdde\EdbBundle\Controller;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

use Kdde\EdbBundle\Form\Model\Registration;

use Kdde\EdbBundle\Form\Type\RegistrationType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AccountController extends Controller {

	public function registerAction() {
		$form = $this->createForm(new RegistrationType(), new Registration());

		return $this
				->render('KddeEdbBundle:Account:register.html.twig',
						array('form' => $form->createView()));
	}

	public function createAction() {
		
		$em = $this->getDoctrine()->getEntityManager();
		$form = $this->createForm(new RegistrationType(), new Registration());
		$form->bindRequest($this->getRequest());
		
		if ($form->isValid()) {
			$user = $form->getData()->getUser();	
					
			// encode and set the password for the user,
			// these settings match our config
			$encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
			$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
			$user->setPassword($password);
			$em->persist($user);
			$em->flush();
			return $this->redirect($this->generateUrl('edb_homepage'));
		}
		return $this
				->render('KddeEdbBundle:Account:register.html.twig',
						array('form' => $form->createView()));
	}

}
