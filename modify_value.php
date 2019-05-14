<!DOCTPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 style="text-align: center;">MODIFY INFORMATION</h2>
	<form action="modify_value.php" method="POST">
	<div class="container">
		Id : <input type="text" name="id" /><br><br>
		Column:
		<select id='column' name='column'>
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