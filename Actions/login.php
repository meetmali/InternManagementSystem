<?php
include('connect.php');
// session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from interns where intern_username = '$username' and intern_password = '$password';";
$result = $conn->query($query);
if ($result->num_rows > 0) {
	echo "<table>";
    echo "<tr><th>Column 1</th><th>Column 2</th><th>Column 3</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["intern_id"] . "</td>";
        echo "<td>" . $row["intern_name"] . "</td>";
        echo "<td>" . $row["intern_username"] . "</td>";
        echo "<td>" . $row["intern_phone"] . "</td>";
        echo "<td>" . $row["intern_password"] . "</td>";
        echo "<td>" . $row["intern_email"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}
// $dataIntern = $_SESSION['dataIntern'];
// $result = mysqli_query($GLOBALS['conn'], $query);
// 	$data = mysqli_fetch_all($result);
// 	// if ($data) {
// 	// 	// return $data[0];
// 	// }
echo "username is $username and password is $password<br>";
?>
<!-- <?php
for ($i = 0; $i < 10; $i++) {
    echo "$dataIntern[0][$i]";
}
?> -->