<?php
function validateUsername($username) {
    if ($username === "") {
        return "Username is required";
    }
    return "";
}

function validateEmail($email) {
    if ($email === "") {
        return "Email is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    return "";
}

function validatePassword($password) {
    if ($password === "") {
        return "Password is required";
    }
    if (strlen($password) < 6) {
        return "Password must be at least 6 characters";
    }
    return "";
}
