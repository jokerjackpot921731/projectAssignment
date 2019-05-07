<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="home.css">
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
</head>
<body>

    <h2 style="text-align: center;">TRACKING CODE</h2>

    <?php
        $servername = "localhost";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $dbname);
        // Use test database
        $use = "USE test";
        $conn->query($use);

        // //create table items
        // $sql = "CREATE TABLE Items (
        // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        // product VARCHAR(50) NOT NULL,
        // quality VARCHAR(30) NOT NULL,
        // code VARCHAR(50),
        // status VARCHAR(50),
        // timeDeli VARCHAR(50),
        // orderBy VARCHAR(50)
        // )";
        // $conn->query($sql);

        // //sql insert a document
        // $sql1 = "INSERT INTO Items (product, quality, code, status, timeDeli, orderBy)
        // VALUES ('Con gau', '3', '123421313', 'transfering', '5 - Deli', 'Phucnv')";
        // $sql2 = "INSERT INTO Items (product, quality, code, status, timeDeli, orderBy)
        // VALUES ('Con gau', '3', '123421313', 'transfering', '5 - Deli', 'Phucnv')";
        // $conn->query($sql1);
        // $conn->query($sql2);

        //query all database
        $query = "SELECT * FROM items"; 
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            echo "<table>"; 
            echo "<tr id=\"FirstRow\">"; 
            echo "<th>Id</th>"; 
            echo "<th>Product link</th>"; 
            echo "<th>Quality</th>"; 
            echo "<th>Code</th>"; 
            echo "<th>Status</th>"; 
            echo "<th>TimeDeli</th>"; 
            echo "</tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>"; 
                echo "<td>".$row['id']."</td>"; 
                echo "<td><a href=\"".$row['product']."\">".$row['product']."</a></td>"; 
                echo "<td>".$row['quality']."</td>"; 
                echo "<td>".$row['code']."</td>"; 
                echo "<td>".$row['status']."</td>"; 
                echo "<td>".$row['timeDeli']."</td>"; 
                echo "</tr>"; 
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close()
    ?>

</body>
</html>
