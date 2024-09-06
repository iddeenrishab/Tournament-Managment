<?php
include("php/connection.php");
if(isset($_POST["matchno"])){
$match=$_POST["matchno"];
$_SESSION['matchno']=$match;
}
else{
    $match= $_SESSION['matchno'];
}
$sql="select * from matches where match_no='$match'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$done = $row['done'];
if($done== 'yes')
{
    header("location:edit_page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            
        background-image: url("images/images.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        
      
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
        }
        .done-form button {
            width: 100%;
            padding: 10px;
            background-color: #dc3545;
            color: #;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        
        .login-container {
            background-color: #fff ;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div  class="login-container">
        <form action="php/addgoal.php" method="post" class="login-form">
            <input type="text" placeholder="goal_scorer" name="scorer" required>
            <input type="text" placeholder="assist" name="assist" required>
            <input type="text" style="display:none" value="<?php echo $match ?>" name="matchno" required >
            <button type="submit" name="submit" value="submit">Enter goal</button><br><br>
        </form>
    </div>
    <div  class="login-container">
    <form action="php/matchdone.php" method="post" class="done-form">
        <button type="submit" name="submit" value="submit" >MATCH DONE</button><br><br>
        </form>
    </div>
</body>
</html>




    
