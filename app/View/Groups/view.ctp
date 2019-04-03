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
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $group['Group']['id']))); ?> </li>
					<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>

<div class="row">
                <div class="col-md-12" id="title">
                        <div class="box">
                                <h1>
                                        <?php echo __('Group'); ?><br>
                                </h1>
                        </div>
                </div>
</div>
	<div class="groups view">
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
			</dd>
		</dl>
	</div>
	<div class="related">
		<h3><?php echo __('Related Users'); ?></h3>
		<?php if (!empty($group['User'])): ?>
		<table class="table" cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Username'); ?></th>
				<th><?php echo __('Password'); ?></th>
				<th><?php echo __('Group Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($group['User'] as $user): ?>
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['password']; ?></td>
				<td><?php echo $user['group_id']; ?></td>
				<td><?php echo $user['created']; ?></td>
				<td><?php echo $user['modified']; ?></td>
				<td class="actions">
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?></button>
						<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?></button>
						<button type="button" class="btn btn-default"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?></button>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

			</div>
</div>