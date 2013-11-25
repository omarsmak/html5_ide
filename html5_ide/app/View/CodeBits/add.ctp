<div class="codeBits form">
<?php echo $this->Form->create('CodeBit');?>
	<fieldset>
		<legend><?php echo __('Add Code Bit'); ?></legend>
	<?php
		echo "CodeBit Category ID ".$this->Form->select('category_id',$codeBitCategories);
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Code Bits'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Code Bit Categories'), array('controller' => 'code_bit_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit Category'), array('controller' => 'code_bit_categories', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), "/users/logout"); ?> </li>
	</ul>
</div>
