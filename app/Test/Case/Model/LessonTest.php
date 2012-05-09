<?php
App::uses('Lesson', 'Model');

/**
 * Lesson Test Case
 *
 */
class LessonTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.lesson');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lesson = ClassRegistry::init('Lesson');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lesson);

		parent::tearDown();
	}

}
