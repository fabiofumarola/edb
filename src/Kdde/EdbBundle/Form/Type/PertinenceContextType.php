<?php

namespace Kdde\EdbBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Kdde\EdbStoreBundle\Entity;

class PertinenceContextType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {

		//$builder->add('area', 'entity', array('class' => 'KddeEdbStoreBundle:PertinenceArea', 'property' => 'description'));
		$builder->add('id', 'hidden');
		$builder->add('description', 'text');
		$builder->add('area', 'hidden', array('property_path' => false));
// 		$builder->add('area', 'hidden');
		$builder->add('geoposition', 'text');

	}

	public function getDefaultOptions(array $options) {
		return array(
				'data_class' => 'Kdde\EdbStoreBundle\Entity\PertinenceContext');
	}

	public function getName() {
		return 'Original_Context';//if you change this name change also the names in the js pertinenceContext.js
	}

}
