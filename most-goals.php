<?php
include("php/connection.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Most goals Page</title>
   
</head>
<body>

    <h1>Top Scorers</h1>
    <style>
        body {
          background-image: url("images/images.jpg");
          background-repeat: no-repeat;
          background-size: cover;
        }
        h1{
        text-align: center;
        color: rgb(8, 85, 8);
    
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
       <table>
        <!-- Your table headers -->
        <tr>
            <th>Name</th>
            <th>Team Name</th>
            <th>Goal Scored</th>
        </tr>
        <?php
            $query="select name,team_name,goal from players where goal>0 order by goal desc";
            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result))
            { ?>
            <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["team_name"] ?></td>
                    <td><?php echo $row["goal"] ?></td>
            </tr>
            <?php
            }
        ?>
    </table>
    

</body>
</html>
