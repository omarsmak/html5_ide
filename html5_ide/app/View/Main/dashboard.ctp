
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
                    <td height="100%">
                    
                        <div id="tree_background">
                        
                           <div class="headlines">
                                    <div class="name">My Projects</div>
                                    <div class="addprojectbtn">
                                        <a class="add-new-button" id="add_project_btn" rel="#new_project_window">
                                            <span></span>
                                        </a>
                                    </div>
                           </div>
                           <blockquote class="projects_list">
                                <div class="project_items" id="6f2700c76d1c59ebd09cbe2686bea129">
                                    <div class="arrow"></div>
                                    <div class="name"> sss </div>
                                </div>
                                
                                <div class="project_items" id="">
                                    <div class="arrow"></div>
                                    <div class="name"> sss </div>
                                </div>
                                
                           </blockquote>
                           
                            <div class="simple_overlay" id="new_project_window">
                            
                                <div class="project_title">Create New Project</div>
                                <div class="project_box_middle_container">
                                    
                                    <div class="project_box_middle">
                                    
                                        <table border="0">
                                            <tr>
                                                <td>
                                                    <label for="textfield">Project Name:</label>
                                                </td>
                                                <td>
                                                    <input id="project_name_filed" type="text" />
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
                    </td>
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
            
            
            
            
        </div>
        
        <div id="clear"></div>
    
    </div>
</div>