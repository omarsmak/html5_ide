<div class="codeBits view">
<h2><?php  echo __('Code Bit');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($codeBit['CodeBit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code Bit Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($codeBit['CodeBitCategory']['name'], array('controller' => 'code_bit_categories', 'action' => 'view', $codeBit['CodeBitCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($codeBit['CodeBit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($codeBit['CodeBit']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($codeBit['CodeBit']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Code Bit'), array('action' => 'edit', $codeBit['CodeBit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Code Bit'), array('action' => 'delete', $codeBit['CodeBit']['id']), null, __('Are you sure you want to delete # %s?', $codeBit['CodeBit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Code Bits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Code Bit Categories'), array('controller' => 'code_bit_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit Category'), array('controller' => 'code_bit_categories', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), "/users/logout"); ?> </li>
	</ul>
</div>
