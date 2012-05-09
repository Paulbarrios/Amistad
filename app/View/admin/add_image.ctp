<div class="row">
	<div class="three columns offset-by-five">
		<div class="images form">
		<?php echo $this->Form->create('Image' , array('enctype'=>'multipart/form-data'));?>
			<fieldset>
				<legend><?php echo __('Add Image'); ?></legend>
			<?php
				echo $this->Form->input('title');
				echo $this->Form->input('image', array('type'=>'file'));
				echo $this->Form->input('link');
				echo $this->Form->input('active', array('options' => array(0,1)));
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit'));?>
		</div>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul>
		
				<li><?php echo $this->Html->link(__('List Images'), array('action' => 'indexImage'));?></li>
			</ul>
		</div>
	</div>
</div>
