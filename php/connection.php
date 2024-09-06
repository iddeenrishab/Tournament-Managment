<?php
$con=mysqli_connect("localhost","root","","trial-2");
if(!$con)
{
    echo "errorr!!!!!!";
    exit;
}
else{
    session_start();
}
?>