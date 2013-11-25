<div class="codeBitCategories view">
<h2><?php  echo __('Code Bit Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($codeBitCategory['CodeBitCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($codeBitCategory['CodeBitCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($codeBitCategory['CodeBitCategory']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Code Bit Category'), array('action' => 'edit', $codeBitCategory['CodeBitCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Code Bit Category'), array('action' => 'delete', $codeBitCategory['CodeBitCategory']['id']), null, __('Are you sure you want to delete # %s?', $codeBitCategory['CodeBitCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Code Bit Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Code Bits'), array('controller' => 'code_bits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit'), array('controller' => 'code_bits', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Code Bits');?></h3>
	<?php if (!empty($codeBitCategory['CodeBit'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($codeBitCategory['CodeBit'] as $codeBit): ?>
		<tr>
			<td><?php echo $codeBit['id'];?></td>
			<td><?php echo $codeBit['category_id'];?></td>
			<td><?php echo $codeBit['name'];?></td>
			<td><?php echo $codeBit['code'];?></td>
			<td><?php echo $codeBit['description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'code_bits', 'action' => 'view', $codeBit['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'code_bits', 'action' => 'edit', $codeBit['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'code_bits', 'action' => 'delete', $codeBit['id']), null, __('Are you sure you want to delete # %s?', $codeBit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Code Bit'), array('controller' => 'code_bits', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
