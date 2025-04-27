<?php
$name = $email = $password = $confirm_password = '';
$name_error = $email_error = $password_error = $confirm_password_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        $name_error = 'Name is required';
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $email_error = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_error = 'Invalid email format';
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['password'])) {
        $password_error = 'Password is required';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }

    if (empty($_POST['confirm_password'])) {
        $confirm_password_error = 'Please confirm your password';
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $confirm_password_error = 'Passwords do not match';
    } else {
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
    }

    if (empty($name_error) && empty($email_error) && empty($password_error) && empty($confirm_password_error)) {
        echo "<h2>Form Submitted Successfully!</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        exit();
    } else {
        $query = http_build_query([
            'name_error' => $name_error,
            'email_error' => $email_error,
            'password_error' => $password_error,
            'confirm_password_error' => $confirm_password_error,
            'name' => $name,
            'email' => $email
        ]);
        header("Location: index.php?$query");
        exit();
    }
}
