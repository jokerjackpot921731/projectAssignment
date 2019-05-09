<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h2 style="text-align: center;">INSERT PRODUCT INFORMATION</h2>
		<form action="input.php" method="POST">
			Product link: <input type="text" name="link" /><br><br>
			Quantity: <input type="number" name="quantity" /><br><br>
			Code: <input type="text" name="code" /><br><br>
			<input class="submit" type ="submit" name="submit" value="Save"/>
		</form>
			<?php
		$servername = "localhost";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $dbname);

        // Use test database
        $use = "USE test";
        if (!$conn)
        {
        	die('Could not connect: '. mysql_error());
        }
        $conn->query($use);

        // Check null values
        if(isset($_POST['submit'])){
        $link = isset($_POST['link']) ? $_POST['link'] : '';
		$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
		$code = $_POST['code'] ? $_POST['code'] : '';

		if ($link && $quantity){
			$sql = "INSERT INTO items (product, quality, code)
			VALUES ('$link', $quantity, '$code')";
			$conn->query($sql);
            echo "Insert information successfully.";
		}else{
  			echo "Required fields are missing.";
		}
	}
        $conn->close();
 ?>
	</body>
</html>