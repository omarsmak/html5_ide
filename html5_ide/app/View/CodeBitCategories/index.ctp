<div class="codeBitCategories index">
	<h2><?php echo __('Code Bit Categories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($codeBitCategories as $codeBitCategory): ?>
	<tr>
		<td><?php echo h($codeBitCategory['CodeBitCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($codeBitCategory['CodeBitCategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($codeBitCategory['CodeBitCategory']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $codeBitCategory['CodeBitCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $codeBitCategory['CodeBitCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $codeBitCategory['CodeBitCategory']['id']), null, __('Are you sure you want to delete # %s?', $codeBitCategory['CodeBitCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Code Bit Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Code Bits'), array('controller' => 'code_bits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Bit'), array('controller' => 'code_bits', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Logout'), "/users/logout"); ?> </li>
	</ul>
</div>
