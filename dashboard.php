<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$theme = $_SESSION['theme'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-<?php echo $theme; ?>">
<div class="container mt-5 w-50">
    <div class="card p-4">
        
        <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
        <p>Email: <?php echo $_SESSION['email']; ?></p>

        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
</body>
</html>
