/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    $('#changePassword').tooltip({title: "Password should contain atleast one capital\n\
    letter, one symbol and one number", trigger: "focus", animation: true, delay: {show: 500, hide: 100}});
    
    $("#changePassword").keyup(function(){

            var changePassword = $("#changePassword").val();
            
            
            $.post("scripts/changePassword.php",{changePassword : changePassword},function(alertt){
                if(alertt == 0){
                    $('#changePasswordCheck').removeClass("glyphicon glyphicon-ok-sign ok");
                    $('#changePasswordCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                    $('#retypeChangePassword').prop("readonly",true);
                }    
                else if(alertt == 1){
                    $('#changePasswordCheck').removeClass("glyphicon glyphicon-remove-sign wrong");
                    $('#changePasswordCheck').addClass("glyphicon glyphicon-ok-sign ok");
                    $('#retypeChangePassword').prop("readonly",false);
                }
            });

        });
        
    $("#retypeChangePassword").keyup(function(){
        retypeChangePassword = $("#retypeChangePassword").val();
        $.post("scripts/changePassword.php",{retypeChangePassword : retypeChangePassword},function(alertt){
            if(alertt == 0){
                $('#retypeChangePasswordCheck').removeClass("glyphicon glyphicon-ok-sign ok");
                $('#retypeChangePasswordCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                $('#save').prop('disabled',true);
            }    
            else if(alertt == 1){
                $('#retypeChangePasswordCheck').removeClass("glyphicon glyphicon-remove-sign wrong");
                $('#retypeChangePasswordCheck').addClass("glyphicon glyphicon-ok-sign ok");
                $('#save').prop('disabled',false);
            }
        });
        
    });
    
    $('#save').click(function(e){
        e.preventDefault();
        flag = 1;
        $.post("scripts/changePassword.php",{flag : flag},function(){
            window.open('changePassword.php?code=1&verify=1','_self');
        });
    });
});

