/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var userNameToggleCheck =0;
var phoneNumberToggleCheck = 0;
var passwordToggleCheck = 0;
var submitCheck;
var formUsername = 'User Name';
var formPhoneNumber = 'Phone Number';


$(document).ready(function(){
    
    $('#newPassword').tooltip({title: "Password should contain atleast one capital\n\
    letter, one symbol and one number", trigger: "focus", animation: true, delay: {show: 500, hide: 100}});
    
    $.post('scripts/editProfile.php',{formUsername : formUsername},function(c){
        formUsername = c;
        $('#userName').prop('value',formUsername);
    });
    
    $.post('scripts/editProfile.php',{formPhoneNumber : formPhoneNumber},function(c){
        formPhoneNumber = c;
        $('#phoneNumber').prop('value',formPhoneNumber);
    });
    
    $("#passwordToggle").click(function(){
        passwordToggleCheck++;
        if((passwordToggleCheck%2) === 1){
            $("#passwordChangeTab").slideToggle("slow");
            formCheck(0); 
        }
        else{
            $("#passwordChangeTab").slideToggle("slow");
            $('.password').prop('value','');
            $('#retypeNewPassword').prop("readonly",true);
            $('#newPassword').prop("readonly",true);
            formCheck(0);
        }
       
    });
    
    $('#editUsername').click(function(){
        userNameToggleCheck++;
        if((userNameToggleCheck%2)===1){
            $('#userName').prop("readonly",false);
            formCheck(0);
        }
        else{
            $('#userName').prop("readonly",true);
            $('#userNameCheck').removeClass("glyphicon glyphicon-ok-sign ok glyphicon-remove-sign wrong");
            $('#userName').prop('value',formUsername);
            formCheck(0);
        }
    });
    
    $('#editPhoneNumber').click(function(){
        phoneNumberToggleCheck++;
        if((phoneNumberToggleCheck%2)===1){
            $('#phoneNumber').prop("readonly",false);
            formCheck(0);
        }
        else{
            $('#phoneNumber').prop("readonly",true);
            $('#phoneNumberCheck').removeClass("glyphicon glyphicon-ok-sign ok glyphicon-remove-sign wrong");
            $('#phoneNumber').prop('value',formPhoneNumber);
            formCheck(0);
        }
    });
    
   $("#userName").keyup(function(){
        
        username = $("#userName").val();
        $.post("scripts/editProfile.php",{username : username},function(alertt){
            if(alertt == 0){
                $('#userNameCheck').removeClass("glyphicon glyphicon-ok-sign ok");
                $('#userNameCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                formCheck(0);
            }    
            else if(alertt == 1){
                $('#userNameCheck').removeClass("glyphicon glyphicon-remove-sign wrong");
                $('#userNameCheck').addClass("glyphicon glyphicon-ok-sign ok");
                formCheck(1);
            }
        });
        
    });
    
    $("#phoneNumber").keyup(function(){

        phoneNumber = $("#phoneNumber").val();
        $.post("scripts/editProfile.php",{phoneNumber : phoneNumber},function(alertt,togglecheck){
            if(alertt == 0){
                $('#phoneNumberCheck').removeClass("glyphicon glyphicon-ok-sign ok");
                $('#phoneNumberCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                formCheck(0);
            }    
            else if(alertt == 1){
                $('#phoneNumberCheck').removeClass("glyphicon glyphicon-remove-sign wrong");
                $('#phoneNumberCheck').addClass("glyphicon glyphicon-ok-sign ok");
                if(!($('#phoneNumberRegisterCheck').css("display")==='none')){
                    $('#phoneNumberRegisterCheck').slideToggle("slow");
                }
                formCheck(1);
            }
            else if(alertt == 2){
                
                $('#phoneNumberRegisterCheck').slideToggle("slow");

                formCheck(0);
            }
        });
        
    });
    
    $("#newPassword").keyup(function(){
        
        var newPassword = $("#newPassword").val();
        $.post("scripts/editProfile.php",{newPassword : newPassword},function(alertt){
            if(alertt == 0){
                $('#newPasswordCheck').removeClass("glyphicon glyphicon-ok-sign ok");
                $('#newPasswordCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                $('#retypeNewPassword').prop("readonly",true);
                formCheck(0);
            }    
            else if(alertt == 1){
                $('#newPasswordCheck').removeClass("glyphicon glyphicon-remove-sign wrong");
                $('#newPasswordCheck').addClass("glyphicon glyphicon-ok-sign ok");
                $('#retypeNewPassword').prop("readonly",false);
                formCheck(0);
            }
        });
        
    });
    
    $("#oldPassword").keyup(function(){
        
        oldPassword = $("#oldPassword").val();
        $.post("scripts/editProfile.php",{newPassword : oldPassword},function(alertt){
            if(alertt == 0){
                $('#newPassword').prop("readonly",true);
                $('#retypeNewPassword').prop("readonly",true);
                formCheck(0);
            }    
            else if(alertt == 1){
                $('#newPassword').prop("readonly",false);
                formCheck(0);
            }
        });
        
    });
    
    $("#retypeNewPassword").keyup(function(){
        
        retypeNewPassword = $("#retypeNewPassword").val();
        $.post("scripts/editProfile.php",{retypeNewPassword : retypeNewPassword},function(alertt){
            if(alertt == 0){
                $('#retypeNewPasswordCheck').removeClass("glyphicon glyphicon-ok-sign ok");
                $('#retypeNewPasswordCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                formCheck(0);
            }    
            else if(alertt == 1){
                $('#retypeNewPasswordCheck').removeClass("glyphicon glyphicon-remove-sign wrong");
                $('#retypeNewPasswordCheck').addClass("glyphicon glyphicon-ok-sign ok");
                formCheck(1);
            }
        });
        
    });
    
    $('#submit').click(function(e){
       e.preventDefault();
       if((userNameToggleCheck%2)===1){
           $.post("scripts/editProfile.php",{newUsername : username});
           window.open('editProfile.php','_self');
       }
       if((phoneNumberToggleCheck%2)===1){
           $.post("scripts/editProfile.php",{updatePhoneNumber : phoneNumber});
           window.open('editProfile.php','_self');
       }
       if((passwordToggleCheck%2)===1){
           $.post("scripts/editProfile.php",{checkPassword : oldPassword, updatePassword : retypeNewPassword},function(c){
               if(c == 0){
                    $('#oldPasswordCheck').addClass("glyphicon glyphicon-remove-sign wrong");
                    $('.password').prop('value','');
               }
               else if(c == 1){
                    window.open('editProfile.php','_self');
               }
           });  
       }
    });    
});

function formCheck(updateFormCheck){
    
    if(((passwordToggleCheck%2) === 1) || ((userNameToggleCheck%2)===1) || ((phoneNumberToggleCheck%2)===1)){
        activeEdit = 1;
    }
    else{
        activeEdit = 0;
    }
    
    if(updateFormCheck === 1 && activeEdit === 1){
        $('#submit').prop("disabled",false);
    }
    else{
        $('#submit').prop("disabled",true);
    }
    }
