<?php require("script.php") ?>
<?php require("script1.php") ?>
<?php require("statScript.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="How to store form data in a json file with php">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>StreetBall - MEDIAMANIA</title>
</head>
<body>
	<h1> MEDIAMANIA</h1>
	<form action="" method="post">
		<div class="TEAM1">
			<h3>TEAM1</h3>
			<label>TEAM1 NAME</label>
			<input type="TEXT" name="TEAM1NAME" value="">
			<label>PLAYER 1</label>
			<input type="TEXT" name="PLAYER1" value="">
			<label>PLAYER 2</label>
			<input type="TEXT" name="PLAYER2" value="">
			<label>PLAYER 3</label>
			<input type="TEXT" name="PLAYER3" value="">
			<label>PLAYER 4</label>
			<input type="TEXT" name="PLAYER4" value="">
		</div>
		<div class="TEAM2">
			<h3>TEAM2</h3>
			<label>TEAM2 NAME</label>
			<input type="TEXT" name="TEAM2NAME" value="">
			<label>PLAYER 1</label>
			<input type="TEXT" name="PLAYER5" value="">
			<label>PLAYER 2</label>
			<input type="TEXT" name="PLAYER6" value="">
			<label>PLAYER 3</label>
			<input type="TEXT" name="PLAYER7" value="">
			<label>PLAYER 4</label>
			<input type="TEXT" name="PLAYER8" value="">
			<input type="submit" name="info" value="Send">
		</div>
	</form>
	<div class="butt">
		<head>
			<link rel="stylesheet" href="styles.css">
			<title>Title of the document</title>
		</head>
		<body>
			<a href="stat.php" class="button">START GAME</a>
			<a href="index.php" class="button">BACK</a>
		</body>
	</div>
</body>

</html>