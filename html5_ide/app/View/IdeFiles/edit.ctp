<div class="ideFiles form">
<?php echo $this->Form->create('IdeFile');?>
	<fieldset>
		<legend><?php echo __('Edit Ide File'); ?></legend>
	<?php
		echo $this->Form->input('file_id');
		echo $this->Form->input('file_name');
		echo $this->Form->input('file_parent_id');
		echo $this->Form->input('is_folder');
		echo $this->Form->input('project_id');
		echo $this->Form->input('file_permissions');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IdeFile.file_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('IdeFile.file_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ide Files'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
