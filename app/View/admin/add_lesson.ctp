<div class="lessons form">
<?php echo $this->Form->create('Lesson', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
		<legend><?php echo __('Add Lesson'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('author');
		echo $this->Form->input('date');
		echo $this->Form->input('mp3',array('type'=> 'file' ));
		echo $this->Form->input('video');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Lessons'), array('action' => 'indexLesson'));?></li>
	</ul>
</div>
