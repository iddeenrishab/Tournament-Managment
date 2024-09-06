<?php
include("connection.php");

if(isset($_SESSION["username"]))
{
    header("location:../edit_page.php");
}
else
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($password=='' OR $email=='')
    {
        echo "ENTER ALL THE VALUES BEFORE CLICKING SIGNUP";
        echo"<html><br><a href='../signup.html'><h1>signup</h1><a><html>";
    }
    else
    {
        $sql="select * from signup where email='$email' and password='$password'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if($num> 0)
        {
            $result=mysqli_query($con,"select username from signup where email='$email' and password='$password'");
            $row=mysqli_fetch_array($result);
            $username=$row["username"];
            echo "welcome $username";
            header("location:../edit_page.php");
            $_SESSION["username"]=$username;
        }
        else {
            header("location:../signup.html");
            echo "<script>alert('username and password not matching')</script>";
            
        }
    }
}
?>