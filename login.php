<?php
session_start();
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!isset($_SESSION['username'])) {
        $message = 'Please sign up first.';
    } elseif ($username === $_SESSION['username'] && $password === $_SESSION['password']) {
        $_SESSION['logged_in'] = true;
        header('Location: Dashboard.php');
        exit();
    } else {
        $message = 'Username or password is incorrect.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit">Log In</button>
       
    </form>
    <p><?php echo $message; ?></p>
    <a href="Signup.php">Create an account</a>
</body>
</html>
