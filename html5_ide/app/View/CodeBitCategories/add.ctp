<div class="codeBitCategories form">
<?php echo $this->Form->create('CodeBitCategory');?>
	<fieldset>
		<legend><?php echo __('Add Code Bit Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Code Bit Categories'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Code Bits'), array('controller' => 'code_bits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit'), array('controller' => 'code_bits', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), "/users/logout"); ?> </li>
	</ul>
</div>
