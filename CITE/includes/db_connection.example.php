<?php



$servername = "<See Passwords.kbdx/Cite/General/Database Connections>";
$username =  "<See Passwords.kbdx/Cite/General/Database Connections>";
$password =  "<See Passwords.kbdx/Cite/General/Database Connections>";


$dbname = "fpmt_07";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




?> 