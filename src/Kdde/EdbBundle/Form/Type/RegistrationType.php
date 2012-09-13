<?php

namespace Kdde\EdbBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegistrationType extends AbstractType {
	
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('user', new UserType(), array('label' => ' '));
		$builder->add('terms', 'checkbox', array('property_path' => 'termsAccepted'));
	}
	
	public function getName()
	{
		return 'registration';
	}
	
}