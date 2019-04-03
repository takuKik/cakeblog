<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Postal Code');?></h2>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Jiscode'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['jiscode']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Zipcode'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['zipcode']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('State'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['state']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('City'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['city']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Street'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['street']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Changed'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['changed']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Cause'); ?></dt>
			<dd>
				<?php echo h($postalCode['PostalCode']['cause']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Postal Code')), array('action' => 'edit', $postalCode['PostalCode']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Postal Code')), array('action' => 'delete', $postalCode['PostalCode']['id']), null, __('Are you sure you want to delete # %s?', $postalCode['PostalCode']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Postal Codes')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Postal Code')), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

