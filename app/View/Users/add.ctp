<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/addressSearch.js"></script>
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
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('グループリスト'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規グループ追加'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('記事一覧'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規記事追加'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row box">
		<div class="users form">
			<?php echo $this->Form->create('User',array('inputDefaults'=>array('class'=>'form-control'))); ?>
			<form>
				<legend><?php echo __('新規登録'); ?></legend>
				<div class="form-group">
					<?php echo $this->Form->input('username'); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password'); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('group_id'); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('address',array("id"=>"select_result")); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary btn-lg')); ?>
				</div>
			</form>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
