<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include 'openDB.php';
    
    $link = mysqli_connect($host, $user, $password, $database);

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
         
      
         
         function valid_username($candidate) {
            $r1='/[A-Z]/';  //Uppercase
            $r2='/[a-z]/';  //lowercase
            $r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
            $r4='/[0-9]/';  //numbers
            $o='';

            if(preg_match_all($r3,$candidate, $o)){ return FALSE;}

            if(preg_match_all($r4,$candidate, $o)){ return FALSE;}
            
            if(preg_match_all($r1,$candidate, $o)){ return TRUE;}

            if(preg_match_all($r2,$candidate, $o)){ return TRUE;}
            
            if(strlen($candidate)>30){ return FALSE;}

            if(strlen($candidate)==0){ return FALSE;}

            return TRUE;
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
            
            if(strlen($candidate) === 0){ return FALSE;}
            
            if(strlen($candidate)<8){ return FALSE;}

            return TRUE;
         }




if(filter_input(INPUT_POST, 'username')!==null){
    $username = filter_input(INPUT_POST, 'username');
    if(!valid_username($username)){
        echo 0;
    }
    else{
        echo 1;
    }
}

if(filter_input(INPUT_POST, 'phoneNumber')!==null){
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber');
        if(!valid_phone($phoneNumber)){
            echo 0;
        }
        else{
            $query = 'SELECT `phone` FROM `clients` WHERE `phone` = '.$phoneNumber.'';
            $result =  mysqli_query($link, $query);
            if(mysqli_num_rows($result)>0){
                echo 2;
            }
            else{
                echo 1;
            }
        }
}

if(filter_input(INPUT_POST, 'newPassword')!==null){
    $newPassword = filter_input(INPUT_POST, 'newPassword');
    $_SESSION['newPassword'] = $newPassword;
    if(!valid_pass($newPassword)){
        echo 0;
    }
    else{
        echo 1;
    }
}

if(filter_input(INPUT_POST, 'retypeNewPassword')!==null){
    $retypeNewPassword = filter_input(INPUT_POST, 'retypeNewPassword');
    if($retypeNewPassword!==$_SESSION['newPassword']){
        echo 0;
    }
    else {
        echo 1;
    }
}

if(filter_input(INPUT_POST, 'newUsername')!==null){
    
    $newUsername = filter_input(INPUT_POST, 'newUsername');
    
    $queryUpdateUsername = 'userName';
    
    updateTable($queryUpdateUsername,$newUsername,$link);
    
    $_SESSION['name'] = $newUsername;
    
}


if(filter_input(INPUT_POST, 'updatePhoneNumber')!==null){
    
    $newPhoneNumber = filter_input(INPUT_POST, 'updatePhoneNumber');
    
    $queryUpdateUsername = 'phone';
    
    updateTable($queryUpdateUsername,$newPhoneNumber,$link);
    
}

if(filter_input(INPUT_POST, 'checkPassword')!==null && filter_input(INPUT_POST, 'updatePassword')!==null){
    
    $checkPassword = md5(filter_input(INPUT_POST, 'checkPassword'));
    
    $checkPasswordQuery = 'SELECT `password` FROM `clients` WHERE `clientID` = '.$_SESSION['clientID'].' AND `password` = "'.$checkPassword.'"';
    
    $resultCheckPassword =  mysqli_query($link, $checkPasswordQuery);
       
    if(mysqli_num_rows($resultCheckPassword) == 1){
        
        $queryUpdatePassword = 'password';
        
        $updatePassword = md5(filter_input(INPUT_POST, 'updatePassword'));
        
        updateTable($queryUpdatePassword,$updatePassword,$link);
        echo 1;
    }
    else{
        echo 0;
    }
}

function updateTable($column,$value,$link){
    
    $queryUpdateTable='UPDATE `clients` SET `'.$column.'` = "'.$value.'" WHERE `clientID` = '.$_SESSION['clientID'].'';

    $result =  mysqli_query($link, $queryUpdateTable);

    if($result){
        $_SESSION[''.$column.''] = strtolower($column);
    }
    
}

if(filter_input(INPUT_POST, 'formUsername')!==null){
    
    $formUsernameQuery = 'SELECT `userName` FROM `clients` WHERE `clientID` = '.$_SESSION['clientID'].' LIMIT 1';
    
    $resultFormUsername = mysqli_query($link, $formUsernameQuery);
    
    $row = mysqli_fetch_array($resultFormUsername);
    
    echo $row['userName'];
}

if(filter_input(INPUT_POST, 'formPhoneNumber')!==null){
    
    $formPhoneNumberQuery = 'SELECT `phone` FROM `clients` WHERE `clientID` = '.$_SESSION['clientID'].' LIMIT 1';
    
    $resultFormPhoneNumber = mysqli_query($link, $formPhoneNumberQuery);
    
    $row = mysqli_fetch_array($resultFormPhoneNumber);
    
    echo $row['phone'];
}