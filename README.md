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
