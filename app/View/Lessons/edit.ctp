<div class="lessons form">
<?php echo $this->Form->create('Lesson');?>
	<fieldset>
		<legend><?php echo __('Edit Lesson'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('author');
		echo $this->Form->input('date');
		echo $this->Form->input('url');
		echo $this->Form->input('video');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Lesson.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Lesson.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('action' => 'index'));?></li>
	</ul>
</div>
