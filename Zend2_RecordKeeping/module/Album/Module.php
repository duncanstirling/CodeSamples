<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Album;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;


// added: Add these import statements:
use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Album\Factory\MyAdapterFactory;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
	public function getAutoloaderConfig()
	{
		return array(
				#'Zend\Loader\ClassMapAutoloader' => array(
				#	__DIR__ . '/autoload_classmap.php',
				#),
				'Zend\Loader\StandardAutoloader' => array(
					'namespaces' => array(
						__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
					),
				),
		);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	
	// added: Add this method:
	public function getServiceConfig()
	{
		return array(
				'factories' => array(
						#*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%
						#  MY OWN FACTORIES

						# adapter1 and adapter2 are from the global file 
						'myadapter1Factory'        
						 => new MyAdapterFactory('adapter1'),	
						 
						/*	                                 
						'myadapter2Factory'
						 => new MyAdapterFactory('adapter2'),	

						'myadapterTblLookUpFactory'
						 => new MyAdapterFactory('adapterTblLookUp'),
						 #*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%                 
						 # SYS LOGGER
						*/                 
						 'mySyslogger'
						 => function($sm) {
							$sysLogger = new MyLoggerModel();
							return $sysLogger;
						 },                 
						 #*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%*%				

						'Album\Model\AlbumTable' =>  function($sm) {
							$tableGateway = $sm->get('AlbumTableGateway');
							$table = new AlbumTable($tableGateway);
							return $table;
						},
						'AlbumTableGateway' => function ($sm) {
							#$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
							#$dbAdapter1 = $sm->get('adapter1');
							
							$dbAdapter1         = $sm->get('myadapter1Factory');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Album());
							return new TableGateway('album', $dbAdapter1, null, $resultSetPrototype);
						},
				),
		);
	}	
}