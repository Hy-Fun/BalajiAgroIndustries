<?php
            include 'scripts/openDB.php';
            
            $link = mysqli_connect($host, $user, $password, $database);
    
            if(!$link){
                $formNews = 'Cannot connect to server...';
            }
            
            $username = filter_input(INPUT_GET,'verify');
            $confirmCode = filter_input(INPUT_GET,'code');
            
            
            $query = mysqli_query($link, "SELECT * FROM `clients` WHERE `userID` = '$username'");
            

                while ($row = mysqli_fetch_assoc($query)){
                    $checkCode = $row['confirmCode'];
                    
                }

                if($checkCode === $confirmCode){
                    $query1 = "UPDATE `clients` SET `confirmed`='1' WHERE `userID` = '".$username."'";
                    mysqli_query($link, $query1);
                    $query2 = "UPDATE `clients` SET `confirmCode`='0' WHERE `userID` = '".$username."'";
                    mysqli_query($link, $query2);
                    $query3 = "UPDATE `clients` SET `userID`='0' WHERE `userID` = '".$username."'";
                    mysqli_query($link, $query3);
                    
                    //redirect code to home page
                    
                    
                    $url='index.php';
                    ob_start();
                    header('Location: '.$url);
                    ob_end_flush();
                    die();
                    
                }
                else{
                    echo 'Cannot Verify';
                }
            mysqli_close($link);

