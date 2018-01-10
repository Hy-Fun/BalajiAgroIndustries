<?php 
    
    $date = filter_input(INPUT_GET,'time');
    $clientID = filter_input(INPUT_GET,'id');
    if(!$_SESSION['userID'] === '999' || $_SESSION['clientID'] === $clientID){
        $url='../home.php';
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }    

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete File</title>
    </head>
    <body>
        Do you really want to delete this file?<br><?php echo "<a href='deleted.php?time=" .$date. "&id=".$clientID."'>yes</a>" ?>
        &nbsp;&nbsp;<a href="../home.php">no</a>
    </body>
</html>
