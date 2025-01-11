<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "test_db";
$table_name = "users";

$connect = new mysqli($server_name, $user_name, $password, $db_name);

if ($connect -> connect_error) die("Connection failed: " . $connect -> connect_error);

$sql = "SELECT * FROM $table_name";
$result = $connect -> query($sql);

if ($result -> num_rows > 0) {
    $data = array();

    while($row = $result -> fetch_assoc()) $data[] = $row;

    echo json_encode($data);
}
else echo json_encode(array("message" => "List is empty"));

$connect -> close();

?>