<?php
session_start();
include "includes/validation.php";

/* 1. Get input */
$username = trim($_POST['username'] ?? "");
$email    = trim($_POST['email'] ?? "");
$password = trim($_POST['password'] ?? "");
$remember = isset($_POST['remember']);

/* 2. Validate */
$error = validateUsername($username)
      ?: validateEmail($email)
      ?: validatePassword($password);

if ($error) {
    $_SESSION['error'] = $error;
    header("Location: login.php");
    exit;
}

/* 3. Predefined users (PDF users) */
$users = [
    "user1" => ["email" => "user1@example.com", "password" => "User1@123", "theme" => "dark"],
    "user2" => ["email" => "user2@example.com", "password" => "User2@123", "theme" => "warning"],
    "user3" => ["email" => "user3@example.com", "password" => "User3@123", "theme" => "light"]
];

/* 4. Check user */
if (
    isset($users[$username]) &&
    $email === $users[$username]['email'] &&
    $password === $users[$username]['password']
) {
    /* 5. Store session */
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['theme'] = $users[$username]['theme'];

    /* 6. Store cookies if remember */
    if ($remember) {
        setcookie("remember_username", $username, time()+60, "/");
        setcookie("user_theme", $_SESSION['theme'], time()+60, "/");
    }

    header("Location: dashboard.php");
    exit;
}

/* 7. Failed login */
$_SESSION['error'] = "Invalid Login Credentials";
header("Location: login.php");
exit;
