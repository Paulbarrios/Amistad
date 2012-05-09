<div class="lessons index">
	<h2><?php echo __('Lessons');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('author');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($lessons as $lesson): ?>
	<tr>
		<td><?php echo h($lesson['Lesson']['id']); ?>&nbsp;</td>
		<td><?php echo h($lesson['Lesson']['title']); ?>&nbsp;</td>
		<td><?php echo h($lesson['Lesson']['author']); ?>&nbsp;</td>
		<td><?php echo h($lesson['Lesson']['date']); ?>&nbsp;</td>
		<td><?php echo h($lesson['Lesson']['url']); ?>&nbsp;</td>
		<td><?php echo h($lesson['Lesson']['video']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'viewLesson', $lesson['Lesson']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'editLesson', $lesson['Lesson']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteLesson', $lesson['Lesson']['id']), null, __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Lesson'), array('action' => 'addLesson')); ?></li>
		<li><?php echo $this->Html->link(__('Inicio'), array('action' => 'index')); ?></li>
	</ul>
</div>
