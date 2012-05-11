<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	public $components = array('RequestHandler');

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session', 'Amistad', 'Time', 'Text');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Image', 'Lesson');

	var $paginate = array( 'limit' => 10, 'order' => array('Lesson.date' => 'desc'));


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->pageName($path[0]);
		$this->render(implode('/', $path));
	}

	public function index(){
		$this->set('images', $this->Image->find('all', array('conditions' => array('active' => 1))));
		$this->pageName('index');
	}

	private function pageName($path=null){
		$this->set('pageActive',$path );
	}

	public function lessons(){
		$this->set('lessons', $this->paginate('Lesson'));
		$this->pageName('ensenanzas');
		//$this->set('lessons', $this->Lesson->find('all'));
	}

	public function rss(){
		
			$this->layout = 'xml'; 		
	        $lessons = $this->Lesson->find('all');
	        return $this->set(compact('lessons'));
	    
		
		$this->set('lessons', $this->Lesson->find('all'));
	}

}

