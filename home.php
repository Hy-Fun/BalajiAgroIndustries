<?php
 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if($_SESSION['clientID'] == '999' ){
        $url='adminWarren.php';
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
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
        <title>Home</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="js/jquery-1.12.0.js"></script>
    
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <?php 
        include 'scripts/favIcon.php';
        ?>
        
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
        
        <div class="row"  id="body" >
            <div class="col-md-6 col-md-push-3"  id="browse">
                <form method="post" enctype="multipart/form-data" action="scripts/upload.php">
                    <h2 class="text-center text-info">Upload Files</h2>
                    <div class="row">
                        <div class="input-group marginThis">
                            <span class="input-group-btn">
                                <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Browse</span>
                                    <input name="userfile" id="userfile" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                                </span>
                            <span class="form-control"></span>
                        </div>
                    </div>
                        <input name="upload" type="submit" class="btn btn-primary center-block" id="upload" value="upload ">    
                    
                </form>
            </div>
            
            
            <div style="margin-left: 100px; margin-right: 100px;">
                <?php

                    include 'scripts/openDB.php';

                    

                    $link = mysqli_connect($host, $user, $password, $database);

                    $query30 = "SELECT * FROM `upload` where id = ".$_SESSION['clientID']." ORDER BY date DESC"; 
                    
                    $res = mysqli_query($link,$query30);
                    
                    $uploadInfo = mysqli_num_rows($res);
                    
                    if($uploadInfo>0){
                        echo "<br><br><br><br><br>";
                        echo '<div class=" .table-responsive">';
                        echo "<table class='table table-hover'>"; 
                        echo '<caption><h3> Recent Uploads  <h3></caption>';
                        echo '<tr class="info"><th>Time Uploaded</th><th>File Name</th><th>Opions</th></tr>';
                        
                        while($row1 = mysqli_fetch_array($res)){
                            $date = $row1['date'];
                            echo "<tr class = 'active' ><td>" . $row1['date'] . "</td><td><a href='scripts/download.php?time=" .$date. "&id=".$row1['id']."' target='_blank'>" . $row1['name'] . "</a></td><td><a href='scripts/delete.php?time=" .$date. "&id=".$row1['id']."' target='_blank'>Delete File</td></a></tr>";  
                        }

                        echo "</table></div>"; 
                    }
                    mysqli_close($link);


                ?>
            </div>
            
        
        
        </div>
        
        
        
    <script>
            $("#body").height(($(window).height()));
            
    </script>    
    </body>
</html>
