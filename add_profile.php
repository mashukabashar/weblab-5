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
    
    $image = $_FILES['image']['name'];
    $target = "uploads/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO profiles (user_id, fullname, gender, dob, religion, caste, city, country, contact, height, weight, marital_status, blood, permanent_city, nationality, language_known, hobbies_and_interest, profession, education, universityname, hsc_year, college_name, ssc_year, school_name, father_name, father_occupation, mother_name, mother_occupation, siblings, email, partner_preference, image)
              VALUES ('$user_id','$fullname','$gender','$dob','$religion','$caste','$city','$country','$contact','$height','$weight','$marital_status','$blood','$permanent_city','$nationality','$language_known','$hobbies_and_interest','$profession','$education','$universityname','$hsc_year','$college_name','$ssc_year','$school_name','$father_name','$father_occupation','$mother_name','$mother_occupation','$siblings','$email','$partner_preference','$image')";
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

    <label>Height</label>
    <input type="text" name="height" placeholder="Height">

    <label>Weight</label>
    <input type="text" name="weight" placeholder="Weight">

    <label>Marital Status</label>
    <input type="text" name="marital_status" placeholder="Marital Status">

    <label>Religion</label>
    <input type="text" name="religion" placeholder="Religion">

    <label>Caste</label>
    <input type="text" name="caste" placeholder="Caste">

    <label>Blood Group</label>
    <input type="text" name="blood" placeholder="Blood Group">

    <label>City</label>
    <input type="text" name="city" placeholder="City">

    <label>Permanent City</label>
    <input type="text" name="permanent_city" placeholder="Permanent City">

    <label>Country</label>
    <input type="text" name="country" placeholder="Country">

    <label>Nationality</label>
    <input type="text" name="nationality" placeholder="Nationality">

    <label>Languages Known</label>
    <input type="text" name="language_known" placeholder="Languages Known">

    <label>Hobbies & Interests</label>
    <input type="text" name="hobbies_and_interest" placeholder="Hobbies & Interests">

    <label>Profession</label>
    <input type="text" name="profession" placeholder="Profession">

    <label>Education</label>
    <input type="text" name="education" placeholder="Education">

    <label>University</label>
    <input type="text" name="universityname" placeholder="University Name">

    <label>HSC Year</label>
    <input type="text" name="hsc_year" placeholder="HSC Year">

    <label>College</label>
    <input type="text" name="college_name" placeholder="College Name">

    <label>SSC Year</label>
    <input type="text" name="ssc_year" placeholder="SSC Year">

    <label>School</label>
    <input type="text" name="school_name" placeholder="School Name">

    <label>Father's Name</label>
    <input type="text" name="father_name" placeholder="Father's Name">

    <label>Father's Occupation</label>
    <input type="text" name="father_occupation" placeholder="Father's Occupation">

    <label>Mother's Name</label>
    <input type="text" name="mother_name" placeholder="Mother's Name">

    <label>Mother's Occupation</label>
    <input type="text" name="mother_occupation" placeholder="Mother's Occupation">

    <label>Siblings</label>
    <input type="number" name="siblings" placeholder="Number of Siblings">

    <label>Contact</label>
    <input type="text" name="contact" placeholder="Contact">

    <label>Email</label>
    <input type="email" name="email" placeholder="Email">

    <label>Partner Preference</label>
    <input type="text" name="partner_preference" placeholder="Partner Preference">

    <label>Profile Image</label>
    <input type="file" name="image" required>

    <button type="submit" name="submit">Add Biodata</button>
</form>

</div>

</body>
</html>
