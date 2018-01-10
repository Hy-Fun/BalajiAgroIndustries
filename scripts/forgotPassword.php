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

if(filter_input(INPUT_POST, 'email')!==null){
    $email = filter_input(INPUT_POST, 'email');
    $emailCheckQuery = 'SELECT `clientID`,`userName` FROM `clients` WHERE `email` = "'.$email.'" AND `confirmed` = 1 LIMIT 1';
    $result = mysqli_query($link, $emailCheckQuery);
    $queryUpdateTable='UPDATE `clients` SET `changePassword` = 1 WHERE `email` = "'.$email.'" AND `confirmed` = 1 LIMIT 1';
    $result1 = mysqli_query($link, $queryUpdateTable);
    if((mysqli_num_rows($result)==1)&&$result1){
        echo 1;
        $mailDetails=  mysqli_fetch_array($result);
        $code= md5($mailDetails['userName'].$email);
        $id =  md5($mailDetails['clientID']);
        $message = "Hi ".$mailDetails['userName']."!
                    Click the link given below to change your password
                    http://www.roostertax.com/changePassword.php?verify=$id&code=$code";
        mail($email,"Rooster Tax", $message);
    }
    else {
        echo 0;
       }
}

