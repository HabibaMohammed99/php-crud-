<?php

// connect to database
$conn = mysqli_connect('localhost','root','','ninga pizza');

//check connect
if(!$conn){
    echo 'connection error : '.mysqli_connect_error();
}

?>