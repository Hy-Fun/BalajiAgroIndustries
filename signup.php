<?php
    

        session_start(); 
    
    
    include ('scripts/signUpCheck.php');
    
    $formNews = $_SESSION['formNews'];
    
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link href="css/signUp.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="js/jquery-1.12.0.js"></script>
    
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
        <?php 
        include 'scripts/favIcon.php';
        ?>
        
    </head>
    <body>
        
        <!-- nav bar -->
        <header>    
            <nav class="navbar navbar-default navbar-fixed-top" id="navbarContainer">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand active" href="index.php">Rooster Tax</a>
                    </div> <!-- nav-bar Header -->
                </div>    
            </nav> <!-- end nav bar -->
        </header>
        
        <div id='body' class="container" style="margin-top: 120px;">
            <div class="row">
                <div class="container bg-grey col-md-4">
                    <form method="post">
                        <h2 class="text-left padThis">Sign Up</h2>
                        <?php echo $formNews; $_SESSION['formNews']='';?>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <input class="form-control" id="name" name="signupName" placeholder="Name" type="text" value="<?php echo $name; ?>"  required autofocus>
                            </div>
                        </div>
                        <?php echo $emailErr; ?>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                            <input class="form-control" id="email" name="signupEmail" placeholder="Email" type="email" value="<?php echo $mail; ?>" required>
                            </div>
                        </div>
                        <?php echo $passwordErr; ?>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <input class="form-control" id="password" name="signupPassword" placeholder="Password" type="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <input class="form-control" id="password" name="signupPasswordRetype" placeholder="Retype Password" type="password" required>
                            </div>
                        </div>
                        <?php echo $phoneErr; ?>
                        <div class="row">
                            <div class="col-md-8 form-group padSmall">
                                <input class="form-control" id="phone" name="signupPhone" placeholder="Phone Number" value="<?php echo $phone; ?>" type="phone" required>
                            </div>
                        </div>
                        <input type="submit" value="signup" name="signupUser" class="btn btn-success" style="margin-left: 15px;">
                    </form>
                </div>
            </div>
        </div>
        
        
        <script>
            
            $("#body").height(($(window).height()));

            $('#password').tooltip({title: "Password should contain atleast one capital\n\
    letter, one symbol and one number", trigger: "focus"});

        </script>
        
     </body>
</html>
