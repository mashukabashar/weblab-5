<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Biodata</title>
    <link rel="stylesheet" href="assets/add.css">
</head>
<body>

<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $contact = $_POST['contact'];
    
    $image = $_FILES['image']['name'];
    $target = "uploads/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO profiles (user_id, fullname, gender, dob, religion, caste, city, country, contact, image)
              VALUES ('$user_id','$fullname','$gender','$dob','$religion','$caste','$city','$country','$contact','$image')";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
    exit;
}
?>

<div class="container">
    <h2>Add New Biodata</h2>
    
    <form method="POST" enctype="multipart/form-data" class="profile-form">
        <label>Full Name</label>
        <input type="text" name="fullname" placeholder="Full Name" required>

        <label>Gender</label>
        <select name="gender" required>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>

        <label>Date of Birth</label>
        <input type="date" name="dob" required>

        <label>Religion</label>
        <input type="text" name="religion" placeholder="Religion">

        <label>Caste</label>
        <input type="text" name="caste" placeholder="Caste">

        <label>City</label>
        <input type="text" name="city" placeholder="City">

        <label>Country</label>
        <input type="text" name="country" placeholder="Country">

        <label>Contact</label>
        <input type="text" name="contact" placeholder="Contact">

        <label>Profile Image</label>
        <input type="file" name="image" required>

        <button type="submit" name="submit">Add Biodata</button>
    </form>
</div>

</body>
</html>
