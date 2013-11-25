<div class="ideFiles view">
<h2><?php  echo __('Ide File');?></h2>
	<dl>
		<dt><?php echo __('File Id'); ?></dt>
		<dd>
			<?php echo h($ideFile['IdeFile']['file_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File Name'); ?></dt>
		<dd>
			<?php echo h($ideFile['IdeFile']['file_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File Parent Id'); ?></dt>
		<dd>
			<?php echo h($ideFile['IdeFile']['file_parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Folder'); ?></dt>
		<dd>
			<?php echo h($ideFile['IdeFile']['is_folder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ideFile['Project']['project_id'], array('controller' => 'projects', 'action' => 'view', $ideFile['Project']['project_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File Permissions'); ?></dt>
		<dd>
			<?php echo h($ideFile['IdeFile']['file_permissions']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ide File'), array('action' => 'edit', $ideFile['IdeFile']['file_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ide File'), array('action' => 'delete', $ideFile['IdeFile']['file_id']), null, __('Are you sure you want to delete # %s?', $ideFile['IdeFile']['file_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ide Files'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ide File'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
