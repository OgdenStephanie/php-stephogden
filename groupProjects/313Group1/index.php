<html>
	<head>
		<title>
			Week 05 Project
		</title>
		<link rel="stylesheet" type="text/css" href="../homepageStyles.css">
		<link href='https://fonts.googleapis.com/css?family=Permanent+Marker|Special+Elite' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<h1>
			Scripture References
		</h1>
		
		<form action=“insert.php” method="POST">
			Book:
			<input type = "text" name = "book" />
			Chapter:
			<input type = "text" name = "chapter" />
			Verse:
			<input type = "text" name = "verse" />
			Content:
			<textarea name="content"></textarea>
			<?php
/*
******************************************
generate checkboxes for each topic contained in the DB table
******************************************
*/
foreach ($db->query('SELECT name FROM topics') as $row) {
	echo'<input type="checkbox" name="topic[]" value="'.$row.'" />';
}			?>
			<input type="submit" name="submit" value="submit"/>
		</form>
		
	</body>
</html>