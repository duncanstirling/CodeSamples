<?php
namespace Pelican\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class YourFactory implements FactoryInterface
{

	protected $configKey;
	private $serviceLocator; # fixme do I need this ?

	public function __construct($key)
	{
		$this->configKey = $key;
	}

	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$config = $serviceLocator->get('Config');
		return new Adapter($config[$this->configKey]);
	}
}

/*
'Pelican\Model\AlbumTable' =>  function($sm) {
	$tableGateway = $sm->get('AlbumTableGateway');
	$table = new AlbumTable($tableGateway);
	return $table;
},
'AlbumTableGateway' => function ($sm) {
	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
	$resultSetPrototype = new ResultSet();
	$resultSetPrototype->setArrayObjectPrototype(new Album());
	return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
},
*/