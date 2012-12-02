<?php

namespace Kdde\EdbStoreBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Types\Type;

class KddeEdbStoreBundle extends Bundle {
	
	/**
	 * add the geopoint
	 */
	public function boot() {
		Type::addType('geopoint', 'Kdde\EdbStoreBundle\Types\GeoPoint');
		$em = $this->container->get('doctrine.orm.default_entity_manager');
		$conn = $em->getConnection();
		$conn->getDatabasePlatform()->registerDoctrineTypeMapping('GEOPOINT', 'geopoint');
	}
}
