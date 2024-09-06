<?php
include("connection.php");
if(isset($_session))
{
    session_destroy();
    header("location:../index.html");
}
else
{
    echo"You ae not logged in";
    header("location:../index.html");
}




?>