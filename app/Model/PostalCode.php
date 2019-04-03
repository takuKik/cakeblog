<?php
App::uses('AppModel', 'Model');
/**
* PostalCode Model
*
*/
class PostalCode extends AppModel {
	/**
	* Validation rules
	*
	* @var array
	*/
	public $validate = array(
		'jiscode' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'zipcode' => array(
			'decimal' => array(
				'rule' => array('decimal'),
			),
		),
		'state' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'city' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'street' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'changed' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'cause' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);
}
