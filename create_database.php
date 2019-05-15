<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
  $servername = "localhost";

  // Creating connection
  $conn = new mysqli($servername);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  // Creating a database named newDB
  $sql = "CREATE DATABASE test";
  if ($conn->query($sql) === TRUE) {
	 echo "Database created successfully with the name test";
  } else {
	 echo "Error creating database: " . $conn->error;
  }
  $dbname = "test";

  // Create new connection
  $conn = new mysqli($servername, $dbname);

  // Use test database in any html page
  $use = "USE test";
  $conn->query($use);
  
  //create table items
  $sql = "CREATE TABLE items (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name TEXT NOT NULL,
  product TEXT NOT NULL,
  quality TEXT NOT NULL,
  code TEXT,
  status TEXT,
  timeDeli TEXT,
  isDelivered BOOLEAN DEFAULT '0',
  haveCode BOOLEAN DEFAULT '0'
  )";
  $conn->query($sql);
  ?>

</body>
</html>