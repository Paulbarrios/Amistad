<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 */
class Image extends AppModel {

	var $name = 'Image';
  var $actsAs = array(
	    'MeioUpload' => array(
			  'image' => array(
					    'dir'              => 'files{DS}images{DS}',
					    'create_directory' => true,
					    'allowed_mime'     => array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png'),
					    'allowed_ext' 		 => array('.jpg', '.jpeg', '.png', '.gif'),
					    'max_size'         => '1000 Kb',
					    //'max_dimension' => 'width',
					    'thumbnailQuality' => 85,
					    'thumbsizes' => array(
						    'max' => array('width' => 595, 'height' => 290),
					    )
		    ),
 ));
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
}
