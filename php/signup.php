<?php
include("connection.php");

$email = $_POST["email"];
$password = $_POST["password"];
$username= $_POST["username"];
if($password=='' OR $email=='' or $username=='')
{
    echo "ENTER ALL THE VALUES BEFORE CLICKING SIGNUP";
    echo"<html><br><a href='../signup.html'><h1>signup</h1><a><html>";
}
else
{
    $sql="select * from signup where email='$email'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num> 0)
    {
        echo "<script>alert('Email alredy exists!')</script>";
        header("location:../login.html");
        echo "<html><br><a href='../signup.html'><h1>signup</h1><a><html>";
        echo "<html><br><a href='../login.html'><h1>login</h1><a><html>";
    }
    else {
        $insert="insert into signup(email,password,username)VALUES ('$email','$password','$username')";
        mysqli_query($con,$insert);
        header("location:../login.html");

    }
}
?>