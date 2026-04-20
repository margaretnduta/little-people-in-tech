<?php
// process-signup.php
session_start();
require 'db.php'; // Include our database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Grab the form data securely
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $plain_password = $_POST['password'];
    $primary_interest = htmlspecialchars(trim($_POST['primary_interest']));

    // 2. Hash the password for security (NEVER store plain text)
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    try {
        // 3. Prepare the SQL statement to prevent SQL injection
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, primary_interest) VALUES (:full_name, :email, :password, :primary_interest)");
        
        // 4. Bind the parameters and execute
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':primary_interest', $primary_interest);
        
        $stmt->execute();

        // 5. Success! Redirect the user to the login page
        $_SESSION['success_message'] = "Account created successfully! Please log in.";
        header("Location: login.html");
        exit();

    } catch(PDOException $e) {
        // Handle duplicate emails (since email is UNIQUE in our database)
        if($e->getCode() == 23000) {
            die("Error: That email address is already registered.");
        } else {
            die("Database Error: " . $e->getMessage());
        }
    }
} else {
    header("Location: signup.html");
    exit();
}
?>