
<?php
// Database connection details.
// Use local credentials on localhost and production credentials everywhere else.
$servername = "localhost";
$server_name = $_SERVER['SERVER_NAME'] ?? '';

if ($server_name === 'localhost' || $server_name === '127.0.0.1') {
    $username = "root";
    $password = "";
    $dbname = "srinivasa";
} else {
    $username = "bhavicreations";
    $password = "d8Az75YlgmyBnVM";
    $dbname = "srinivasanew";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    error_log("DB connection failed for {$server_name}: " . $conn->connect_error);
    http_response_code(500);
    die("Database connection failed. Please try again later.");
}

$conn->set_charset('utf8mb4');




