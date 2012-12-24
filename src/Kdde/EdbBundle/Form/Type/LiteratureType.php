<?php

namespace Kdde\EdbBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Kdde\EdbStoreBundle\Entity;

class LiteratureType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('id', 'text');
		$builder->add('description', 'textarea');
		$builder->add('note', 'textarea');
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Kdde\EdbStoreBundle\Entity\Literature');
	}

	public function getName() {
		return 'literature';
	}

}
