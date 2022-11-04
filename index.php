<?php
$servername = "tp-eva-sql-cont";
$dbname = "liste";
$username = "root";
$password = "Not24get";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO liste (note) VALUES ('" . $_POST['note'] . "')";

		if ($conn->query($sql) === TRUE) {
			echo "";
		} else {
			echo "Erreur: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT note FROM liste";
$result = $conn->query($sql);

echo "<h1>Liste des courses :</h1><br><br>";
if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		echo "- ". $row["note"]. "<br>";
	}
} else {
	echo "0 results";
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>GFG- Store Data</title>
</head>

<body>
	<form action="" method="post">
		<p>Formulaire pour ajouté notes :</p>
		<p>
			<label for="note">Note :</label>
			<input type="text" name="note" id="note">
		</p>

		<input type="submit" value="Submit">
	</form>
</body>

</html>
