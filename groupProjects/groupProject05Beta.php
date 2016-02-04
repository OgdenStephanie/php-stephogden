<html>
<head>
  <title>Week 05 Project</title>
  <link rel="stylesheet" type="text/css" href="../homepageStyles.css">
  <link href='https://fonts.googleapis.com/css?family=Permanent+Marker|Special+Elite' rel='stylesheet' type='text/css'>
</head>
<body>
  <h1>Scripture References</h1>
  <?php
    try
    {
      $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');                                       //Get host from OpenShift
      $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');                                       //Get Port from OpenShift
      $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');                                   //Get UserName from OpenShift
      $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');                               //Get Password from OpenShift
	  $dbName = "homepage";                                                              //Assign a static Database name
	  $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);  //create a secure database variable
	  echo '<p>';
	  
	  //Loop for each row in the selected table, writing the contents of the book, chapter, verse, and content columns
	  foreach ($db->query('SELECT * FROM GroupProject05') as $row) {
        echo '<b>'.$row['book'].' '.$row['chapter'].':'.$row['verse'].'</b> - '.$row['content'].'<br />';
      }
	  echo '</p>';
    }

    catch (PDOException $ex) //If database cannot be reliably accessed, abort.
    {
      echo 'Error!: ' . $ex->getMessage();
      die(); 
    }
  ?>
</body>
</html>