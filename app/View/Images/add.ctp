<?php e($form->create(null, array('type'=>'file', 'action'=>'add')));?>
<?php e($session->flash());?>
<?php e($form->file('image'));?>
<?php e($form->submit('画像を追加'));?>
<?php e($form->end());?>

<h2>追加した画像</h2>
<ul>
<?php foreach ($images as $image) { ?>
    <li><?php e($html->link("/images/contents/{$image['Image']['filename']}"));?></li>
<?php } ?>
</ul>
