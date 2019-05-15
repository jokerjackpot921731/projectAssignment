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

#lightTable {
    border-collapse: collapse;
    width: 100%;
    border: 2px solid #ddd;
    font-size: 18px;
}

#lightTable th, #lightTable td {
    text-align: left;
    padding: 12px;
    border: 1px solid #ddd;
}

#lightTable tr {
    border-bottom: 1px solid #ddd;
}

#lightTable tr.header, #lightTable tr:hover {
    background-color: #f1f1f1;
}

#darkTable {
    border-collapse: collapse;
    background-color: #8a8a5c;
    width: 100%;
    border: 2px solid #ddd;
    font-size: 18px;
}

#darkTable th, #darkTable td {
    text-align: left;
    padding: 12px;
    border: 1px solid #ddd;
}

#darkTable tr {
    border-bottom: 1px solid #ddd;
}

#darkTable tr.header, #darkTable tr:hover {
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

    <form action="" method="post" style="padding-bottom: 20px">
    <input type="radio" name="radio" value="dark">Dark background
    <input type="radio" name="radio" value="light">Light background
    <input type="submit" name="submit" value="Select background font" />
    </form>

    <?php
        $servername = "localhost";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $dbname);
        // Use test database
        $use = "USE test";
        $conn->query($use);

        // set cookie
        $cookieName = 'backgroundCookie';
        $cookieValue = 'light';
        if (isset($_POST['submit'])) {
            if(isset($_POST['radio']))
            {
                $cookieName = 'backgroundCookie';
                $cookieValue = $_POST['radio'];
            }
        }
        setcookie($cookieName, $cookieValue, time() + (3600), "/");
        if ($_COOKIE[$cookieName] == 'dark') {
            //query all database
            $query = "SELECT * FROM items"; 
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                echo "<table id=\"darkTable\">";
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
                    // echo split(",", $row['code'] [, int $limit = -1 ]);
                    echo "<td>".$row['code']."</td>"; 
                    echo "<td>".$row['status']."</td>"; 
                    echo "<td>".$row['timeDeli']."</td>"; 
                    echo "</tr>"; 
                    // $arrayName = split(",", $row['code']);
                    // echo $arrayName;
                }
                echo "</table>";
            } else {
                echo "Table has been deleted";
            }
        } else {
            //query all database
            $query = "SELECT * FROM items"; 
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                echo "<table id=\"lightTable\">";
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
                    // echo split(",", $row['code'] [, int $limit = -1 ]);
                    echo "<td>".$row['code']."</td>"; 
                    if ($row['status'] == 'Delivered') {
                        echo "<td style=\"background-color: #00cc44\">".$row['status']."</td>";
                    } else {
                        if ($row['status'] == 'Return check') {
                            echo "<td style=\"background-color: #ff1a1a\">".$row['status']."</td>";
                        } else {
                            echo "<td>".$row['status']."</td>";
                        }
                        
                    }
                    echo "<td>".$row['timeDeli']."</td>"; 
                    echo "</tr>"; 
                    // $arrayName = split(",", $row['code']);
                    // echo $arrayName;
                }
                echo "</table>";
            } else {
                echo "Table has been deleted";
            }
        }

        // $drop = "DROP TABLE items";
        // $conn->query($drop);

        // $sql = "CREATE TABLE items (
        // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        // name TEXT NOT NULL,
        // product TEXT NOT NULL,
        // quality TEXT NOT NULL,
        // code TEXT,
        // status TEXT,
        // timeDeli TEXT,
        // isDelivered BOOLEAN DEFAULT '0',
        // haveCode BOOLEAN DEFAULT '0'
        // )";
        // $conn->query($sql);

        // //sql insert a document
        // $sql1 = "INSERT INTO Items (name, product, quality, code, status, timeDeli)
        // VALUES ('Su tu', 'https://vi.wikipedia.org/wiki/S%C6%B0_t%E1%BB%AD', '3', '485921176180,1LS7261053992577-1', '', '')";
        // $sql2 = "INSERT INTO Items (name, product, quality, code, status, timeDeli)
        // VALUES ('Heo', 'https://vi.wikipedia.org/wiki/L%E1%BB%A3n_nh%C3%A0', '3', '464131010998', '', '')";
        // $conn->query($sql1);
        // $conn->query($sql2);

        

        $conn->close()
    ?>
    <script>
    function myFunction() {
      var input, filter, table, rows, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("lightTable");
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
