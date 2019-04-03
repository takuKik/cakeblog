<?php
App::uses('AppModel', 'Model');
/**
 * PostsTag Model
 *
 * @property Post $Post
 * @property Tag $Tag
 */
class PostsTag extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'post_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'tag_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
