<div class="row">
	<div class="three columns offset-by-five">
		<div class="images form">
		<?php echo $this->Form->create('Image');?>
			<fieldset>
				<legend><?php echo __('Edit Image'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title');
				echo $this->Form->input('image');
				echo $this->Form->input('link');
				echo $this->Form->input('active', array('options' => array(0,1)));
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit'));?>
		</div>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul>
		
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteImage', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Images'), array('action' => 'indexImage'));?></li>
			</ul>
		</div>
	</div>
</div>
