<?php
$connection = mysqli_connect('localhost', 'root','password', 'blog');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'test');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
     
?>     
     $sql = new mysqli('localhost','root','password','dbname');
     
     <?php
    $server='localhost';
    $username='root';
    $password='';
    $db_name='web_forum_db';

    if(!$conn=mysqli_connect($server,$username,$password))
    {
        exit('Error: could not establish database connection');
    }

    if (!mysqli_select_db($conn,$db_name))
     {
        exit('Error: could not select the database');
    }
    mysqli_close($conn);
?>
     