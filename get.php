<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulaphp";
// PHP que retorna os games criados
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, nome, dtCriacao, qtd FROM quiz";
$result = mysqli_query($conn, $sql);
$data_items = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($data_items, $row['id']);
        array_push($data_items, $row['nome']);
        array_push($data_items, $row['dtCriacao']);
        array_push($data_items, $row['qtd']);
    }
} else {
    echo "0 results";
}
echo json_encode($data_items);
mysqli_close($conn);
?>