<!DOCTYPE html>
<html>
	<head>
		<meta name="input" content="width=device-width, initial-scale=1">
		<style type="text/css">
			* {
 				 box-sizing: border-box;
			}
			/*class containers*/
			.container {
 				 padding: 16px;
			}
			/*full-width input field*/
			input[type=text], input[type=password] {
				width: 100%;
				padding: 15px;
				margin: 5px 0 22px 0;
				display: inline-block;
				border: none;
				background: #f1f1f1f1;
			}
			input[type=text]:focus, input[type=password]:focus{
				background-color: #ddd;
				outline: none;
			}
			input[type=number], input[type=number] {
				width: 100%;
				padding: 15px;
				margin: 5px 0 22px 0;
				display: inline-block;
				border: none;
				background: #f1f1f1f1;
			}
			/* Set a style for the submit/register button */
			.submit {
			  background-color: #07A7F9;
			  color: white;
			  padding: 16px 20px;
			  margin: 8px 0;
			  border: none;
			  cursor: pointer;
			  width: 100%;
			  opacity: 0.9;
			}

		</style>
	</head>
	<body>
		<h2 style="text-align: center;">INSERT PRODUCT INFORMATION</h2>
		<form action="input.php" method="POST">
			<div class="container">
			Product link: <input type="text" name="link" /><br><br>
			Quantity: <input type="number" name="quantity" /><br><br>
			Code: <input type="text" name="code" /><br><br>
			<input class="submit" type ="submit" name="submit" value="Save"/>
		</div>
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
					if ($quantity < 0){
					echo "Please enter the greater-than-0 number.";
				}else{
						$sql = "INSERT INTO items (product, quality, code)
						VALUES ('$link', $quantity, '$code')";
						$conn->query($sql);
			            echo "Insert information successfully.";
		        	}
				}else{
		  			echo "Required fields are missing.";
				}
			}
        	$conn->close();
 		?>
	</body>
</html>