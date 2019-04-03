<div class="container">
	<!-- ヘッダー部分  ナビゲーションバー　-->
	<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarAction">
					<span class="sr-only">Action navigation</span><!-- 音声ブラウザ用 -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Group.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Group.id')))); ?></li>
					<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="groups form">
		<?php echo $this->Form->create('Group'); ?>
		<form>
			<legend><?php echo __('Edit Group'); ?></legend>
			<div class="form-group"><?php echo $this->Form->input('id'); ?></div>
			<div class="form-group"><?php echo $this->Form->input('name'); ?></div>
			<div class="form-group"><?php echo $this->Form->end(__('Submit')); ?></div>
		</form>
	</div>
</div>
