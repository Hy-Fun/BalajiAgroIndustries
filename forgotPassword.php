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
        
        <script src="js/forgotPassword.js" type="text/javascript"></script>
    </head>
    <body class="bg-info">
        <header>    
            <nav class="navbar navbar-default navbar-fixed-top" id="navbarContainer">
                <div class="container">
                    <a class="navbar-brand active pull-left" href="index.php">Rooster Tax</a>
                </div>    
            </nav> <!-- end nav bar -->
        </header>
    
        <div class="container">
            <div class='row'>
                <div style="margin-top: 200px;" class='alert alert-warning col-md-8 col-md-push-2'>
                    <form method="post">
                        <div style="margin-top: 20px;" class="row">
                            <div class="col-md-8">
                                <p>Please give your Email Address so that we could send you a password change link.</p>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group">
                                    <label>Your Email Address :</label>
                                    <input class="form-control" id="forgotPasswordEmail" name="forgotPasswordEmail" placeholder="Your Email" type="email" required autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <input class="btn btn-primary" name="submit" id="submit" type="submit" value="Send Link">
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
