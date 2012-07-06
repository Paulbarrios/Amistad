<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::parseExtensions('rss');
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/rss', array('controller' => 'pages', 'action' => 'rss'));
	Router::connect('/ensenanzas', array('controller' => 'pages', 'action' => 'lessons'));
	Router::connect('/pages/index', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/areas', array('controller' => 'pages', 'action' => 'display', 'areas'));
	Router::connect('/contacto', array('controller' => 'pages', 'action' => 'display', 'contacto'));
	Router::connect('/conocenos', array('controller' => 'pages', 'action' => 'display', 'historia'));
	Router::connect('/conocenos/nuestra_historia', array('controller' => 'pages', 'action' => 'display', 'historia'));
	Router::connect('/conocenos/nuestra_vision', array('controller' => 'pages', 'action' => 'display', 'vision'));
	Router::connect('/conocenos/valores_y_principios', array('controller' => 'pages', 'action' => 'display', 'valores'));
	Router::connect('/conocenos/legalidad', array('controller' => 'pages', 'action' => 'display', 'legalidad'));
	Router::connect('/pages/lessons', array('controller' => 'pages', 'action' => 'lessons'));
	Router::connect('/pages/lessons/*', array('controller' => 'pages', 'action' => 'lessons'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
