<div class="container">
	<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarAction">
					<span class="sr-only">Action navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Form->postLink(__('記事の削除'), array('action' => 'delete', $this->Form->value('Post.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Post.id')))); ?></li>
					<li><?php echo $this->Html->link(__('記事一覧'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row box">
		<div class="posts form">
			<?php echo $this->Form->create('Post',array('inputDefaults'=>array('div'=>'form-group','class'=>'form-control'),'type' => 'file', 'enctype' => 'multipart/form-data')); ?>
			<form>
				<legend><?php echo __('記事の編集'); ?></legend>
				<div class="form-group"><?php echo $this->Form->input('id'); ?></div>
				<div class="form-group"><?php echo $this->Form->input('title'); ?></div>
				<div class="form-group"><?php echo $this->Form->input('body');?></div>
				<?php
				echo $this->Form->input('Attachment.0.photo',
				array(
					'type'     => 'file',
					'label'    => '',
					'class'    => 'input-file mb-1',
					'multiple' => true,
					'id'       => '',
				));
				?>
				<?php
				for($i = 0; $i < count($attachment); $i++){
					if(!$attachment[$i]['deleted'] && !empty($attachment[$i]['photo'])){
						echo '<div class="w-50 p-2 bg-white border">';
						echo $this->Html->image('/files/attachment/photo/'.$attachment[$i]['dir'].DS.$attachment[$i]['photo'],array(
							'id'=>'thumbnail'.$attachment[$i]['dir'],
							'class'   => 'd-block img-fluid'
						));
						echo 'この画像を削除する</label><input type="checkbox" name="data[Post][Attachment][]" class="d-none checkbox-or" value="';
						echo $attachment[$i]['id'].'"id="';
						echo 'attachment'.$attachment[$i]['id'].'">';
						echo '<span class="checkbox-or__text text-danger ml-2 bg-sakura py-2 px-5">この画像は削除されます</span>';
						echo '</div>';
						echo '</div>';
					}
				}
				?>
				<div class="form-group"><?php echo $this->Form->end(__('送信')); ?></div>
			</form>
		</div>
	</div>
</div>
