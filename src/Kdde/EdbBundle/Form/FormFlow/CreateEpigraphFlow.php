<?php
namespace Kdde\EdbBundle\Form\FormFlow;

use Craue\FormFlowBundle\Form\FormFlow;

class CreateEpigraphFlow {

	protected $maxSteps = 4;
	
	
	protected function loadStepDescriptions() {
		return array(
				'Account',
				'Password',
				'Terms of service',
		);
	}
}
