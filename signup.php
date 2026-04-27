<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Little People in Tech</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body class="bg-light">

    <header>
        <div class="container nav-container">
            <div class="logo">
                <a href="index.html">
                    <span class="logo-text">Little People <br>in Tech</span>
                </a>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="meetups.html">Meetups</a></li>
                    <li><a href="collaborations.html">Collaborations</a></li>
                    <li><a href="sponsors.html">Sponsors</a></li>
                </ul>
            </nav>
            <div class="nav-buttons">
                <a href="login.html" class="btn btn-outline">Log In</a>
                <a href="signup.html" class="btn btn-primary active">Join Us</a>
            </div>
        </div>
    </header>

    <section class="auth-section">
        <div class="container text-center" style="margin-bottom: 30px;">
            <h1>Join the <span class="highlight-yellow">Community</span></h1>
            <p>Create an account to access meetups, find collaborations, and connect with mentors.</p>
        </div>

        <div class="container">
            <div class="auth-single-card border-yellow">
<form class="auth-form" action="process-signup.php" method="POST">
    
    <div class="form-group">
        <label for="reg-name">Full Name</label>
        <input type="text" id="reg-name" name="full_name" placeholder="e.g., Jane Doe" required>
    </div>
    
    <div class="form-group">
        <label for="reg-email">Email Address</label>
        <input type="email" id="reg-email" name="email" placeholder="you@example.com" required>
    </div>
    
    <div class="form-group">
        <label for="reg-password">Create Password</label>
        <input type="password" id="reg-password" name="password" placeholder="Create a strong password" required>
    </div>
    
    <div class="form-group">
        <label for="reg-role">Primary Interest</label>
        <select id="reg-role" name="primary_interest" required>
            <option value="">Select an option...</option>
            <option value="developer">Software Engineering</option>
            <option value="design">Design / UX</option>
            <option value="hardware">Hardware / Ergonomics</option>
            <option value="sponsor">Sponsorship / Hiring</option>
            <option value="other">Other</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-full">Create Account</button>
</form>

                <div class="auth-switch">
                    <p>Already have an account? <a href="login.html">Log in here</a></p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container footer-container">
            <div class="footer-brand">
                <h3>Little People in Tech</h3>
                <p>Connecting the community, one line of code at a time.</p>
            </div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Little People in Tech. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>