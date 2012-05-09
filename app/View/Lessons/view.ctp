<div class="lessons view">
<h2><?php  echo __('Lesson');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lesson['Lesson']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($lesson['Lesson']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo h($lesson['Lesson']['author']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($lesson['Lesson']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($lesson['Lesson']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo h($lesson['Lesson']['video']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lesson'), array('action' => 'edit', $lesson['Lesson']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lesson'), array('action' => 'delete', $lesson['Lesson']['id']), null, __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lesson'), array('action' => 'add')); ?> </li>
	</ul>
</div>
