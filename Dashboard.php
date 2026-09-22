<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: Login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome admin dashboard</h1>
    <a href="Bacill%20v2/Index.php">Open Bacill v2</a>
    <form action="Logout.php" method="post">
        <button type="submit">Log Out</button>
    </form>
</body>
</html>
