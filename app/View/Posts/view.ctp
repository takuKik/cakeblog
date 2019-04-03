<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/upload.js"></script>

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
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('記事編集'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('記事削除'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('消去してもよろしいですか # %s?', $post['Post']['id']))); ?> </li>
					<li><?php echo $this->Html->link(__('記事一覧'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規記事作成'), array('action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('新規登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('記事一覧'), array('action' => 'index')); ?></li>            
            <li class="breadcrumb-item active" aria-current="page"><?php echo h($post['Post']['id']); ?></li>
        </ol>
    </nav>
	<div class="row">
		<div class="col-md-12" id="title">
			<div class="box">
				<h1>
					<?php echo __('記事内容'); ?><br>
				</h1>
			</div>
		</div>
	</div>
	<div class="posts view">
		<dl>
			<dt><?php echo __('記事番号'); ?></dt>
			<dd>
				<?php echo h($post['Post']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('書いたやつ'); ?></dt>
			<dd>
				<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('ブログタイトル'); ?></dt>
			<dd>
				<?php echo h($post['Post']['title']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('内容'); ?></dt>
			<dd>
				<?php echo h($post['Post']['body']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('作成日'); ?></dt>
			<dd>
				<?php echo h($post['Post']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('更新日'); ?></dt>
			<dd>
				<?php echo h($post['Post']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('ブログ画像'); ?></dt>
			<?php
            $attachment = $post['Attachment'];
            for ($i = 0; $i < count($attachment); $i++) {
                if (!empty($attachment[$i]['photo'])) {
                    echo '画像'.$attachment[$i]['dir'].''; ?>
					<div id="back-curtain"></div>
					<div class="img">
						<?php echo $this->Html->image('/files/attachment/photo/'.$attachment[$i]['dir'].DS.$attachment[$i]['photo']); ?>
						<div class="largeImg">
							<?php echo $this->Html->image('/files/attachment/photo/'.$attachment[$i]['dir'].DS.$attachment[$i]['photo'], array('width'=>'400', 'height'=>'400')); ?>
						</div>
					</div>
				<?php
                } ?>
			<?php
            } ?>
			<div class="users index">
				<div id="back-curtain"></div>
				<div class="img" id="red">
					<?php echo $this->Html->image('/files/image/neko.jpg'); ?>
					<div class="largeImg" id="largeRed">
						<?php echo $this->Html->image('/files/image/neko.jpg', array('width'=>'600', 'height'=>'400')); ?>
					</div>
				</div>
				<div class="img" id="orange">
					<?php echo $this->Html->image('/files/image/inu.jpg'); ?>
					<div class="largeImg" id="largeOrange">
						<?php echo $this->Html->image('/files/image/inu.jpg', array('width'=>'600', 'height'=>'400')); ?>
					</div>
				</div>
				<div class="img" id="yellow">
					<?php echo $this->Html->image('/files/image/neko2.jpg'); ?>
					<div class="largeImg" id="largeYellow">
						<?php echo $this->Html->image('/files/image/neko2.jpg', array('width'=>'600', 'height'=>'400')); ?>
					</div>
				</div>
				<div id="buttonR">
					<button type="button">></button>
				</div>
				<div id="buttonL">
					<button type="button"><</button>
				</div>
			</div>
		</div>
