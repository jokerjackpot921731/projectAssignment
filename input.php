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
			input[type=text], input[type=text] {
				width: 100%;
				padding: 15px;
				margin: 5px 0 22px 0;
				display: inline-block;
				border: none;
				background: #f1f1f1f1;
			}
			input[type=text]:focus, input[type=text]:focus{
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
			  color: black;
			  font-size: 20px;
			  padding: 16px 0px;
			  position: absolute;
			 			  margin-left: -350px;
			  border: none;
			  cursor: pointer;
			  width: 50%;
			  opacity: 0.9;
			  font-weight: bold;
			  font-family: "Times New Roman", Times, serif;
			}

		</style>
	</head>
	<body>
		<h2 style="text-align: center;">INSERT PRODUCT INFORMATION</h2>
		<form action="input.php" method="POST">
			<div class="container">
			Name : <input type="text" name="name" /><br><br>
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
	        	$name = isset($_POST['name']) ? $_POST['name'] : '';
		        $link = isset($_POST['link']) ? $_POST['link'] : '';
				$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
				$code = $_POST['code'] ? $_POST['code'] : '';

				if ($link && $quantity && $name){
					if((strlen($name) <= 50) && (strlen($quantity) <= 30) && (strlen($code) <= 50 )){
						if ($quantity < 0){
							echo "Please enter the greater-than-0 number.";
						}else{
						$sql = "INSERT INTO items (name, product, quality, code)
						VALUES ('$name', '$link', $quantity, '$code')";
						$conn->query($sql);
			            echo "Insert information successfully.";
		        		}
		        	}else{
		        	echo "Data is too long to storage.";
		    		}
				}else{
		  			echo "Required fields are missing.";
				}
			}
        	$conn->close();
 		?>
	</body>
</html>