<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <h2>User Registration</h2>
        <?php
        $name_error = isset($_GET['name_error']) ? htmlspecialchars($_GET['name_error']) : '';
        $email_error = isset($_GET['email_error']) ? htmlspecialchars($_GET['email_error']) : '';
        $password_error = isset($_GET['password_error']) ? htmlspecialchars($_GET['password_error']) : '';
        $confirm_password_error = isset($_GET['confirm_password_error']) ? htmlspecialchars($_GET['confirm_password_error']) : '';
        ?>
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
                <span class="error"><?php echo $name_error; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
                <span class="error"><?php echo $email_error; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <span class="error"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
                <span class="error"><?php echo $confirm_password_error; ?></span>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
