<?php
$servername = "localhost";
$username = "spcom_userkouadio";
$password = "FIKS4X6ZAHIF";
$dbase = "spcom_kouadio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbase);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
