<?php echo $this->Form->create('User', array('type' => 'file')); ?>
<?php echo $this->Form->input('User.username'); ?>
<?php echo $this->Form->input('Attachment.0.photo', array('type' => 'file')); ?>
<?php echo $this->Form->submit('Send');?>
<?php echo $this->Form->end(); ?>
