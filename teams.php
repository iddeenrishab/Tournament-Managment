<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams Page</title>
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
        button {
        background: none!important;
        border: none;
        padding: 0!important;
        color: #069;
        text-decoration:none;
        cursor: pointer;
        font-size: 20px;
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
    <div>
    <h1>SOCCER LEAGUE TEAMS</h1></div>
    <table>
        <!-- Your table headers -->
        <tr>
            <th>NO</th>
            <th>Name</th>
        </tr>
        <?php
            include("php/connection.php");
            $query="select * from teams";
            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result))
            { ?>
            <tr>
                <form action="show_player.php" method="post">
                    <td><?php echo $row["team_no"] ?></td>
                    <td><button type="submit" name="teamname" value="<?php echo $row["team_name"] ?>"><?php echo $row["team_name"] ?></button></td>
                </form>
            </tr>
            <?php
            }
        ?>
    </table>
</body>
</html>
