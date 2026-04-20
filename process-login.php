<?php
// process-login.php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    try {
        // 1. Find the user by email
        $stmt = $pdo->prepare("SELECT id, full_name, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // 2. Verify if user exists AND password matches the hash
        if ($user && password_verify($password, $user['password'])) {
            
            // 3. Password is correct. Start the session!
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['logged_in'] = true;

            // Redirect to the home page or a new dashboard page
            header("Location: index.html"); 
            exit();
        } else {
            die("Error: Invalid email or password.");
        }

    } catch(PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
} else {
    header("Location: login.html");
    exit();
}
?>