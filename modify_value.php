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
			<option hidden selction>--select a column --</option>
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

    	if($id && ($column != "--select a column") && $value){
    		$sql = "UPDATE items SET $column = '$value' WHERE Id = $id";
    		$conn->query($sql);
    		echo "Modified successfully.";
    	}else{
    		echo "Required fields are missing.";
    	}
    }
    $conn->close();
?>
</body>
</html>