var main_url = "/html5_ide" ;
$(function(){
    
    $("#sign_btn_id").click(function(e){
        var user_name = $("#username").val();
        var password_input = $("#password").val();

        if(user_name.length > 0 && password_input.length > 0){
            $.ajax({
                url : main_url+"/users/login",
                type : "POST",
                data : {username : user_name, password : password_input},
                dataType : "json" , 
                success : function(data){
                    if(data.status){
                        window.location.href = main_url+"/main/dashboard"
                    }else {
                        alert("Username or password is incorrect!");
                    }
                }
            });
        }
    });
    
    var project_window_buttons = $("#new_project_window .cancel_btn").click(function(e){
        project_window_triggers.overlay().close();
    });
    
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
    
    $(".create_btn").click(function(e){
        var name = $("#name_input").val();
        var email = $("#email_input").val();
        var pass = $("#password_new_input").val();
        var re_pass = $("#password_new_input_re").val();
        
        if(name.length > 0 && email.length > 0 && pass.length > 0 && re_pass){
            if(pass == re_pass){
                if(validateEmail(email)){
                    $.ajax({
                        url : main_url+"/users/signup",
                        type : "POST",
                        dataType : "json",
                        data : {username : email,password: pass, name_acc : name, re_password : re_pass},
                        success : function(data){
                            window.location.href = main_url+"/main/index";
                        }
                    });
                }else {
                    alert("Email not valid!")
                }
            }else {
                alert("The passwords are not matches !");
            }
        }
        
    });
    
    function validateEmail(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
    
});