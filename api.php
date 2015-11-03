<?php
$json = file_get_contents('api.theysaidso.com/qod.json');
if($json===FALSE){
 die();
}
$data_obj = json_decode($json);

$quote = $data_obj->contents->quotes[0]->quote;
$servername = "mysql.hostinger.in";
$username = "u483516326_qd";
$password = "nttu1436";
$dbname = "u483516326_qd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tbl_quotes (q_text)VALUES ('".$quote."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>