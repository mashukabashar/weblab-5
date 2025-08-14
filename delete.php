<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

if(isset($_GET['id'])){
    $profile_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Get the image file name to delete it
    $result = mysqli_query($conn, "SELECT image FROM profiles WHERE id='$profile_id' AND user_id='$user_id'");
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $image_path = 'uploads/'.$row['image'];
        if(file_exists($image_path)){
            unlink($image_path); // Delete the image file
        }

        // Delete profile from database
        mysqli_query($conn, "DELETE FROM profiles WHERE id='$profile_id' AND user_id='$user_id'");
    }
}

header("Location: dashboard.php");
exit;
?>
