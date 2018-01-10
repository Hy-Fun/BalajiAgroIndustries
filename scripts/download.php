<?php

    include 'openDB.php';

           
    $link = mysqli_connect($host, $user, $password, $database);
    
    if(!$link){
        echo 'Cannot connect to server...';
    }
            
    $date = filter_input(INPUT_GET,'time');
    $clientID = filter_input(INPUT_GET,'id');

    $query = "SELECT name, type, size, content FROM upload WHERE date = '$date' AND id = '$clientID' ";

    $result = mysqli_query($link,$query) or die('Error, query failed');
    $row = mysqli_fetch_array($result);
    
        header("Content-length: ".$row['size']);
        header("Content-type: ". $row['type']);
        header("Content-Disposition: attachment; filename = ".$row['name']);
        echo $row['content'];
