/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('#submit').click(function(e){
        e.preventDefault();
        forgotPasswordEmail = $("#forgotPasswordEmail").val();
        if((validateEmail(forgotPasswordEmail)) === true){
            $.post('scripts/forgotPassword.php',{email:forgotPasswordEmail},function(returnedValue){
                if(returnedValue){
                    $('#info').css('visibility','visible');
                    document.getElementById('infoText').innerHTML = 'An email will be sent if the email has been registered with us.';
                    $('#infoText').addClass('alert-success');
                    $('#infoText').removeClass('alert-danger');
                }
            });
        }
        else{
            $('#infoText').removeClass('alert-success');
            $('#infoText').addClass('alert-danger');
            $('#info').css('visibility','visible');
            document.getElementById('infoText').innerHTML = 'Invalid Email Address';
        }
    });   
});


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}