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
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('ユーザー編集'), array('action' => 'edit', $user['User']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('ユーザー削除'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
					<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規ユーザー登録'), array('action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('グループリスト'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規グループ追加'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('記事一覧'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規記事作成'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row">
		<div class="col-md-12" id="title">
			<div class="box">
				<h1>
					<?php echo __('ユーザー'); ?><br>
				</h1>
			</div>
		</div>
	</div>
	<div class="users view">
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($user['User']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Username'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Password'); ?></dt>
			<dd>
				<?php echo h($user['User']['password']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Group'); ?></dt>
			<dd>
				<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Created'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modified'); ?></dt>
			<dd>
				<?php echo h($user['User']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="related">
		<h3><?php echo __('この人の記事'); ?></h3>
		<?php if (!empty($user['Post'])): ?>
			<table class="table" cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('User Id'); ?></th>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Body'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($user['Post'] as $post): ?>
					<tr>
						<td><?php echo $post['id']; ?></td>
						<td><?php echo $post['user_id']; ?></td>
						<td><?php echo $post['title']; ?></td>
						<td><?php echo $post['body']; ?></td>
						<td><?php echo $post['created']; ?></td>
						<td><?php echo $post['modified']; ?></td>
						<td class="actions">
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?></button>
								<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?></button>
								<button type="button" class="btn btn-default"><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array('confirm' => __('Are you sure you want to delete # %s?', $post['id']))); ?></button>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</div>
	</div>
