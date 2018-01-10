<?php
 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['clientID'])){
        $url='index.php';
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    } 
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Profile</title>
        <?php 
        include 'scripts/favIcon.php';
        ?>
        
        <link href="css/editProfile.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="js/jquery-1.12.0.js"></script>
    
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <script src="js/editProfile.js" type="text/javascript"></script>
    </head>
    <body>
        <header>    
            <nav class="navbar navbar-default navbar-fixed-top" id="navbarContainer">
                <div class="container">

                        <a class="navbar-brand active pull-left" href="index.php">Rooster Tax</a>

                    <?php
                        include 'scripts/loggedIn.php';
                    ?>
                </div>    
            </nav> <!-- end nav bar -->
        </header>
        
        <br><br><br><br><br><br>
        <div class="container">
            <?php
                if(isset($_SESSION['userName'])){
                    $formNewsData='';
                    formNews($formNewsData,'Username');
                    unset($_SESSION['userName']);
                }
                
                if(isset($_SESSION['phone'])){
                    $formNewsData='';
                    formNews($formNewsData,'Phone Number');
                    unset($_SESSION['phone']);
                }
                
                if(isset($_SESSION['password'])){
                    $formNewsData='';
                    formNews($formNewsData,'Password');
                    unset($_SESSION['password']);
                }
    
                function formNews($formNewsData,$data){
                    $formNewsData .='<div class="row">
                            <div class="col-md-8 col-md-push-2 alert alert-info fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <h4>'.$data.' has been changed successfully!!</h4>'
                            . '</div></div>';
                    echo $formNewsData;
                }
            ?>
            <div class="row">
                <div class="col-md-8 col-md-push-2 alert alert-success">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <label for="userName">User Name</label>
                                <div class="btn btn-primary pull-right" id="editUsername">edit</div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-11">
                                        <input class="form-control" id="userName" name="userName" placeholder="User Name" type="text" readonly="true">                                
                                    </div>
                                    <div class="col-md-1">
                                        <p style="margin-top: 3px; font-size: 22px; " class="pull-right" id="userNameCheck"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <label for="phoneNumber">Phone Number</label>
                                <div class="btn btn-primary pull-right" id="editPhoneNumber">edit</div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-11">
                                        <input class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" type="phone" readonly="true">
                                    </div>
                                    <div class="col-md-1">
                                        <p style="margin-top: 3px; font-size: 22px; " class="pull-right" id="phoneNumberCheck"></p>
                                    </div>
                                </div>
                                <div class="row" id="phoneNumberRegisterCheck">
                                    <div class="col-md-8 alert alert-danger col-md-push-1" style="margin-top: 10px;">
                                        <p>Phone Number Already Registered.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <label for="password">Password</label>
                                <div class="btn btn-primary pull-right" id="passwordToggle">edit</div>
                                <br><br>
                                <input class="form-control" id="password" name="password" placeholder="Password" value=".........." type="password" readonly="true">
                            </div>
                        </div>
                        <div class="row" id="passwordChangeTab">
                            <div class="col-md-8 col-md-push-1 alert alert-warning">
                                <div class="row">
                                    <div class="col-md-10 form-group padSmall">
                                        <label for="oldPassword">Old Password</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input class="form-control password" id="oldPassword" name="oldPassword" placeholder="Old Password" type="password" autofocus>
                                            </div>
                                            <div class="col-md-1">
                                                <p style="margin-top: 3px; font-size: 22px; " id="oldPasswordCheck" class="pull-right"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group padSmall">
                                        <label for="newPassword">New Password</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input class="form-control password" id="newPassword" name="newPassword" placeholder="New Password" type="password" readonly="true">
                                            </div>
                                            <div class="col-md-1">
                                                <p style="margin-top: 3px; font-size: 22px; " id="newPasswordCheck" class="pull-right"></p>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group padSmall">
                                        <label for="retypeNewPassword">Retype New Password</label>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input class="form-control password" id="retypeNewPassword" name="retypeNewPassword" placeholder="Retype New Password" type="password" readonly="true">
                                                </div>
                                            <div class="col-md-1">
                                                <p style="margin-top: 3px; font-size: 22px; " id="retypeNewPasswordCheck" class="pull-right"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-1" style="margin-bottom: 10px;">
                                <input class="btn btn-primary" name="submit" id="submit" type="submit" value="Save Changes" disabled="true">
                            </div>
                            <div class="col-md-push-1 col-md-1">
                                <a href="home.php"><div class="btn btn-danger" name="cancel" id="cancel">Cancel</div></a>
                            </div>
                            
                        </div>
                        
                         <p id="yolo"></p>   
                    </form>
                </div>
            </div>    
        </div>
        

    </body>
</html>