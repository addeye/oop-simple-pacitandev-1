<?php
//including the database connection file
include_once 'Crud.php';

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
    <form action="add.php" method="post">
        <input type="text" name="nama">
        <input type="text" name="umur">
        <input type="text" name="email">
        <input type="submit" name="Submit" value="Submit">
    </form>
    <hr>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nama</td>
		<td>Umur</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	foreach ($result as $key => $res) {
	//while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nama']."</td>";
		echo "<td>".$res['umur']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>