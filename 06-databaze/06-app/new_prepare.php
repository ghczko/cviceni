<?php

require 'db.php';
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$salary = (float)$_POST['salary'];
	$note = $_POST['note'];
	
	$stmt = $db->prepare("INSERT INTO clients(first_name, last_name, salary, note) VALUES (?, ?, ?, ?)");
	$stmt->execute(array($first_name, $last_name, $salary, $note));
	
	//nebo s named parameters
	//$stmt = $db->prepare("INSERT INTO clients(first_name, last_name, salary, note) VALUES (:first_name, :last_name, :salary, :note)");
	//$stmt->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':salary' => $salary, ':note' => $note));
	
	header('Location: index.php');
	
	/* SQL INJECT ATTACK NEFUNGUJE
	'); DELETE FROM clients; --
	*/

}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>PHP Clients App</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	
	<h1>New client</h1>

	<form action="" method="POST">
	  
		First Name<br/>
		<input type="text" name="first_name" value="" placeholder=""><br/><br/>
	  
		Last Name<br/>
		<input type="text" name="last_name" value=""><br/><br/>
		
		Salary<br/>
		<input type="text" name="salary" value=""><br/><br/>
		
		Note<br/>
		<textarea name="note"></textarea><br/><br/>
				
		<br/>
		
		<input type="submit" value="Save"> or <a href="/">Cancel</a>
		
	</form>

</body>

</html>
