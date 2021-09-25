<?php

$servername = "localhost";
$username="root";
$password = "";
$database = "foodie";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$database);

// Check connection
if(!$conn)
{
    die("Sorry we failed to connect" . mysqli_connect_error());
}

?>
