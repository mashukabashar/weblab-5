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

$result = mysqli_query($conn, "SELECT * FROM profiles WHERE id='$profile_id' AND user_id='$user_id'");
if(mysqli_num_rows($result) == 0){
    header("Location: dashboard.php");
    exit;
}

$profile = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $contact = $_POST['contact'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $marital_status = $_POST['marital_status'];
    $blood = $_POST['blood'];
    $permanent_city = $_POST['permanent_city'];
    $nationality = $_POST['nationality'];
    $language_known = $_POST['language_known'];
    $hobbies_and_interest = $_POST['hobbies_and_interest'];
    $profession = $_POST['profession'];
    $education = $_POST['education'];
    $universityname = $_POST['universityname'];
    $hsc_year = $_POST['hsc_year'];
    $college_name = $_POST['college_name'];
    $ssc_year = $_POST['ssc_year'];
    $school_name = $_POST['school_name'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $siblings = $_POST['siblings'];
    $email = $_POST['email'];
    $partner_preference = $_POST['partner_preference'];

    if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = $_FILES['image']['name'];
        $target = "uploads/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        if(file_exists('uploads/'.$profile['image'])){
            unlink('uploads/'.$profile['image']);
        }
    } else {
        $image = $profile['image'];
    }

    $query = "UPDATE profiles SET 
                fullname='$fullname',
                gender='$gender',
                dob='$dob',
                religion='$religion',
                caste='$caste',
                city='$city',
                country='$country',
                contact='$contact',
                height='$height',
                weight='$weight',
                marital_status='$marital_status',
                blood='$blood',
                permanent_city='$permanent_city',
                nationality='$nationality',
                language_known='$language_known',
                hobbies_and_interest='$hobbies_and_interest',
                profession='$profession',
                education='$education',
                universityname='$universityname',
                hsc_year='$hsc_year',
                college_name='$college_name',
                ssc_year='$ssc_year',
                school_name='$school_name',
                father_name='$father_name',
                father_occupation='$father_occupation',
                mother_name='$mother_name',
                mother_occupation='$mother_occupation',
                siblings='$siblings',
                email='$email',
                partner_preference='$partner_preference',
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

        <label>Height</label>
        <input type="text" name="height" value="<?= $profile['height'] ?>">

        <label>Weight</label>
        <input type="text" name="weight" value="<?= $profile['weight'] ?>">

        <label>Marital Status</label>
        <input type="text" name="marital_status" value="<?= $profile['marital_status'] ?>">

        <label>Blood Group</label>
        <input type="text" name="blood" value="<?= $profile['blood'] ?>">

        <label>Permanent City</label>
        <input type="text" name="permanent_city" value="<?= $profile['permanent_city'] ?>">

        <label>Nationality</label>
        <input type="text" name="nationality" value="<?= $profile['nationality'] ?>">

        <label>Languages Known</label>
        <input type="text" name="language_known" value="<?= $profile['language_known'] ?>">

        <label>Hobbies & Interests</label>
        <input type="text" name="hobbies_and_interest" value="<?= $profile['hobbies_and_interest'] ?>">

        <label>Profession</label>
        <input type="text" name="profession" value="<?= $profile['profession'] ?>">

        <label>Education</label>
        <input type="text" name="education" value="<?= $profile['education'] ?>">

        <label>University</label>
        <input type="text" name="universityname" value="<?= $profile['universityname'] ?>">

        <label>HSC Year</label>
        <input type="text" name="hsc_year" value="<?= $profile['hsc_year'] ?>">

        <label>College</label>
        <input type="text" name="college_name" value="<?= $profile['college_name'] ?>">

        <label>SSC Year</label>
        <input type="text" name="ssc_year" value="<?= $profile['ssc_year'] ?>">

        <label>School</label>
        <input type="text" name="school_name" value="<?= $profile['school_name'] ?>">

        <label>Father's Name</label>
        <input type="text" name="father_name" value="<?= $profile['father_name'] ?>">

        <label>Father's Occupation</label>
        <input type="text" name="father_occupation" value="<?= $profile['father_occupation'] ?>">

        <label>Mother's Name</label>
        <input type="text" name="mother_name" value="<?= $profile['mother_name'] ?>">

        <label>Mother's Occupation</label>
        <input type="text" name="mother_occupation" value="<?= $profile['mother_occupation'] ?>">

        <label>Siblings</label>
        <input type="number" name="siblings" value="<?= $profile['siblings'] ?>">

        <label>Email</label>
        <input type="email" name="email" value="<?= $profile['email'] ?>">

        <label>Partner Preference</label>
        <input type="text" name="partner_preference" value="<?= $profile['partner_preference'] ?>">

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
