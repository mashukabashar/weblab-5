<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="assets/edit.css">
</head>
<body>

<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if(!isset($_GET['id'])){
    header("Location: dashboard.php");
    exit;
}

$profile_id = $_GET['id'];

// Fetch existing profile data
$result = mysqli_query($conn, "SELECT * FROM profiles WHERE id='$profile_id' AND user_id='$user_id'");
if(mysqli_num_rows($result) == 0){
    header("Location: dashboard.php");
    exit;
}

$profile = mysqli_fetch_assoc($result);

// Handle form submission
if(isset($_POST['update'])){
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $contact = $_POST['contact'];

    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = $_FILES['image']['name'];
        $target = "uploads/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        // Delete old image
        if(file_exists('uploads/'.$profile['image'])){
            unlink('uploads/'.$profile['image']);
        }
    } else {
        $image = $profile['image']; // Keep old image
    }

    // Update profile in database
    $query = "UPDATE profiles SET 
                fullname='$fullname',
                gender='$gender',
                dob='$dob',
                religion='$religion',
                caste='$caste',
                city='$city',
                country='$country',
                contact='$contact',
                image='$image'
              WHERE id='$profile_id' AND user_id='$user_id'";
    mysqli_query($conn, $query);

    header("Location: dashboard.php");
    exit;
}
?>

<div class="container">
    <h2>Edit Biodata</h2>
    
    <form method="POST" enctype="multipart/form-data" class="profile-form">
        <label>Full Name</label>
        <input type="text" name="fullname" value="<?= $profile['fullname'] ?>" required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="Male" <?= $profile['gender']=='Male'?'selected':'' ?>>Male</option>
            <option value="Female" <?= $profile['gender']=='Female'?'selected':'' ?>>Female</option>
            <option value="Other" <?= $profile['gender']=='Other'?'selected':'' ?>>Other</option>
        </select>

        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?= $profile['dob'] ?>" required>

        <label>Religion</label>
        <input type="text" name="religion" value="<?= $profile['religion'] ?>">

        <label>Caste</label>
        <input type="text" name="caste" value="<?= $profile['caste'] ?>">

        <label>City</label>
        <input type="text" name="city" value="<?= $profile['city'] ?>">

        <label>Country</label>
        <input type="text" name="country" value="<?= $profile['country'] ?>">

        <label>Contact</label>
        <input type="text" name="contact" value="<?= $profile['contact'] ?>">

        <label>Profile Image</label>
        <div class="image-preview">
            <img src="uploads/<?= $profile['image'] ?>" width="120" alt="Profile Image">
        </div>
        <input type="file" name="image">

        <button type="submit" name="update">Update Biodata</button>
    </form>
</div>

</body>
</html>
