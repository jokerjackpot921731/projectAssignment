Install
- Install xampp: https://www.apachefriends.org/download.html
- Install sublime text 3: https://www.sublimetext.com/3

Build
- Git clone link in htdocs folder
- Browser: localhost/projectAssignment/file_name.php

Connect mysql
  ```$servername = "localhost";
  $dbname = "test";
  // Create connection
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
