<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("Crud.php");
include_once("Validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {	
	$name = $crud->escape_string($_POST['nama']);
	$age = $crud->escape_string($_POST['umur']);
	$email = $crud->escape_string($_POST['email']);
		
	$msg = $validation->check_empty($_POST, array('nama', 'umur', 'email'));
	$check_age = $validation->is_age_valid($_POST['umur']);
	$check_email = $validation->is_email_valid($_POST['email']);
	
	// checking empty fields
	if($msg != null) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} elseif (!$check_age) {
		echo 'Please provide proper age.';
	} elseif (!$check_email) {
		echo 'Please provide proper email.';
	}	
	else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = $crud->execute("INSERT INTO users(nama,umur,email) VALUES('$name','$age','$email')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>