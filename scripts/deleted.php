<?php

            include 'openDB.php';


            $link = mysqli_connect($host, $user, $password, $database);

            if(!$link){
                echo 'Cannot connect to server...';
            }

            $date = filter_input(INPUT_GET,'time');
            $clientID = filter_input(INPUT_GET,'id');

            

                $query = "DELETE FROM upload WHERE date = '$date' AND id = '$clientID' LIMIT 1";
                $result = mysqli_query($link,$query);
                if($result){
                    $news = 'File Has Been Deleted Successfully!';
                }
                else{
                    $news = "An Error Ocuured While Deleting The File. Please Try Again!";
                }

        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
    </head>
    <body>
        <?php echo'<p>'.$news.'</p>'; ?>
    </body>
</html>
