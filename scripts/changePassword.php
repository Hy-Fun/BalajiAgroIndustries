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
         
if(filter_input(INPUT_POST, 'changePassword')!==null){
    $changePassword = filter_input(INPUT_POST, 'changePassword');
    $_SESSION['changePassword'] = $changePassword;
    if(!valid_pass($changePassword)){
        echo 0;
    }
    else{
        echo 1;
    }
}

if(filter_input(INPUT_POST, 'retypeChangePassword') !== null){
    $retypeChangePassword = filter_input(INPUT_POST, 'retypeChangePassword');
    if($retypeChangePassword!==$_SESSION['changePassword']){
        echo 0;
    }
    else {
        echo 1;
    }
}

if((filter_input(INPUT_GET, 'verify')!==null) && (filter_input(INPUT_GET, 'code')!==null)){
    $_SESSION['verify'] =filter_input(INPUT_GET, 'verify');
    $_SESSION['code'] = filter_input(INPUT_GET, 'code');
    $_SESSION['goodToGo']=1;
}


if((filter_input(INPUT_POST, 'flag') !== null) && $_SESSION['goodToGo'] == 1){
        $query = 'SELECT `userName`,`email`,`clientID` FROM `clients` WHERE `changePassword` = 1';
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result)>0){
            while($clientID = mysqli_fetch_array($result)){
                if($_SESSION['verify'] == md5($clientID['clientID']) && $_SESSION['code'] ==  md5($clientID['userName'].$clientID['email'])){
                    $queryUpdateTable='UPDATE `clients` SET `password` = "'.  md5($_SESSION['changePassword']).'", `changePassword` = 0 WHERE `clientID` = '.$clientID['clientID'].' LIMIT 1';
                    $result1 = mysqli_query($link, $queryUpdateTable);
                    if(mysqli_affected_rows($link)==1){
                        $_SESSION['noError']=0;
                    }
                    else {
                        $_SESSION['error']=1;
                    }
                }
                else{
                    $_SESSION['criticalError']=1;
                }
            }
        }
        else{
            $_SESSION['criticalError']=1;
        }
}