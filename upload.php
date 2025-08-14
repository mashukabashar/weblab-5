<?php
// Display any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Select Image: <input type="file" name="image" accept="image/*" required><br>
    <button type="submit">Upload</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $upload_dir = "uploads/";
    
    // Ensure folder exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $image_name = time() . "_" . basename($_FILES['image']['name']);
    $target_file = $upload_dir . $image_name;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        echo "Image uploaded successfully!<br>";
        echo "<img src='$target_file' width='150'>";
    } else {
        echo "Failed to upload image. Check folder permissions.";
    }
}
?>
