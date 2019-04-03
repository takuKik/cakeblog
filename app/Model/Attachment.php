<?php
App::uses('AppModel','Model');
class Attachment extends AppModel{
	public $actsAs = array(
		'Upload.Upload'=>array(
			'photo'=>array(
				'fields'=>array(
					'dir'=>'dir',
				),
			),
			'thumbnailSizes'=>array(
				'xvga'=>'1024x768',
				'vga'=>'640x480',
				'thumb'=>'80x80',
			),
			'maxsize'=>209715200,
		)
	);

	public $belongsTo = array(
		'Post'=>array(
			'className'=>'Post',
			'foreignKey'=>'post_id',
		)
	);
}
