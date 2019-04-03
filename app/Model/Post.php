<?php
App::uses('AppModel', 'Model');
/**
* Post Model
*
* @property User $User
*/
class Post extends AppModel {

	/**
	* belongsTo associations
	*
	* @var array
	*/
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category'
	);

	public $hasMany = array(
        'Attachment'=>array(
            'className'             =>'Attachment',
            'foreignKey'            =>'post_id',
            'dependent'             => true
        )
    );

	public $hasAndBelongsToMany = array(
		'Tag' =>
		array(
			'className'              => 'Tag',
			'joinTable'              => 'posts_tags',
			'foreignKey'             => 'post_id',
			'associationForeignKey'  => 'tag_id',
			'unique'                 => true,
			'with'            => 'PostsTag',
		)
	);
	public $actsAs = array('Search.Searchable');
	public $filterArgs = array(
		'title' => array('type' => 'like'),
		'categoryname' => array('type' => 'like','field' => 'Category.name'),
		'tagname' => array('type' => 'subquery', 'method' => 'findByTags', 'field' => 'Post.id'),
	);
	/**
	* Validation rules
	*
	* @var array
	*/
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	public function findByTags($data = array()) {
		$this->PostsTag->Behaviors->attach('Containable', array('autoFields' => false));
		$this->PostsTag->Behaviors->attach('Search.Searchable');
		$query = $this->PostsTag->getQuery('all',array(
			'conditions' => array(
				'Tag.name' => $data['tagname']
			),
			'fields' => array('post_id'),
			'contain' => array('Tag')
		));
		return $query;
	}

	function AndSearchTag($data = array()) {
		$tag_num = count($data['tagname']);
		$options = array(
			'conditions'=> array('Tag.name' => $data['tagname']),
			'fields'=> 'PostsTag.post_id',
			'group' => array('Post.id'),
			'having' => array('COUNT(Post.id) >=' => $tag_num)
		);
		$posts_tags = $this->PostsTag->find('all',$options);
		$test = $this->getDataSource()->getLog();
		$conditions = array('Post.id' => array());
		foreach($posts_tags as $postid){
			$condition = array('Post.id' => $postid['PostsTag']['post_id']);
			array_push($conditions['Post.id'], $condition['Post.id']);
		}
		return $conditions;
	}

	public function searchTagId($post = array()){
		$conditions = array();
		if(isset($post['tag'])){
			$tagIds = count($post['tag']);
			$posts_tags_conditions = array();
			foreach($post['tag'] as $search){
				$posts_tags_conditions['PostsTag.tag_id'][] = $search;
			}
			$group = array("PostsTag.post_id having count(PostsTag.tag_id) = " . $tagIds);
			if(!empty($posts_tags_conditions)){
				$PostsTagItems = $this->PostsTag->find('all', array('conditions' => $posts_tags_conditions));
				$PostsTagItems = $this->PostsTag->find('all', array(
					'conditions' => $posts_tags_conditions,
					'group' => $group,
				)
			);
			foreach($PostsTagItems as $PostsTagItem){
				$post_ids[] = $PostsTagItem['PostsTag']['post_id'];
				$conditions = array('Post.id' => $post_ids);
			}
		}
	}
	return $conditions;
}
}
