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
  $sql = "CREATE TABLE Items (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(50) NOT NULL,
  product VARCHAR(50) NOT NULL,
  quality VARCHAR(30) NOT NULL,
  code VARCHAR(50),
  status VARCHAR(50),
  timeDeli VARCHAR(50),
  orderBy VARCHAR(50),
  isDelivered BOOLEAN,
  haveCode BOOLEAN
  )";
  $conn->query($sql);
