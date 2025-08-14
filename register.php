<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php
include 'db.php';

$message = "";
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
    if(mysqli_query($conn, $query)){
        $message = "Registration Successful!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<div class="container">
    <h2>Create Your Account</h2>

    <?php if($message != ""){ ?>
        <p style="text-align:center; color:green; font-weight:bold;"><?= $message ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        Already have an account? <a href="index.php">Login here</a>
    </p>
</div>

</body>
</html>
