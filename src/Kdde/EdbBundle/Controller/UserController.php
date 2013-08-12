<?php
namespace Kdde\EdbBundle\Controller;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

use Kdde\EdbBundle\Form\Type\UserEditPwdType;

use Kdde\EdbBundle\Form\Type\UserEditType;

use Kdde\EdbBundle\Form\Type\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kdde\EdbStoreBundle\Entity\User;

class UserController extends Controller {

	/**
	 * load users from the db
	 */
	public function listAction() {

		$em = $this->getDoctrine()->getEntityManager();

		$users = $em->getRepository('KddeEdbStoreBundle:User')
				->findAllOrderedByUsername();

		return $this
				->render('KddeEdbBundle:User:users.html.twig',
						array('users' => $users));

	}

	public function showAction($id) {

		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');

		$user = $repo->find($id);

		return $this
				->render('KddeEdbBundle:User:show.html.twig',
						array('user' => $user));
	}

	public function editAction($id) {
		
		$em = $this->getDoctrine()->getEntityManager();
		
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');
		$user = $repo->find($id);
		
		$form = $this->createForm(new UserEditType(), $user);
		
		$request = $this->getRequest();
		
		if ($request->getMethod() == 'POST'){
			$form->bind($this->getRequest());
			
			if ($form->isValid()) {
				$user = $form->getData();
				$em->flush();
					
				$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
					
				return $this->redirect($this->generateUrl('edb_user_list'));
			}
		}
		return $this
				->render('KddeEdbBundle:User:edit.html.twig', array('form' => $form->createView(), 'id' => $id));
	}
	

	public function deleteAction($id) {
		$repo = $this->getDoctrine()->getRepository('KddeEdbStoreBundle:User');

		$user = $repo->find($id);
		
		$request = $this->getRequest();
		
		if ($request->getMethod() == 'POST'){
			
		}

		return $this
				->render('KddeEdbBundle:User:delete.html.twig',
						array('user' => $user));
	}
	
	public function destroyAction($id){
		
	}

	public function activateAction($id) {

		$em = $this->getDoctrine()->getEntityManager();
		$user = $em->getRepository('KddeEdbStoreBundle:User')->find($id);

		$user->setIsActive(true);
		$em->flush();
		
		$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
		
		return $this->redirect($this->generateUrl('edb_user_list'));

	}

	public function deactivateAction($id) {
		
		$em = $this->getDoctrine()->getEntityManager();
		$user = $em->getRepository('KddeEdbStoreBundle:User')->find($id);

		$user->setIsActive(false);
		$em->flush();
		
		$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');

		return $this->redirect($this->generateUrl('edb_user_list'));
	}
	
	public function resetPasswordAction($id){
		
		$em = $this->getDoctrine()->getEntityManager();
		$user = $em->getRepository('KddeEdbStoreBundle:User')->find($id);
		
		$form = $this->createForm(new UserEditPwdType(), $user);
		
		$request = $this->getRequest();
		
		if ($request->getMethod() == 'POST'){
			
			$form->bind($this->getRequest());
			
			if ($form->isValid()) {
				$user = $form->getData();
					
				// encode and set the password for the user,
				// these settings match our config
				$encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
				$password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
				$user->setPassword($password);
					
				$em->flush();
					
				$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
					
				return $this->redirect($this->generateUrl('edb_user_list'));
			}
		}
		
		return $this
		->render('KddeEdbBundle:User:reset.html.twig', array('form' => $form->createView(), 'id' => $id));
	}
	

}
