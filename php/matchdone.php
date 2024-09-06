<?php
include("connection.php");
$match=$_SESSION['matchno'];
echo $match;
$sql="update matches set done='yes' where match_no=$match";
echo $sql;
mysqli_query($con,$sql);
header("location:../edit_page.php");
?>