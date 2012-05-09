<div class="row">
	<div class="three columns offset-by-five">
		<div class="images form">
			<?php echo $this->Form->create('User');?>
				<fieldset>
					<legend><?php echo __('Login'); ?></legend>
				<?php
					echo $this->Form->input('username');
					echo $this->Form->input('password');
				?>
				</fieldset>
			<?php echo $this->Form->end(__('Submit'));?>
		</div>
	</div>
</div>
