<?php

namespace Kdde\EdbBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Kdde\EdbStoreBundle\Entity;

class IcvrType extends AbstractType{
	
	public function buildForm(FormBuilder $builder, array $options){
		
		$builder->add('corpus','text');
		$builder->add('volume','text');
	}
	
	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Kdde\EdbStoreBundle\Entity\Icvr');
	}
	
	public function getName()
	{
		return 'icvr';
	}
	
}