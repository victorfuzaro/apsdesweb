<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulaphp";
// PHP que recebe o ID do game e envia os dados da pergunta
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$ID = $_POST['id'];
$sql = "SELECT id, pergunta, r1, r2 FROM pergunta WHERE id = $ID";
$result = mysqli_query($conn, $sql);
$data_items = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($data_items, $row['id']);
        array_push($data_items, $row['pergunta']);
        array_push($data_items, $row['r1']);
        array_push($data_items, $row['r2']);
    }
} else {
    echo "0 results";
}
echo json_encode($data_items); // envia os dados como JSON
mysqli_close($conn);
?>