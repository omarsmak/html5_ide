
var _general = {};


var main_url = "/html5_ide" ;





$(function(){
    
    
    function load_projects_list(){
        if($(".projects_list").length){
            $.ajax({
                url : main_url+"/server/load_projects_list",
                dataType : "html",
                success : function(data){
                    $(".projects_list").html(data);
                    $(".project_items").mouseover(function(e){
                        $(this).addClass("hover");
                    }).mouseout(function(e){
                        $(this).removeClass("hover");
                    });
                    
                     $(".project_items").dblclick(function(){
                        window.location.href=main_url+"/main/application/"+$(this).attr("id");
                     });
                }
            });
        }
    }
    
    load_projects_list();
    
    $("#left_col").resizable({
        
         handles: 'e' ,
         minWidth : 350,
         maxWidth : 600
        
    });
    
    
    
    
    var create_project_ajax_request = function(e){
        
    }
    
    
    var project_window_triggers = $(".add-new-button[rel]").overlay({
        
        mask: {
    		color: '#292929',
    		loadSpeed: 200,
    		opacity: 0.9
    	},
        top : "30%" ,
        left : "center",
        closeOnClick: false
        
    });
    
    var project_window_buttons = $("#new_project_window .cancel_btn").click(function(e){
        project_window_triggers.overlay().close();
    });
    
    
    $("#new_project_window .create_btn").click(function(e){
       var project_name = $("#new_project_window #project_name_filed").val();
       var url_to_send = main_url+"/server/create_new_project/"+project_name ; 
       if(project_name.length != 0){
        $.ajax({
            url : url_to_send , 
            dataType : "json" , 
            success : function(data){
                //alert(data.status);
                project_window_triggers.overlay().close();
                load_projects_list();
            }
        });
       }
    });
    
    
});