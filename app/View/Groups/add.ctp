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
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="groups form">
		<?php echo $this->Form->create('Group',array('inputDefaults'=>array('class'=>'form-control'))); ?>
		<form>
			<legend><?php echo __('Add Group'); ?></legend>
			<div class="form-group"><?php echo $this->Form->input('name');?></div>
			<div class="form-group"><?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary btn-lg')); ?></div>
		</form>
	<?php echo $this->Form->end(); ?>
</div>
</div>
