<?php
    
    $emailInvalid='';
    $emailVerify='';
    $passwordVerify='';
    $passwordInvalid='';
    $mailFrom = '';
    $change = '';
    $from = '';
    $body = '';
    $result = '';
    $loginMail='';
    $loginPassword='';
    $checkEmail = '';
    $checkPassword = '';

    
    
    
    //Login Form Info
    if (filter_input(INPUT_POST,'loginUser')=='Login'){
        
        include 'openDB.php';

        

        $link = mysqli_connect($host, $user, $password, $database);


        
        
        $loginMail=filter_input(INPUT_POST,'loginEmail');
        $loginPassword=md5(filter_input(INPUT_POST,'loginPassword'));
        

            if($link){
                $query = "SELECT * FROM clients WHERE email = '".mysqli_real_escape_string($link,$loginMail)."' AND password = '".mysqli_real_escape_string($link,$loginPassword)."' LIMIT 1 ";
                $yolo = mysqli_query($link, $query);
                $row = mysqli_fetch_array($yolo);

                if($yolo && $row['confirmed']){
                    $_SESSION['clientID']=$row['clientID'];
                    $_SESSION['name']=$row['userName'];
                    
                    //redirect to client page
                    
                    $_SESSION['userID']=$row['userID'];
                    
                    if($_SESSION['userID'] === '999' ){
                        $url='adminWarren.php';
                        ob_start();
                        header('Location: '.$url);
                        ob_end_flush();
                        die();
                    }
                    else{
                        
                        $url='home.php';
                        ob_start();
                        header('Location: '.$url);
                        ob_end_flush();
                        die();
                    }

                }
                else{
                    $emailInvalid='Invalid ';
                    $emailVerify='has-error';
                    $passwordVerify='has-error';
                    $passwordInvalid='Incorrect ';
                }
            }
        

    }
    
    //Contact form info
    if (filter_input(INPUT_POST,'contact')=='Contact') {
        //Gonna mail
        
        $mailFrom = filter_input(INPUT_POST,'contactEmail');
        $from = filter_input(INPUT_POST,'contactName');
        $mailTo = 'warrentornado@roostertax.com';
        $subject = 'Client from RoosterTax.com '.$from;
        $body = filter_input(INPUT_POST,'contactComments');
        
        if (mail($mailTo, $subject, $body)) {
            $result = '<div class="alert alert-success" style="margin-top:10px">Mail sent Successfully!</div>';
        }
        else{
            $result = '<div class="alert alert-warning" style="margin-top:10px">Mail not sent!</div>';
        }
        
    }

