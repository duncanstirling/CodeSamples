<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

 return array(    
#############
     'service_manager' => array(
     		'factories' => array(
     				'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
     		),
     ),
     'translator' => array(
 		'locale' => 'en_US',
 		'translation_file_patterns' => array(
			array(
				'type'     => 'gettext',
				'base_dir' => __DIR__ . '/../language',
				'pattern'  => '%s.mo',
			),
 		),
     ),     
#############
     'controllers' => array(
         'invokables' => array(
             'Album\Controller\Album'                => 'Album\Controller\AlbumController',
             'Album\Controller\Index'                => 'Album\Controller\IndexController',                                            
         ),
     ),     
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@     
     // The following section is new and should be added to your file
     'router' => array(
 		'routes' => array(
            #=========================
            'home' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'index',
            				),
            		),
            ), 		
            #=========================
            'index' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/index',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'index',
            				),
            		),
            ), 	
            #=========================
            'index/add' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/add',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'add',
            				),
            		),
            ), 				
            #=========================		
			/*'add' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/index[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Album\Controller\Index',
						'action'     => 'add',
					),				
				),
			),

			
            'add' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/index/add',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'add',
            				),
            		),
            ), 	*/
            #=========================
            'edit' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/edit',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'edit',
            				),
            		),
            ), 		
            #=========================
            'delete' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/delete',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'delete',
            				),
            		),
            ), 	
            #=========================
            'newsextra' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/newsextra',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'newsextra',
            				),
            		),
            ),			
            #=========================
            'classifieds' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/classifieds',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'classifieds',
            				),
            		),
            ), 			
            #=========================
            'chat' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/chat',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'chat',
            				),
            		),
            ), 		
            #=========================
            'events' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/events',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'events',
            				),
            		),
            ), 		
            #=========================
            'frenchintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/frenchintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'frenchintro',
            				),
            		),
            ), 	
            #=========================
            'germanintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/germanintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'germanintro',
            				),
            		),
            ),			
            #=========================
            'arabicintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/arabicintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'arabicintro',
            				),
            		),
            ), 		
            #=========================
            'chineseintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/chineseintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'chineseintro',
            				),
            		),
            ), 	
            #=========================
            'japaneseintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/japaneseintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'japaneseintro',
            				),
            		),
            ), 		
            #=========================
            'portugueseintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/portugueseintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'portugueseintro',
            				),
            		),
            ), 
            #=========================
            'koreanintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/koreanintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'koreanintro',
            				),
            		),
            ), 		
            #=========================
            'spanishintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/spanishintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'spanishintro',
            				),
            		),
            ), 	
            #=========================
            'russianintro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/russianintro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'russianintro',
            				),
            		),
            ), 				
            #=========================
            'yorkshiresingles' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/yorkshiresingles',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'yorkshiresingles',
            				),
            		),
            ), 			
            #=========================
            'londonsingles' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/londonsingles',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'londonsingles',
            				),
            		),
            ), 		
            #=========================
            'icelandicsingles' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/icelandicsingles',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'icelandicsingles',
            				),
            		),
            ), 	
            #=========================
            'russiansingles' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/russiansingles',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'russiansingles',
            				),
            		),
            ), 	
            #=========================
            'americansingles' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/americansingles',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'americansingles',
            				),
            		),
            ), 					
            #=========================
            'germansingles' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/germansingles',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'germansingles',
            				),
            		),
            ), 				
            #=========================			
            'advice' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/advice',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'advice',
            				),
            		),
            ), 				
            #=========================
            'memberships' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/memberships',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'memberships',
            				),
            		),
            ),
            #=========================
            'network' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/network',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'network',
            				),
            		),
            ), 			
			#=========================
            'login' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/login',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'login',
            				),
            		),
            ), 
			#=========================
            'premium' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/premium',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'premium',
            				),
            		),
            ), 	
			#=========================
            'intro' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/intro',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'intro',
            				),
            		),
            ),			
			#=========================
            'cookiepolicy' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/cookiepolicy',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'cookiepolicy',
            				),
            		),
            ), 	
			#=========================
            'termsandconditions' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/termsandconditions',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'termsandconditions',
            				),
            		),
            ), 				
			
			#=========================
            'contact' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/contact',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'contact',
            				),
            		),
            ), 							
			#=========================
            'questions' => array(
            		'type' => 'Zend\Mvc\Router\Http\Literal',
            		'options' => array(
            				'route'    => '/questions',
            				'defaults' => array(
            						'controller' => 'Album\Controller\Index',
            						'action'     => 'questions',
            				),
            		),
            ), 
            #=========================
			'album' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/album[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Album\Controller\Album',
						'action'     => 'index',
					),				
				),
			),
			#=========================
			'index' => array(
					'type'    => 'segment',
					'options' => array(
							'route'    => '/index[/:action][/:id]',
							'constraints' => array(
									'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
									'id'     => '[0-9]+',
							),
							'defaults' => array(
									'controller' => 'Album\Controller\Index',
									'action'     => 'index',
							),
					),
			),	
			########################################
			'indextest1'       => array(
    			'type'         => 'Segment',
    			'options'      => array(
                                    'route'    => '/indextest1/start',
                                    'defaults' => array(
                                        			#'__NAMESPACE__' => 'Album\Controller',
                                        			#'controller'    => 'Album',                                    			
                                        			'controller' => 'Album\Controller\Indextest1',
                                        			'action'     => 'start',
                                    			 ),
    			                   ),
    			'may_terminate' => true,
    			'child_routes'  => array(
    			'default'       => array(
                        			'type'    => 'Wildcard',
                        			'options' => array(
                                        			'key_value_delimiter' => '/',
                                        			'param_delimiter'     => '/'
                                                 )
			                      ),
    			),
			),
			########################################
			'indextest2'       => array(
				'type'         => 'Segment',
				'options'      => array(
									'route'    => '/indextest2/index',
									'defaults' => array(
														#'__NAMESPACE__' => 'Album\Controller',
														#'controller'    => 'Album',
														'controller' => 'Album\Controller\Indextest2',
														'action'     => 'index',
													),
									),
				'may_terminate' => true,
				'child_routes'  => array(
				'default'       => array(
									'type'    => 'Wildcard',
									'options' => array(
												'key_value_delimiter' => '/',
												'param_delimiter'     => '/'
												)
									),
				),
			),
			########################################			
			'indexififoprocessing' => array(
					'type'         => 'Segment',
					'options'      => array(
							#'route'    => '/indexififoprocessing/start',# fixme	
							'route'   => '/indexififoprocessing/testing',						
							'defaults' => array(
									#'__NAMESPACE__' => 'Album\Controller',
									#'controller'    => 'Album',
									'controller' => 'Album\Controller\indexififoprocessing',
									#'action'    => 'start',		# fixme	
									'action'     => 'testing',						
							),
					),
					'may_terminate' => true,
					'child_routes'  => array(
							'default' => array(
									'type'    => 'Wildcard',
									'options' => array(
											'key_value_delimiter' => '/',
											'param_delimiter'     => '/'
									)
							),
					),
			),
			#####################################			
			
			#=========================
			'dashboard' => array(
					'type'    => 'segment',
					'options' => array(
							'route'    => '/dashboard[/:action][/:id]',
							'constraints' => array(
									'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
									'id'     => '[0-9]+',
							),
							'defaults' => array(
									'controller' => 'Album\Controller\Dashboard',
									'action'     => 'index',
							),
					),
			),	
			#=========================
			'index2' => array(
    			'type'    => 'segment',
        			'options' => array(
            			'route'    => '/index2[/:action][/:id]',
            			'constraints' => array(
            			'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            			'id'     => '[0-9]+',
        			),
            			'defaults' => array(
            			'controller' => 'Album\Controller\Index2',
            			'action'     => 'index',
        			),
    			),
			),
			#=========================	
			'recordhistory' => array(
					'type'    => 'segment',
					'options' => array(
							'route'    => '/recordhistory[/:action][/:id]',
							'constraints' => array(
									'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
									'id'     => '[0-9]+',
							),
							'defaults' => array(
									'controller' => 'Album\Controller\Recordhistory',
									'action'     => 'index',
							),
					),
			),		
			#=========================
			'powerhistory' => array(
					'type'    => 'segment',
					'options' => array(
							'route'    => '/powerhistory[/:action][/:id]',
							'constraints' => array(
									'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
									'id'     => '[0-9]+',
							),
							'defaults' => array(
									'controller' => 'Album\Controller\Powerhistory',
									'action'     => 'index',
							),
					),
			),		
			#=========================		
			'bootload' => array(
					'type'    => 'segment',
					'options' => array(
							'route'    => '/bootload[/:action][/:id]',
							'constraints' => array(
									'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
									'id'     => '[0-9]+',
							),
							'defaults' => array(
									'controller' => 'Album\Controller\Bootload',
									'action'     => 'index',
							),
					),
			),		
			#=========================		
			'settings' => array(
				'type'    => 'segment',
				'options' => array(
    				'route'    => '/settings[/:action][/:id]',
    				'constraints' => array(
    						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
    						'id'     => '[0-9]+',
    				),
    				'defaults' => array(
    						'controller' => 'Album\Controller\Settings',
    						'action'     => 'index',
    				),
				),
			),		
			#=========================		
			'help' => array(
    			'type'    => 'segment',
    			'options' => array(
        			'route'    => '/help[/:action][/:id]',
        			'constraints' => array(
        			'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        			'id'     => '[0-9]+',
        			),
        			'defaults' => array(
        			'controller' => 'Album\Controller\Help',
        			'action'     => 'index',
        			),
    			),
			),
			#=========================										
 		),
     ),     
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ 
     'console' => array(
 		'router' => array(
			'routes' => array(

				# Sample Route 
				'do-cli' => array(
					'options' => array(
					   #'route'    => 'do cli [--verbose|-v] <userEmail>',
						'route'    => 'do cli [--verbose|-v]',
						'defaults' => array(
							'controller' => 'Album\Controller\indexififoprocessing',
							'action'     => 'start',     
							'userEmail'	=> 'defaultxxxx'											
						),
					),
				),
			),
 		),
     ),     
#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@     

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
 );