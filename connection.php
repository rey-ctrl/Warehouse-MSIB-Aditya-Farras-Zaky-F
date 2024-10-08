<?php
// Database connection details
$servername = "localhost";
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password (for XAMPP, usually blank)
$dbname = "warehouse_db";     // Your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
