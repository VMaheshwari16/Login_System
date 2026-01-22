<?php
session_start();

/* If already logged in */
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

/* Get cookie values */
$savedUsername = $_COOKIE['remember_username'] ?? "";
$theme = $_COOKIE['user_theme'] ?? "light";

/* Get error */
$error = $_SESSION['error'] ?? "";
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-<?php echo $theme; ?>">
<div class="container mt-5 w-50">
    <div class="card p-4">

        <h3 class="text-center">Login</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="auth.php">
            <input type="text" name="username" class="form-control mb-2"
                   placeholder="Username" value="<?php echo $savedUsername; ?>">

            <input type="email" name="email" class="form-control mb-2"
                   placeholder="Email">

            <input type="password" name="password" class="form-control mb-2"
                   placeholder="Password">

            <div class="form-check mb-3">
                <input type="checkbox" name="remember" class="form-check-input">
                <label class="form-check-label">Remember Me</label>
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>

    </div>
</div>
</body>
</html>
