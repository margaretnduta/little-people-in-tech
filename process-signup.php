<?php
// process-signup.php
session_start();

// 1. Database Credentials
$servername = "localhost";
$username   = "root";     
$password   = "";         
$dbname     = "little_people_in_tech";

// 2. Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Grab and sanitize the form data
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $plain_password = $_POST['password'];
    $primary_interest = htmlspecialchars(trim($_POST['primary_interest']));

    // 2. Hash the password
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // 3. Prepare the SQL statement (MySQLi style)
    // We use ? as placeholders to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, primary_interest) VALUES (?, ?, ?, ?)");
    
    // 4. Bind the parameters
    // "ssss" means we are passing 4 Strings
    $stmt->bind_param("ssss", $full_name, $email, $hashed_password, $primary_interest);

    // 5. Execute
    if ($stmt->execute()) {
        // Success!
        $_SESSION['success_message'] = "Account created successfully!";
        header("Location: login.html");
        exit();
    } else {
        // Handle Errors (like duplicate emails)
        if ($conn->errno == 1062) {
            die("Error: That email address is already registered.");
        } else {
            die("Database Error: " . $conn->error);
        }
    }

    $stmt->close();
} else {
    header("Location: signup.html");
    exit();
}

$conn->close();
?>