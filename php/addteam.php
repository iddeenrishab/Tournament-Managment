<?php
include("connection.php");


$teamname = $_POST["teamname"];
$sql="insert into teams(team_name)value ('$teamname')";
mysqli_query($con,$sql);
for ($i = 1; $i <= 9; $i++) {
    $player = $_POST["player$i"];
    if(isset($_POST["player{$i}p"]))
    {
        $position=$_POST["player{$i}p"];
        $sql="insert into players(name,position,team_name) value('$player','$position','$teamname')";
    }
    else
    {
        $sql = "insert into players(name,team_name) value('$player','$team_name')";
    }
    mysqli_query($con,$sql);
}
header("location:../edit_page.php");


?>