<?php
include("connection.php");

$scorer = $_POST["scorer"];
$assister = $_POST["assist"];
$matchno = $_POST["matchno"];
$sql="select * from players where name='$scorer'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$teamname = $row['team_name'];
$scorer_id = $row['id'];
$sql="select * from players where name='$assister'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$assister_id = $row['id'];
if(($assister_id != null) and ($scorer_id != null))
{
    $sql="insert into goals values ($matchno,'$teamname',$assister_id,$scorer_id)";
    echo $sql;
    mysqli_query($con,$sql);
    header("location:../goal.php");
}
 else {
    echo "<html><br><h1>invalid players</h1><html>";
    echo "<html><br><a href='../goal.php'><h1>go back to goal entering</h1><a><html>";
 }
?>
