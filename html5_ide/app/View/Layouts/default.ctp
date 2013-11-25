<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "HTML5 Cloud IDE" ?>:
		<?php echo $title_for_layout; ?>
        
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('redmond/jquery-ui-1.8.17.custom.css');
        echo $this->Html->css('ide_style.css');
        
        echo $this->Html->script('vendor/jquery-1.7.1.min.js'); // Include jQuery library
        echo $this->Html->script('vendor/jquery-ui-1.8.16.custom.min.js');
        
        echo $this->Html->script('vendor/jquery.cookie.js');
        echo $this->Html->script('vendor/jquery.hotkeys.js');
        echo $this->Html->script('vendor/jquery.jstree.js');
        
        echo $this->Html->script('vendor/ui.tabs.closable.min.js');
        
        echo $this->Html->script('vendor/jquery.tools.min.js');
        
        echo $this->Html->css('codemirror.css');
        echo $this->Html->css('ide-editor.css');
        
        
        if($this->params['controller'] == "main" && $this->params['action'] == "application"){
            //echo $this->Html->script('vendor/jquery.treeview.async.js');
            //echo $this->Html->script('vendor/underscore.js');
            //echo $this->Html->script('vendor/backbone.js');
            
            //include the editor
            
            
            echo $this->Html->script('vendor/codemirror.js');
            
            echo $this->Html->script('application/editor_modes/xml.js');
            echo $this->Html->script('application/editor_modes/javascript.js');
            echo $this->Html->script('application/editor_modes/css.js');
            echo $this->Html->script('application/editor_modes/htmlmixed.js');
            
            //echo $this->Html->script('application/ide-editor.js');
            //echo $this->Html->script('application/ide_app.js');
            
            echo $this->Html->script('application/ide_editor_min.js');
            echo $this->Html->script('application/ide_app_min.js');
            
       }else if ($this->params['controller'] == "code_bit_categories" || $this->params['controller'] == "code_bits") {
            echo $this->Html->css('main_page.css');
            echo $this->Html->css('admin.css');
        }else{
        //echo $this->Html->script('application/general_script.js');
        echo $this->Html->script('application/general_script_min.js');
       }
        
        
		echo $scripts_for_layout;
        
	?>
    
     <script>
    var xmlhttp=false;
        /*@cc_on @*/
        /*@if (@_jscript_version >= 5)
        // JScript gives us Conditional compilation, we can cope with old IE versions.
        // and security blocked creation of the objects.
         try {
          xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
          try {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (E) {
           xmlhttp = false;
          }
         }
        @end @*/
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        	try {
        		xmlhttp = new XMLHttpRequest();
        	} catch (e) {
        		xmlhttp=false;
        	}
        }
        if (!xmlhttp && window.createRequest) {
        	try {
        		xmlhttp = window.createRequest();
        	} catch (e) {
        		xmlhttp=false;
        	}
        }
    </script>
    
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo"></div>
            <div id="left_cloud"></div>
		</div>
        <div id="header_sperator" class="line"></div>
		<div id="content">
            <? //echo $this->params['controller']?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
		
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>