<?php
// establish database connection
try
{
	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');                                       //Get host from OpenShift
	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');                                       //Get Port from OpenShift
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');                                   //Get UserName from OpenShift
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');                               //Get Password from OpenShift
	$dbName = "homepage";                                                              //Assign a static Database name
	$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);  //create a secure database variable
	//commit to database
	// start post
	if(isset($_POST)){
		$content = htmlspecialchars($_POST['contact_list']);
		$book = $_POST["book"];
		$chapter = $_POST["chapter"];
		$verse = $_POST["verse"];
		// begin transaction
		$db->beginTransaction();
		$stmt = $db->prepare('INSERT INTO `scriptures` (book, chapter, verse, content) VALUES (?, ?, ?, ?)');
		$stmt->bindParam(1, $book);
		$stmt->bindParam(2, $chapter);
		$stmt->bindParam(3, $verse);
		$stmt->bindParam(4, $content);
		$stmt->execute();
		// get id from insert for use in other table
		$lastInsertID = $db->lastInsertId();
		/*
		***********************************************
		insert a new scripture along with its topics
		***********************************************
		relation is the table to create relation between topic and scriptures
		scripture_id - refers to id in scriptures table
		topic_id - refers to id in topics table
		Faith - id =1
		Sacrifice - id =2
		Charity - id =3
		*/
		if(!empty($_POST['topic'])) {
			foreach($_POST['topic'] as $tpc) {
				$tpc_id = 1;
				switch ($tpc) {
					case "Faith":
					$tpc_id = 1;
					break;
					case "Sacrifice":
					$tpc_id = 2;
					break;
					case "Charity":
					$tpc_id = 3;
					break;
				}
				$stmt = $db->prepare('INSERT INTO `relation` (scripture_id, topic_id) VALUES (?, ?)');
				$stmt->bindParam(1, $lastInsertID);
				$stmt->bindParam(2, $tpc_id);
				$stmt->execute();
			}
		}
		//the topic table and commit transaction
		$db->commit();
	}
	//End post
}
catch (PDOException $ex) //If database cannot be reliably accessed, abort.
{
	echo 'Error!: ' . $ex->getMessage();
	die();
}


/*
**********************
lists all the scriptures in the database, with associated topics
**********************
*/
echo '<p>';
foreach ($db->query('SELECT topics.name as TopicName, scriptures.book as Book, scriptures.verse as Verse, scriptures.chapter as Chapter, scriptures.content as Content
FROM relation
INNER JOIN scriptures
ON relation.scripture_id = scriptures.id
INNER JOIN topics
ON relation.topic_id = topics.id') as $row) {
	echo '<b>'.$row['TopicName'].'</b> - '.$row['Book'].':'.$row['Verse'].':'.$row['Chapter'].':'.$row['Content']'<br />';
}
echo '</p>';
		?>
		