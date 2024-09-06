CREATE TABLE teams
(
team_no int  NOT NULL AUTO_INCREMENT PRIMARY KEY,
team_name varchar(255) UNIQUE,
matches_played int default 0,
wins int default 0,
loss int default 0,
goal_scored int default 0,
goal_conceeded int default 0,
goal_diff int default 0,
points int default 0
);



CREATE TABLE players(id int primary key not null AUTO_INCREMENT,name varchar(255),position varchar(255) DEFAULT 'NOT SPECIFIED',team_name varchar(255),goal int default 0,assist int default 0,foreign key(team_name) REFERENCES teams(team_name) ON UPDATE CASCADE ON DELETE CASCADE);


CREATE TABLE matches(match_no int Primary key AUTO_INCREMENT,goal int default 0,
home_team varchar(255),home_goals int default 0,away_team varchar(255),away_goals int default 0,done ENUM('yes','no') DEFAULT 'no',foreign key(home_team) REFERENCES teams(team_name) ON UPDATE CASCADE ON DELETE CASCADE,foreign key(away_team) REFERENCES teams(team_name) ON UPDATE CASCADE ON DELETE CASCADE);




create table goals(match_no int,team_name varchar(255),assist_id int,id int,foreign key(id) REFERENCES players(id) ON UPDATE CASCADE ON DELETE CASCADE,foreign key(assist_id) REFERENCES players(id) ON UPDATE CASCADE ON DELETE CASCADE,foreign key(team_name) REFERENCES teams(team_name) ON UPDATE CASCADE ON DELETE CASCADE,foreign key(match_no) REFERENCES matches(match_no) ON UPDATE CASCADE ON DELETE CASCADE);

create table signup (email varchar(255),password varchar(255),username varchar(255));

drop trigger goal_t;
delimiter //
create trigger goal_t
before insert on goals
for each row
begin
DECLARE other_team varchar(255);
DECLARE homet varchar(255);
DECLARE awayt varchar(255);
SELECT home_team INTO homet FROM matches WHERE match_no=new.match_no;
SELECT away_team INTO awayt FROM matches WHERE match_no=new.match_no;
IF(new.team_name=homet) THEN
	SET other_team=awayt;
ELSE
	SET other_team=homet;
END IF;
UPDATE teams
SET goal_scored = goal_scored+1
WHERE teams.team_name =new.team_name;

UPDATE teams
SET goal_conceeded = goal_conceeded+1
WHERE teams.team_name =other_team;

UPDATE players
SET goal=goal+1
WHERE id=new.id;

UPDATE players
SET assist=assist+1
WHERE players.id=new.assist_id;

UPDATE matches
SET goal=goal+1
WHERE matches.match_no=new.match_no;

IF(new.team_name=homet) THEN
	UPDATE matches
	SET home_goals=home_goals+1
	WHERE matches.match_no=new.match_no;
ELSE
	UPDATE matches
	SET away_goals=away_goals+1
	WHERE matches.match_no=new.match_no;
END IF;

END //
delimiter ;


drop trigger point_t;
delimiter //
create trigger point_t
after update on matches
for each row
begin
DECLARE completed varchar(255);
DECLARE homet varchar(255);
DECLARE awayt varchar(255);
DECLARE other_team varchar(255);
DECLARE maxx INT;
DECLARE win varchar(255);
set completed=new.done;
IF(completed='yes') THEN
SELECT MAX(g) INTO maxx FROM (SELECT team_name, COUNT(*) AS g FROM goals WHERE goals.match_no = NEW.match_no GROUP BY team_name) AS subquery1;
SELECT team_name INTO win FROM (SELECT team_name, COUNT(*) AS g FROM goals WHERE goals.match_no = NEW.match_no GROUP BY team_name) AS subquery2 WHERE g=maxx;
set homet =new.home_team;
set awayt=new.away_team;
set completed=new.done;
IF(win=homet) THEN
	SET other_team=awayt;
ELSE
	SET other_team=homet;
END IF;


	UPDATE teams
	SET goal_diff=goal_scored-goal_conceeded WHERE team_name=homet;
	UPDATE teams
	SET goal_diff=goal_scored-goal_conceeded WHERE team_name=awayt;
	UPDATE teams
	SET points=points+3 WHERE team_name=win;
	UPDATE teams
	SET wins=wins+1 WHERE team_name=win;
	UPDATE teams
	SET loss=loss+1 WHERE team_name=other_team;
	UPDATE teams
	SET matches_played=matches_played+1 WHERE team_name=win;
	UPDATE teams
	SET matches_played=matches_played+1 WHERE team_name=other_team;
END IF;
END //
delimiter ;

