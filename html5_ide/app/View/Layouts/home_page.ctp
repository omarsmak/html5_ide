
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="google-site-verification" content="Sm757oukQAsFlLVSZVoT0v8RXAneA64klAeYa6x7fuo" />
	<meta name="description" content="The Cloud Development Environment, Online Code Editor, Cloud Hosting and Web based access to file-system" />
	<meta name="keywords" content="html5, cloud, ide, saas" />
	<meta name="author" content="Omar Ahmed Al-Safi" />
	<meta name="robots" content="index, follow" />
	<!-- META Tags generated by http://www.submitexpress.com/meta-tags-generator.html -->

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "HTML5 Cloud IDE (Beta Development)" ?>:
		<?php echo $title_for_layout; ?>
        
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('redmond/jquery-ui-1.8.17.custom.css');
        echo $this->Html->css('main_page');
        
        echo $this->Html->script('vendor/jquery-1.7.1.min.js'); // Include jQuery library
        echo $this->Html->script('vendor/jquery-ui-1.8.16.custom.min.js');
        
        
        echo $this->Html->script('vendor/jquery.tools.min.js');
         //echo $this->Html->script('main_page.js');
        echo $this->Html->script('main_page_min.js');
        
        
		echo $scripts_for_layout;
        
	?>
    
    
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
            
            <div id="left_col">
            
            <div id="prod_desc">
            <table border="0" width="100%" style="height: 700px;">
                <tr>
                    <td align="center">
                    <div id="logo">
                    <img src="<?=MAIN_URL_ROOT?>/images/logo.png" height="150" width="325" />
                    </div>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" height="200">
                    
                    <div id="desc">
                    <p>
                    
                    HTML5 Cloud IDE is an Online Development Environment including Code Editor , Code Templates, Cloud Hosting, Web based access to file-system 
                    
                    </p>
		    <h4>Current Version: Beta 0.2</h4>
		    <h5>Note: This application is still in beta testing phase</h5>
		    <p style = "font-size:11px">
			Change log in version Beta 0.2 : </br>
			1- Secured all REST API . </br>
			2- Deleted files bug *fixed*. </br>
			3- Apple Safari and Opera compatibility *passed*. </br>
		    </p>

                </div>
                    
                    </td>
                </tr>
                <tr>
                    <td align="center" height="150" valign="top">
                        <div style="font-weight: bold;">Compatible with :</div>
                        <div>
                            <table cellpadding="10">
                                <tr>
                                    <td>
                                    <img src="<?=MAIN_URL_ROOT?>/images/firefox-small.png" height="60" width="60" alt="Mozila Firefox" />
                                    </td>
                                    <td>
                                    <img src="<?=MAIN_URL_ROOT?>/images/GoogleChrome_small.png" height="60" width="60" alt="Google Chrome" />
                                    </td>
				    <td>
                                    <img src="<?=MAIN_URL_ROOT?>/images/safari.png" height="60" width="60" alt="Google Chrome" />
                                    </td>
				    <td>
                                    <img src="<?=MAIN_URL_ROOT?>/images/opera.png" height="60" width="60" alt="Google Chrome" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
                
                
                
            </div>
            </div>
            <div id="right_col">
                <table width="100%" style="height: 700px;">
                    <tr>
                        <td align="center" valign="middle">
                            <div id="login_box">
                                <table width="100%" border="0">
                                    <tr>
                                        <td height="60"><span style="font-size: 18px;margin-left: 20px;margin-top: 50px;">Sign in</span></td>
                                    </tr>
                                     <tr>
                                        <td height="100">
                                            <div class="input_label">Email</div>
                                            <div style="margin-top: 10px;margin-left: 20px;"><input id="username" class="input_boxes" type="text" /></div>
                                        
                                        </td>
                                    </tr>
                                     <tr>
                                        <td height="100">
                                            <div class="input_label">Password</div>
                                            <div style="margin-top: 10px;margin-left: 20px;"><input id="password" class="input_boxes" type="password" /></div>
                                        
                                        </td>
                                    </tr>
                                     <tr>
                                        <td height="50">
                                        <table>
                                            <tr>
                                                <td> <div class="sign_in_btn" id="sign_btn_id" style="margin-left: 20px;">
                                                    <span>Sign in</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="add-new-button"  id="add_project_btn" rel="#new_project_window">or create a new Account</a>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        </td>
                                    </tr>
                                     <tr>
                                        <td></td>
                                    </tr>
                                </table>
                             </div>
                        </td>
                    </tr>
                </table>
                
                 <div class="simple_overlay" id="new_project_window">
                            
                                <div class="project_title">Create a new Account</div>
                                <div class="project_box_middle_container">
                                    
                                    <div class="project_box_middle">
                                    
                                        <table border="0">
                                        
                                            <tr>
                                                <td>
                                                    <label for="textfield">Name:</label>
                                                </td>
                                                <td>
                                                    <input id="name_input" type="text" />
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <label for="textfield">Email:</label>
                                                </td>
                                                <td>
                                                    <input id="email_input" type="text" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="textfield">Create a password:</label>
                                                </td>
                                                <td>
                                                    <input id="password_new_input" type="password" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="textfield">Confirm Password:</label>
                                                </td>
                                                <td>
                                                    <input id="password_new_input_re" type="password" />
                                                </td>
                                            </tr>
                                             
                                        </table>
                                        
                                    </div>
                                </div>
                                <div class="btns_frame">
                                    <table border="0">
                                        <tr>
                                            <td align="center" valign="middle">
                                                <div class="cancel_btn">
                                                     <span>CANCEL</span>
                                                </div>
                                            </td>
                                            <td align="center" valign="middle">
                                                <div class="create_btn">
                                                     <span>CREATE</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                
                
            </div>

		</div>
		<div id="footer">
    		<table>
            </table>
		</div>
	</div>

</body>
</html>