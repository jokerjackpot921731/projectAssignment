<!DOCTPE html>
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
			.select{
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
			  left: 50%;
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
	<h2 style="text-align: center;">MODIFY INFORMATION</h2>
	<form action="modify_value.php" method="POST">
	<div class="container">
		Id : <input type="text" name="id" /><br><br>
		Column:
		<select class="select" id='column' name='column'>
			<option value="error" hidden selection>--select a column--</option>
			<option value="name">Name Product</option>
			<option value="product">Link</option>
			<option value="quality">Quality</option>
			<option value="code">Code</option>
			<option value="status">Status</option>
			<option value="timeDeli">TimeDeli</option>
		</select>
		<br><br>
		Value: <input type="text" name="value" /><br><br>
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

    if(isset($_POST['submit'])){
    	$id = isset($_POST['id']) ? $_POST['id'] : '';
    	$value = isset($_POST['value']) ? $_POST['value'] : '';
    	$column = $_POST['column'];

    	// Check empty feilds
    	if($id && $value && ($column!=="error")){
    		// Check id is in database or not
    		$id_query = "SELECT id FROM items WHERE id = $id";
    		$check_id = $conn->query($id_query);
    		if($check_id->num_rows != 0){
    			switch ($column) {
    				case 'quality':
    					if(is_numeric($value)){
    						if($value > 0){
    							// Update value
				    			$sql = "UPDATE items SET $column = '$value' WHERE id = $id";
				    		    $conn->query($sql);
				    		    echo "Modified successfully.";
    						}else{
    							echo "Quantity must be equal or greater than 0.";
    						}
    					}else{
    						echo "Quantity should be a number.";
    					}
    					break;
    				case 'code':
    					if(strlen($value) < 30){
    						// Update value
			    			$sql = "UPDATE items SET $column = '$value' WHERE id = $id";
			    		    $conn->query($sql);
			    		    echo "Modified successfully.";
    					}else{
    						echo "Value is too long to storage.";
    					}
    					break;
    				default:
      					if(strlen($value) < 50){
    						// Update value
			    			$sql = "UPDATE items SET $column = '$value' WHERE id = $id";
			    		    $conn->query($sql);
			    		    echo "Modified successfully.";
    					}else{
    						echo "Value is too long to storage.";
    					}
    					break;
    			}
    		}else{
    			echo "There are no matched Id.";
    		}
    	}else{
    		echo "Required fields are missing.";
    	}
    }
    $conn->close();
?>
</body>
</html>