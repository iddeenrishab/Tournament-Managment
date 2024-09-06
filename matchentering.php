<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding team</title>
   
</head>
<body>
    
    <style>
        body {
          background-image: url("images/images.jpg");
          background-repeat: no-repeat;
          background-size: cover;
        }
        h1{
        font-size: 60px;
        text-align: center;
        color: rgb(0, 0, 0);
        }
        form {
            background-color: #ffffff;
            padding: 30px;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #aaaaaa;
            opacity: 90%;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #aaaaaa;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            background-color: #333333;
            cursor: pointer;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 22px;
            opacity: 90%;
        }
        input[type="submit"]:hover {
            background-color: #444444;
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
       <h1>SOCCER LEAGUE TEAMS</h1></div>
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
               $query="select * from teams";
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
    <form action="php/addmatch.php" method="post" class="container">
        <h1>ADDING MATCH</h1>
            <label for="hometeam"><b>Team name</b></label><br>
            <input type="text" placeholder="Home_TEAM" name="hometeam" required><br><br>

            <label for="awayteam"><b>Team name</b></label>
            <input type="text" placeholder="Away_TEAM" name="awayteam" required>&nbsp;
            <input type="submit" name="submit" value="addmatch">
        </form>

</body>
</html>