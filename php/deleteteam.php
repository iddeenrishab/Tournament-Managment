<?php
include("connection.php");


$teamname = $_POST["teamname"];
$sql="select * from teams where team_name like '$teamname'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)> 0)
{
    $sql2="delete from teams where team_name like '%$teamname%'";
    mysqli_query($con,$sql2);
    header("location:../edit_page.php");
}
else{
    echo "<html><br><h1>invalid team name</h1><html>";
    echo "<html><br><a href='../teamdeleting.html'><h1>go back to team deleting</h1><a><html>";
    echo "<html><br><a href='../edit_page.php'><h1>go back to edit page</h1><a><html>";
}


?>