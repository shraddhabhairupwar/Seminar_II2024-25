<?php
session_start();

$uid = $_POST['userid'] ?? null;
$pw = $_POST['password'] ?? null;

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    echo "<h2>Logged out successfully</h2>";
    echo '<a href="login.php">Login again</a>';
    exit();
}

// Login logic
if ($uid && $pw) {
    if ($uid == 'ben' && $pw == 'ben23') {
        $_SESSION['sid'] = session_id();
        $_SESSION['userid'] = $uid;
        echo "<h2>Logged in successfully</h2>";
        echo "<p>Welcome, <strong>$uid</strong></p>";
        echo "<p>Session ID: " . $_SESSION['sid'] . "</p>";
        echo '<a href="login.php?logout=true">Logout</a>';
        exit();
    } else {
        echo "<h2>Invalid credentials</h2>";
        echo '<a href="login.php">Try again</a>';
        exit();
    }
}

// Show login form if not logged in
if (!isset($_SESSION['userid'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="post" action="login.php">
        <label>User ID:</label>
        <input type="text" name="userid" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
} else {
    // Already logged in
    echo "<h2>You are already logged in as <strong>" . $_SESSION['userid'] . "</strong></h2>";
    echo '<a href="login.php?logout=true">Logout</a>';
}
?>