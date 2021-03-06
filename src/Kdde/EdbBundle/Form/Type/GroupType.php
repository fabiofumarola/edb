<?php
namespace Kdde\EdbBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GroupType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name','text');
		$builder->add('roleName','text');
	}
	
	public function getDefaultOptions(array $options)
	{
		return array(
				'data_class' => 'Kdde\EdbStoreBundle\Entity\Group',
		);
	}
	
	public function getName()
	{
		return 'group';
	}

}
