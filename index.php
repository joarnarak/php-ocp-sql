<h1>Hello World!</h1>
 <?php
$servername = "mysql";
$serverport = "3306";
$username = "test";
$password = "test";
$dbname = "sampledb";

// Create connection
$conn = new mysqli($servername.':'.$serverport, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT customerName, creditLimit FROM customers WHERE country LIKE '%Spain%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	echo "<table border='1'>
              <tr>
	      <th>Name</th>
	      <th>Credit Limit</th>
              </tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>" . $row["customerName"] . "</td>";
	echo "<td>" . $row["creditLimit"]. "</td>";
	echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
