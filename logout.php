
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
session_start();       
session_destroy();    
header("Location: index.php");  
exit;                 
?>

