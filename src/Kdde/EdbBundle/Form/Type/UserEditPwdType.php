<?php

namespace Kdde\EdbBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Kdde\EdbStoreBundle\Entity;

class UserEditPwdType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options){
		
		$builder->add('username','text');
		$builder->add('email', 'email');
 		$builder->add('password', 'repeated', array(
 				'first_name' => 'password',
 				'second_name' => 'confirm',
 				'type' => 'password',
 		));
	}
	
	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Kdde\EdbStoreBundle\Entity\User');
	}
	
	public function getName()
	{
		return 'user';
	}
	
}