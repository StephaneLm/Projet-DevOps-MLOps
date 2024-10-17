<?php
$servername = "tp2-data-container";
$username = "root";
$password = "password";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a simple table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS visitors (id INT AUTO_INCREMENT PRIMARY KEY, visit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");

// Insert a record
$conn->query("INSERT INTO visitors () VALUES ()");

// Select records
$result = $conn->query("SELECT COUNT(*) AS visit_count FROM visitors");
$row = $result->fetch_assoc();
echo "Total visits: " . $row['visit_count'];

$conn->close();
?>
