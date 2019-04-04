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
					<li><?php echo $this->Html->link(__('記事一覧'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規ユーザー作成'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row">
		<div class="posts form box">
			<?php echo $this->Form->create('Post', array('inputDefaults'=>array('div'=>'form-group','class'=>'form-control'),'type' => 'file', 'enctype' => 'multipart/form-data')); ?>
			<form>
				<legend><?php echo __('新規記事追加', array('type' => 'file')); ?></legend>
				<?php echo $this->Form->input('category_id', array('type'=>'select','options'=>$list)); ?>
				<?php echo $this->Form->input('title');?>
				<?php echo $this->Form->input('body');?>
				<?php
                echo $this->Form->input(
    'Attachment.0.photo',
    array(
                        'type'     => 'file',
                        'label'    => '',
                        'class'    => 'input-file mb-1',
                        'multiple' => true,
                        'id'       => '',
                    )
                    );
                ?>
				<?php echo $this->Form->input('Tag', array('type'=>'select','options'=>$tag,'multiple' => 'checkbox','size' => 5,'class'=>'checkbox')); ?>
				<div class="form-group">
					<?php echo $this->Form->submit(__('送信'), array('class'=>'btn btn-info btn-lg')); ?>
				</div>
			</form>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
