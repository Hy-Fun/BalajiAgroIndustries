<?php
    
    
    include 'openDB.php';

            
    
    $link = mysqli_connect($host, $user, $password, $database);
    
    if(!$link){
        $formNews = '<div class="alert col-sm-7 alert-warning">Cant Connect To Servers</div>';
    }
    
    $emailErr='';
    $passwordErr='';
    $phoneErr='';
    $errorCheck=0;
    $mail = '';
    $name = '';
    $phone = '';
    $passHash = '';
    $nameHash = '';
    $confirmHash = '';
    $message='';
    $formNews = '';
    

    if(filter_input(INPUT_POST,'signupUser')=='signup'){
       
        $mail = filter_input(INPUT_POST,'signupEmail');         
        $password = filter_input(INPUT_POST,'signupPassword');
        $passwordRetype = filter_input(INPUT_POST,'signupPasswordRetype');
        $name = filter_input(INPUT_POST,'signupName');
        $phone = filter_input(INPUT_POST,'signupPhone');
        
        $query = "SELECT email FROM clients WHERE email = '".mysqli_real_escape_string($link,$mail)."' ";
        $resultEmail = mysqli_query($link, $query);
        $checkResultEmail = mysqli_num_rows($resultEmail);
        if($checkResultEmail){
            $emailErr='<div class="alert alert-warning">Email Already Registered!</div>';
            $errorCheck=1;
        }
        
        $query = "SELECT phone FROM clients WHERE phone = '".mysqli_real_escape_string($link,$phone)."' ";
        $resultPhone = mysqli_query($link, $query);
        $checkResultPhone = mysqli_num_rows($resultPhone);
        if($checkResultPhone){
            $phoneErr='<div class="alert alert-warning">Phone Number Already Registered!</div>';
            $errorCheck=1;
        }
        
        function valid_pass($candidate) {
            $r1='/[A-Z]/';  //Uppercase
            $r2='/[a-z]/';  //lowercase
            $r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
            $r4='/[0-9]/';  //numbers
            $o='';
            if(preg_match_all($r1,$candidate, $o)<1){ return FALSE;}

            if(preg_match_all($r2,$candidate, $o)<1){ return FALSE;}

            if(preg_match_all($r3,$candidate, $o)<1){ return FALSE;}

            if(preg_match_all($r4,$candidate, $o)<1){ return FALSE;}

            if(strlen($candidate)<8){ return FALSE;}

            return TRUE;
         }
        
         $passReg = valid_pass($password);
         
        if(($passReg==TRUE)&&($password!=$passwordRetype)){
            $passwordErr='<div class="alert col-sm-7 alert-warning">Passwords Dont Match!</div>';
            $errorCheck=1;
        }
        if($passReg==FALSE){
            $passwordErr.='<div class="alert col-sm-7 alert-warning">Password Should Contain One Upper Case Letter, One Symbol and One Number.</div>';
            $errorCheck=1;
        }
        if(strlen($password)<8){
            $passwordErr.='<div class="alert col-sm-7 alert-warning">Passwords Should Be 8 characters Long.</div>';
            $errorCheck=1;
        }
        
        function valid_phone($candidate) {
            $r1='/[A-Z]/';  //Uppercase
            $r2='/[a-z]/';  //lowercase
            $r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
            $r4='/[0-9]/';  //numbers
            $o='';
            if(preg_match_all($r1,$candidate, $o)){ return FALSE;}

            if(preg_match_all($r2,$candidate, $o)){ return FALSE;}

            if(preg_match_all($r3,$candidate, $o)){ return FALSE;}
            
            if(strlen($candidate)!=10){ return FALSE;}
            
            if(preg_match_all($r4,$candidate, $o)){ return  TRUE;}

            
         }
        
        if(!valid_phone($phone)){
            $phoneErr = '<div class="alert col-sm-7 alert-warning">Inavlid Phone Number!</div>';
            $errorCheck=1;
        }
        
        if($errorCheck==0){
            
            
            $nameHash = md5($name);
            $passHash = md5($password);
            $confirmHash = md5($nameHash.$passHash);
            
            $phoneClone  =  $phone;
            
            $query = "INSERT INTO `clients` (`userName`, `email`, `password`, `phone`, `clientID`, `confirmed`, `userID`, `confirmCode`,`changePassword`) VALUES ('$name', '$mail', '$passHash', '$phoneClone', '0', '0', '$nameHash', '$confirmHash','0');";
            
            
            $message = "Confirm Your Email
                        Click the link given below to activate your account
                        http://www.roostertax.com/confirm.php?verify=$nameHash&code=$confirmHash";
            
            mysqli_query($link, $query);
            $mailCheck = mail($mail,"Rooster Tax", $message);
            if($mailCheck){
                
                $_SESSION['formNews'] = '<div class="alert col-sm-7 alert-success">A Verification Link Has Been Sent To Your Email</div>';
                $mail = '';
                $name = '';
                $phone = '';
                mysqli_query($link, $query);
                
                $url='signup.php';
                    ob_start();
                    header('Location: '.$url);
                    ob_end_flush();
                    die();
  
            }
            else{
                $formNews = '<div class="alert col-sm-7 alert-warning">There Was A Problem. Please Try Again.</div>';
            }
           
        }
    
    }


    
    

