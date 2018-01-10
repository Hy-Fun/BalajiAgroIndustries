
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li><button class="btn btn-success button-margin" id="loginToggle">Log In</button></li>
                            <li><a style="text-decoration: none;color: whitesmoke;margin-top: -5px;" href="signup.php"><button class="btn btn-success">Sign Up</button></a></li>
                        </ul>
                        
                        <div class="container navbar-left" id="login">
                                    
                            <form class="navbar-form " method="post">
                                
                                <div class="form-group  <?php echo $emailVerify; ?>">
                                    <input class="form-control " name="loginEmail" type="email" value="<?php echo $loginMail; ?>" placeholder="<?php echo $emailInvalid; ?>Email" required autofocus>
                                </div>
                                <div class="form-group <?php echo $passwordVerify; ?>">
                                    <input class="form-control focus" name="loginPassword" type="password" placeholder="<?php echo $passwordInvalid; ?>Password" required>
                                </div>
                                    
                                <input type="submit" value="Login" name="loginUser" class="btn btn-success">
                            </form>
                            <a href="forgotPassword.php"><p style="margin-left: 18px;">forgot password?</p></a>       
                        </div>