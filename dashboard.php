<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/dashboard.css">
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
$result = mysqli_query($conn, "SELECT * FROM profiles WHERE user_id='$user_id'");
?>

<div class="container">
    <div class="header">
        <h2>BIODATA</h2>
        <div class="header-buttons">
            <a class="btn" href="add_profile.php">Add Biodata</a>
            <a class="btn btn-logout" href="logout.php">Logout</a>
        </div>
    </div>

    <div class="profiles">
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="profile-card">
                    <img src="uploads/<?= $row['image'] ?>" alt="<?= $row['fullname'] ?>">
                    <h3><?= $row['fullname'] ?></h3>

                    <p><strong>Gender:</strong> <?= $row['gender'] ?></p>
                    <p><strong>DOB:</strong> <?= $row['dob'] ?></p>
                    <p><strong>Religion:</strong> <?= $row['religion'] ?></p>
                    <p><strong>Caste:</strong> <?= $row['caste'] ?></p>
                    <p><strong>City:</strong> <?= $row['city'] ?></p>
                    <p><strong>Country:</strong> <?= $row['country'] ?></p>
                    <p><strong>Contact:</strong> <?= $row['contact'] ?></p>
                    <p><strong>Height:</strong> <?= $row['height'] ?></p>
                    <p><strong>Weight:</strong> <?= $row['weight'] ?></p>
                    <p><strong>Marital Status:</strong> <?= $row['marital_status'] ?></p>
                    <p><strong>Blood Group:</strong> <?= $row['blood'] ?></p>
                    <p><strong>Permanent City:</strong> <?= $row['permanent_city'] ?></p>
                    <p><strong>Nationality:</strong> <?= $row['nationality'] ?></p>
                    <p><strong>Languages Known:</strong> <?= $row['language_known'] ?></p>
                    <p><strong>Hobbies & Interests:</strong> <?= $row['hobbies_and_interest'] ?></p>
                    <p><strong>Profession:</strong> <?= $row['profession'] ?></p>
                    <p><strong>Education:</strong> <?= $row['education'] ?></p>
                    <p><strong>University:</strong> <?= $row['universityname'] ?></p>
                    <p><strong>HSC Year:</strong> <?= $row['hsc_year'] ?></p>
                    <p><strong>College:</strong> <?= $row['college_name'] ?></p>
                    <p><strong>SSC Year:</strong> <?= $row['ssc_year'] ?></p>
                    <p><strong>School:</strong> <?= $row['school_name'] ?></p>
                    <p><strong>Father's Name:</strong> <?= $row['father_name'] ?></p>
                    <p><strong>Father's Occupation:</strong> <?= $row['father_occupation'] ?></p>
                    <p><strong>Mother's Name:</strong> <?= $row['mother_name'] ?></p>
                    <p><strong>Mother's Occupation:</strong> <?= $row['mother_occupation'] ?></p>
                    <p><strong>Siblings:</strong> <?= $row['siblings'] ?></p>
                    <p><strong>Email:</strong> <?= $row['email'] ?></p>
                    <p><strong>Partner Preference:</strong> <?= $row['partner_preference'] ?></p>

                    <div class="actions">
                        <a class="btn btn-edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No biodata found. Click "Add Biodata" to create one.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
