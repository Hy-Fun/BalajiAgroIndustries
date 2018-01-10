<?php
 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['clientID'])){
        $url='index.php';
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Home</title>
        
        <?php 
        include 'scripts/favIcon.php';
        ?>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="js/jquery-1.12.0.js"></script>
    
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <header>    
            <nav class="navbar navbar-default navbar-fixed-top" id="navbarContainer">
                <div class="container">

                        <a class="navbar-brand active pull-left" href="index.php">Rooster Tax</a>

                    <?php
                        include 'scripts/loggedIn.php';
                    ?>
                </div>    
            </nav> <!-- end nav bar -->
        </header>
        
            
            <div id="table">
                <?php

                    include 'scripts/openDB.php';
                    

                    $link = mysqli_connect($host, $user, $password, $database);

                    
                    $query30 = "SELECT clients.clientID, clients.userName, upload.name, upload.date, upload.id FROM clients INNER JOIN upload ON clients.clientID=upload.id ORDER BY upload.date DESC;"; 
                    $res = mysqli_query($link,$query30);
                    
                    $uploadInfo = mysqli_num_rows($res);
                    
                    if($uploadInfo>0){
                        echo "<br><br><br><br><br>";
                        echo '<div class=" .table-responsive">';
                        echo "<table class='table table-hover'>"; 
                        echo '<caption><h3> Recent Uploads <span class="pull-right"><a href="adminWarren1.php"> Sort By Clients </a></span><h3></caption>';
                        echo '<tr class="info"><th>Time Uploaded</th><th>Uploaded By</th><th>File Name</th><th>Opions</th></tr>';
                        
                        while($row1 = mysqli_fetch_array($res)){
                            $date = $row1['date'];
                            $ID  = $row1['id'];
                            echo "<tr class = 'active' ><td>" . $row1['date'] . "</td><td>".$row1['userName']."</td><td><a href='scripts/download.php?time=" .$date. "&id=".$ID."' target='_blank'>" . $row1['name'] . "</a></td><td><a href='scripts/delete.php?time=" .$date. "&id=".$ID."' target='_blank'>Delete File</td></a></tr>";  
                        }

                        echo "</table>"; 
                    }
                    mysqli_close($link);


                ?>
            </div>
            
        
        
        
        
        
        
    <script>
            $("#body").height(($(window).height()));
            
    </script>    
    </body>
</html>
