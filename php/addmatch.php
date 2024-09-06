<?php
include("connection.php");


$hometeam = $_POST["hometeam"];
$awayteam = $_POST["awayteam"];
if ($hometeam != $awayteam) {
$sql="insert into matches(home_team,away_team)values ('$hometeam','$awayteam')";
mysqli_query($con,$sql);
header("location:../edit_page.php");
}
else {
    echo "<html><br><h1>HOME AND AWAY TEAM CANNOT BE THE SAME ONE</h1><html>";
    echo "<html><br><a href='../matchentering.php'><h1>go back to match entering</h1><a><html>";
    echo "<html><br><a href='../edit_page.php'><h1>go back to edit page</h1><a><html>";
}


?>