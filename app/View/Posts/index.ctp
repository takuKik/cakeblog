<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/searchpost.js"></script>
<div class="container">
	<nav class="navbar navbar-custom navbar-fixed-top">
		<div class="row">
			<div class="collapse navbar-collapse" id="navbarAction">
				<ul class="nav navbar-nav">
					<li><?php echo $this->Html->link(__('記事を投稿'), array('action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' => 'users', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?></li>
					<li><?php echo $this->Html->link(__('CSV'), array('controller' => 'zipcodes', 'action' => 'index')); ?></li>
				</ul>
				<button type="button" class="btn btn-default navbar-btn navbar-right" id="search">記事検索</button>
			</div>
			<div class="search">
				<div class="form-inline">
					<?php echo $this->Form->create('Post', array(
                        'url' =>  array_merge(
                            array('action' => 'index'),
                            $this->params['pass']
                        ),'inputDefaults'=>array('class'=>'form-control'),
                        'novalidate' => true
                    )); ?>
					<div class="form-group">
						<?php echo $this->Form->label('タイトル'); ?>
						<?php echo $this->Form->text('title', array("placeholder"=>"検索")); ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('categoryname', array('type'=>'select','options'=>$list,'label'=>'カテゴリー ','empty'=>'','selected'=>'')); ?>
						<!--	<?php print var_export($list, true); ?>
						<?php echo $this->Form->label('Category'); ?>
						<?php echo $this->Form->text('categoryname'); ?> -->
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('tagname', array('type'=>'select','options'=>$tags,'label'=>'Tag','empty'=>'','selected'=>'')); ?>
						<!--		<?php echo $this->Form->label('tag'); ?>
						<?php echo $this->Form->text('tagname'); ?> -->
					</div>
					<div class="form-group" id="searchbn">
						<?php echo $this->Form->submit(__('検索', true), array('div' => false)); ?>
					</div>
					<?php echo $this->Form->end();?>
				</div>
			</div>
		</div>
	</nav>
	<div class="row">
		<div class="col-md-12" id="title">
			<h1>
				<?php echo __('TOP STORIES'); ?><br>
			</h1>
        </div>
            <?php foreach ($posts as $key => $post): ?>
            <!-- 画像部分 -->
                <div class="card m-1 shadow-sm" style="box-sizing:border-box; width:24.2%;">
                    <?php echo '<img src="' ?>
                    <?php echo 'https://picsum.photos/300/200?random&dammy='.$key; ?>
                    <?php echo '"alt="" class="card-img-top" >' ?>

                    <div class="card-body">
                    <!-- タイトル部分 -->
					<h5 class="text-truncate font-weight-bold card-title">
                    <?php echo $this->Html->link(
                        $post['Post']['title'],
                        array(
                        'action' => 'view', $post['Post']['id']
                        ),
                        array(
                        'class'  => 'stretched-link card-title',
                    )
                    );
                    ?>
                    </h5>

                    <!-- カテゴリー -->
                    <span class="d-block">
                        <?php echo h($post['Category']['name']); ?>
                    </span><br>

                    <!-- 日にち -->
                    <span class="d-block text-muted">
                        <i class="far fa-calendar-alt"></i>
                        <?php
                            $explode = explode(" ", $post['Post']['created']);
                            $split   = explode("-", $explode[0]);
                            $year    = $split[0];
                            $month   = $split[1];
                            $day    = $split[2];
                        ?>
                        <?php echo $year; ?>年
                        <?php echo $month; ?>月
                        <?php echo $day; ?>日<br>
                    </span>

					<!-- タグ -->
                    <span class="d-block">
                        <i class="fas fa-tag text-muted"></i>
                        <?php foreach ($post['Tag'] as $tag): ?>
                            <span class="badge badge-secondary">
                                <?php echo h($tag['name']."\n"); ?>
                            </span>
                        <?php endforeach; ?>
                    </span>

					<p><?php echo h("記事内容: ".$post['Post']['body']); ?></p>
					<p class="actions">
							<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('内容'), array('action' => 'view', $post['Post']['id'])); ?></button>
							<button type="button" class="btn btn-default"><?php echo $this->Html->link(__('編集'), array('action' => 'edit', $post['Post']['id'])); ?></button>
							<button type="button" class="btn btn-default"><?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $post['Post']['id']), array('confirm' => __('消去してもよろしいですか %s?', $post['Post']['id']))); ?></button>
					</p>
                    </div>
                </div>
			<?php endforeach; ?>
				<div class="btn-toolbar">
					<button class="btn square_btn"><?php echo $this->Paginator->prev('< ' . __('前のページへ'), array(), null, array('class' => 'prev disabled')); ?></button>
					<button class="btn square_btn"><?php echo $this->Paginator->next(__('次のページへ') . ' >', array(), null, array('class' => 'next disabled')); ?></button>
				</div>
		</div>
	</div>
