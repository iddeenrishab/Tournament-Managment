<!DOCTYPE html>
<html lang="en">
<head>
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
    <h1>POINT TABLE</h1></div>
    <table>
        <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Matches played</th>
            <th>Wins</th>
            <th>Loss</th>
            <th>Goal Scored</th>
            <th>Goal conceeded</th>
            <th>Goal iff</th>
            <th>Points</th>
        </tr>
        <?php
            include("php/connection.php");
            $query="select * from teams order by points desc";
            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($result))
            { ?>
            <tr>
                    <td><?php echo $row["team_no"] ?></td>
                    <td><?php echo $row["team_name"] ?></td>
                    <td><?php echo $row["matches_played"] ?></td>
                    <td><?php echo $row["wins"] ?></td>
                    <td><?php echo $row["loss"] ?></td>
                    <td><?php echo $row["goal_scored"] ?></td>
                    <td><?php echo $row["goal_conceeded"] ?></td>
                    <td><?php echo $row["goal_diff"] ?></td>
                    <td><?php echo $row["points"] ?></td>
            </tr>
            <?php
            }
        ?>
    </table>
</body>
</html>
