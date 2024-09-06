<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Page</title>
       <link href="css\style.css" rel="stylesheet">
       <link href='css/style.css' rel='stylesheet'>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
       <script type="text/javascript" src="script/javascript.js"></script>
       
    </head>

<body>
<script>
    console.log("Script loaded");
function showform() {
    var rad1 = document.getElementById('rad1');
    var rad2 = document.getElementById('rad2');
    var form1 = document.getElementById("form-1");
    var form2 = document.getElementById("form-2");
    form1.style.display = 'none';
    form2.style.display = 'none';
    if (rad1.checked) {
        form1.style.display = 'block';
    }
    else if (rad2.checked) {
        form2.style.display = 'block';
    }
}
</script>
    <div class="menu">
        <div class="leftmenu">
          <h1 style="padding-top:20px; margin-right: auto; margin-left:20px; ">SMART BOYS</h1>
        </div>

        <div class="rightmenu">
          <ul>
            <li id="firstlist"></li>
            <li><a href="php/logout.php"><b>Logout</b></a>
          </ul>
        </div>
      </div>
    <div style="text-align:center">
        <h1>Welcome to the Edit Page</h1>
        <p style="color:white; font-size:25px">select one</p>
        <label for="rad1" style="color:white; font-size:25px">Teams </label>
        <input type="radio" id="rad1" onclick="showform()" name="forms">&nbsp;
        <label for="rad2" style="color:white; font-size:25px">Matches </label>
        <input type="radio" id="rad2" onclick="showform()" name="forms">&nbsp;
        <div id="form-1" style="display:none">

            <style>
                h4{
                    font-size: 30px;
                }
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
                    width: 80%;
                    border-collapse: collapse;
                    margin: 5px 0;
                    font-size: 16px;
                    opacity: 90%;
                    margin-left: auto;
                    margin-right:auto;
                }
                th, td {
                    border: 1px solid #000;
                    padding: 10px;
                    text-align: center;
                }
                .matchedit{
                background: none!important;
                border: none;
                padding: 0!important;
                color: #069;
                text-decoration:none;
                cursor: pointer;
                font-size: 20px;
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
            <div>
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
            <a class="btn btn-primary" role="button" aria-disabled="true" href="teamentring.html">ADD NEW TEAM</a>
            <?php
                    $query="select * from teams";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)> 0)
                        echo '<a class="btn btn-primary" role="button" aria-disabled="true" href="teamdeleting.html">DELETE TEAM</a>';
            ?>
        </div>
        <div id="form-2" style="display:none">
        <table>
                <tr>
                    <th>NO</th>
                    <th>Home Team</th>
                    <th>Home goals</th>
                    <th>Away Team</th>
                    <th>Away goals</th>
                    <th>Done</th>
                </tr>
                <?php
                    $query="select * from matches";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result))
                    { ?>
                    <tr>
                        <form action="goal.php" method="post">
                        <td><button type="submit" name="matchno" class="matchedit" value="<?php echo $row["match_no"] ?>"><?php echo $row["match_no"] ?></button></td>
                        <td><?php echo $row["home_team"] ?></td>
                        <td><?php echo $row["home_goals"] ?></td>
                        <td><?php echo $row["away_team"] ?></td>
                        <td><?php echo $row["away_goals"] ?></td>
                        <td><?php echo $row["done"] ?></td>
                        </form>
                    </tr>
                    <?php
                    }
                ?>
            </table>
            <a class="btn btn-primary" role="button" aria-disabled="true" href="matchentering.php">ADD MATCH</a>
        </div>
    </div>
    

</body>
</html>
