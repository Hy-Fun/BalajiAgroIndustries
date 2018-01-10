<?php
    include 'scripts/changePassword.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        
        <?php 
            include 'scripts/favIcon.php';
            
        ?>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <script type="text/javascript" src="js/jquery-1.12.0.js"></script>
    
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <script src="js/changePassword.js" type="text/javascript"></script>
    </head>
    <style>
        .ok{
            color: #449D44;
        }

        .wrong{
            color : #C9302C;
        }
    </style>
    <body class="bg-info">
        <header>    
            <nav class="navbar navbar-default navbar-fixed-top" id="navbarContainer">
                <div class="container">
                    <a class="navbar-brand active pull-left" href="index.php">Rooster Tax</a>
                </div>    
            </nav> <!-- end nav bar -->
        </header>
        <div style="margin-top:200px;" class="container">
            <?php
                if(isset($_SESSION['error'])){
                        $formNewsData='';
                        formNews($formNewsData,'Password Not Changed! Please try again.');
                        unset($_SESSION['error']);
                    }

                    if(isset($_SESSION['noError'])){
                        $formNewsData='';
                        formNews($formNewsData,'Password Changed Succesfully!');
                        unset($_SESSION['noError']);
                    }
                    
                    if(isset($_SESSION['criticalError'])){
                        $formNewsData='';
                        formNews($formNewsData,'Invalid Request!');
                        unset($_SESSION['criticalError']);
                    }
                    
                    function formNews($formNewsData,$data){
                        $formNewsData .='<div class="row">
                                <div class="col-md-8 col-md-push-2 alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <h4>'.$data.'</h4>'
                                . '</div></div>';
                        echo $formNewsData;
                        unset($_SESSION['criticalError']);
                    }
                ?>
            
            
            <div class='row'>
                <div class='alert alert-success col-md-8 col-md-push-2'>
                    <form method="post">
                        <div style="margin-top: 20px;" class="row">
                            <div class="col-md-8">
                                <p>Type in the new password.</p>
                            </div>    
                        </div>
                        <div class="row">
                                    <div class="col-md-10 form-group padSmall">
                                        <label for="changePassword">New Password</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input class="form-control password" id="changePassword" name="changePassword" placeholder="New Password" type="password" autofocus>
                                            </div>
                                            <div class="col-md-1">
                                                <p style="margin-top: 3px; font-size: 22px; " id="changePasswordCheck" class="pull-right"></p>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                        <div class="row">
                                    <div class="col-md-10 form-group padSmall">
                                        <label for="changePassword">Retype New Password</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input class="form-control password" id="retypeChangePassword" name="retypeChangePassword" placeholder="Retype New Password" type="password" readonly="true">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="margin-top: 3px; font-size: 22px; " id="retypeChangePasswordCheck" class="pull-right"></p>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                        <div class="row">
                            <div class="col-md-1">
                                <input class="btn btn-primary" name="save" id="save" type="submit" value="Save" disabled="true">
                            </div>
                        </div>                       
                    </form>
                    <div id="info" class="row" style="visibility: hidden">
                        <div class="col-md-8">
                            <p id="infoText" style="margin-top: 10px" class="alert"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
