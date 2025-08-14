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
