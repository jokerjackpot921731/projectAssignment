<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 3px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

#search{
    display: flex;
}

#FirstRow {
    background-color: lightblue;
}

#abc{
    border: 1px solid #d9d9d9;
    border-right-color: #ffffff;
}
</style>
</head>
<body>

    <h2 style="text-align: center;">TRACKING CODE</h2>
    <div id="search">
        <img src="searchicon.png" alt="Trulli" width="40px" height="44px" id="abc">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    </div>

    <?php
        $servername = "localhost";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $dbname);
        // Use test database
        $use = "USE test";
        $conn->query($use);

        // //sql insert a document
        // $sql1 = "INSERT INTO Items (name, product, quality, code, status, timeDeli)
        // VALUES ('Su tu', 'https://vi.wikipedia.org/wiki/S%C6%B0_t%E1%BB%AD', '3', '675456456', 'transfering', '1 - Deli')";
        // $sql2 = "INSERT INTO Items (name, product, quality, code, status, timeDeli)
        // VALUES ('Heo', 'https://vi.wikipedia.org/wiki/L%E1%BB%A3n_nh%C3%A0', '3', '678675645', 'transfering', '2 - Deli')";
        // $conn->query($sql1);
        // $conn->query($sql2);

        //query all database
        $query = "SELECT * FROM items"; 
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            echo "<table id=\"myTable\">";
            echo "<tr id=\"FirstRow\">"; 
            echo "<th>Id</th>"; 
            echo "<th>Name Product</th>"; 
            echo "<th>Link</th>"; 
            echo "<th>Quality</th>"; 
            echo "<th>Code</th>"; 
            echo "<th>Status</th>"; 
            echo "<th>TimeDeli</th>"; 
            echo "</tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>"; 
                // foreach ($row as $value) {
                //     echo "<td>".$value."</td>";
                // }
                echo "<td>".$row['id']."</td>"; 
                echo "<td>".$row['name']."</td>"; 
                echo "<td><a href=\"".$row['product']."\">".$row['product']."</a></td>"; 
                echo "<td>".$row['quality']."</td>"; 
                echo "<td>".$row['code']."</td>"; 
                echo "<td>".$row['status']."</td>"; 
                echo "<td>".$row['timeDeli']."</td>"; 
                echo "</tr>"; 
            }
            echo "</table>";
        } else {
            echo "Table has been deleted";
        }

        $conn->close()
    ?>
    <script>
    function myFunction() {
      var input, filter, table, rows, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      rows = table.getElementsByTagName("tr");
      for (i = 0; i < rows.length; i++) {
        td = rows[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            rows[i].style.display = "";
          } else {
            rows[i].style.display = "none";
          }
        }       
      }
    }
    </script>
</body>
</html>
