<?php

$conn = new mysqli('localhost','root','','bdgdlwebcamp');

if($conn->connect_error)
{
    
    echo $error -> $conn->connect_error;
}

?>