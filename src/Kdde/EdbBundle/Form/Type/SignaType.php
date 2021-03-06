<?php

namespace Kdde\EdbBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Kdde\EdbStoreBundle\Entity;

class SignaType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {

		$builder->add('id', 'text');
		$builder->add('description', 'textarea');
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Kdde\EdbStoreBundle\Entity\Signa');
	}

	public function getName() {
		return 'signa';
	}

}
