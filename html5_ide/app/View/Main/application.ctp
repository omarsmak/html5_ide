
<div id="page_application">
    <div id="wrapper">
    
        <div id="left_col" style="height: 100%;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="height: 100%;">
                <tr>
                    <td>
                        <div id="left_col_top">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top: 2px;margin-left: 12px;">
                            <tr>
                                <td align="center" valign="middle" width="25%"><div id="profile_pic"><img src="<?=MAIN_URL_ROOT?>/images/blank_profile.jpg" height="65px" width="65px" /></div></td>
                                <td><span id="welcome">Welcome <?=$output_name?>!</span><?if($user_type == "Admin"){?><span style="margin-left: 10px;font-size: 10px;"><a href="<?=MAIN_URL_ROOT?>/code_bits" style="text-decoration: none;">Admin</a></span><?}?><span style="margin-left: 10px;font-size: 10px;"><a href="<?=MAIN_URL_ROOT?>/users/logout" style="text-decoration: none;">Logout</a></span></br><div class="small_text" id="code_and_fun">Code and Have Fun</div></td>
                            </tr>
                        </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><div class="line_tree"></div></td>
                </tr>
                <tr>
                    <td height="100%"><div id="tree_background"><div id="files_tree" style="margin-top: 10px;"></div></div></td>
                </tr>
            </table>
            
        </div>
        <div id="right_col">
        <!--
            <div id="editor" style="width: 700px;">
                <textarea id="code" name="code">
                
                </textarea>
            
            </div>
            -->
            <div id="tabs" style="display: block;">
            	<ul>
            		<li><a href="#tabs-1">Home</a></li>
            	</ul>
                
                <div style="height: 90%;" id="tabs-1">
                    <table width="100%" border="0" style="margin-top: 100px;">
                        <tr> 
                            <td height="400px" align="center"><span id="workspace_text">Workspace</span></td>
                        </tr>
                    </table>
                </div>
                
        </div>
            
            
            
        </div>
        
        <div id="clear"></div>
    
    </div>
</div>

