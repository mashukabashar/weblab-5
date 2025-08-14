
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
session_start();       // Start the session
session_destroy();     // Destroy all session data
header("Location: index.php");  // Redirect to login page
exit;                  // Stop further execution
?>

