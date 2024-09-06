<?php
include("php/connection.php");

$teamname = $_POST["teamname"];
$query="select * from players where team_name='$teamname'";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="HTML,CSS" />
    <meta name="description" content="come on.." />
    <title>Document</title>
    <style>
        body {
            background-image: url("images/images.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        div{
            
            text-decoration:double;
            border-width: 100%;
            background:rgba(0,0,0,0.5) ;
        }
        h1 {
            text-align: center;
            color: aliceblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 22px;
            opacity: 90%;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color:  #e5e5e5;
        }
    </style>
  </head>
  <body>
    <h1>Players of <?php echo $teamname ?> </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Goals</th>
            <th>Assist</th>
        </tr>
        <?php
        while($row=mysqli_fetch_array($result)){
            ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["position"] ?></td>
                        <td><?php echo $row["goal"] ?></td>
                        <td><?php echo $row["assists"] ?></td>
                    </tr>
                    <?php
                    }
         ?>   
    </body>
</html>
