<?php
namespace Kdde\EdbStoreBundle\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
* My custom datatype.
*/
class GeoPoint extends Type
{
    const GEOPOINT = 'geopoint'; // type name

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'POINT';
    }

    // <LAT>,<LNG>
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
    	if(!$value) return NULL;
    	$value = substr($value,1,strlen($value)-2); // remove leading and trailing '()'
    	return $value;
    }

    // (<LAT>,<LNG>)
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
		if(!$value) return NULL;
    	$dbval = '%s'; // add '()' for Db
        $value = sprintf($dbval, $value);
        return $value;
    }

    public function getName()
    {
        return self::GEOPOINT;
    }
}
