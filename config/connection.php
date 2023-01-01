<!-- This is the file for database connection -->
<?php
    $server='127.0.0.1';
    $username='root';
    $password='';
    $dbname='imarika';

    $conn=mysqli_connect($server,$username,$password,$dbname);

    if(!$conn){
        die(mysqli_error($conn));
    }

?>
