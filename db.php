<?php
// db.php
$host = 'localhost';
$dbname = 'little_people_in_tech'; // Your database name
$username = 'root';                // Your database username
$password = '';                    // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
