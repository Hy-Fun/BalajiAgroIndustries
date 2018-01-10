<?php



session_start();


include 'openDB.php';

            
        $link = mysqli_connect($host, $user, $password, $database);
            
         
if ($_FILES['userfile']['size'] > 0 ){

 $fileName = $_FILES['userfile']['name'];
 $tmpName  = $_FILES['userfile']['tmp_name'];
 $fileSize = $_FILES['userfile']['size'];
 $fileType = $_FILES['userfile']['type'];

 $fp      = fopen($tmpName, 'r');
 $content = addslashes( fread($fp, filesize($tmpName)));
 fclose($fp);

 if(!get_magic_quotes_gpc())
 {
     $fileName = addslashes($fileName);
 }

$num = $_SESSION['clientID'];

 $query = "INSERT INTO upload (id,name, size, type, content ) ".
 "VALUES ('$num','$fileName', '$fileSize', '$fileType', '$content')";

mysqli_query($link,$query) or die('hello'); 



 
                    $url='../home.php';
                    ob_start();
                    header('Location: '.$url);
                    ob_end_flush();
                    die();
 
}

 else {
                    $url='../home.php';
                    ob_start();
                    header('Location: '.$url);
                    ob_end_flush();
                    die();
}