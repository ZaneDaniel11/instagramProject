<?php
require 'config.php'; // Assuming config.php contains your database connection

if(isset($_POST["submit"])) {
    $name = $_POST['name'];
    $filesArray = [];

    // Loop through each uploaded file
    foreach ($_FILES['fileImg']['tmp_name'] as $key => $tmpName) {
        $imageName = $_FILES["fileImg"]["name"][$key];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid() . '.' . $imageExtension;

        // Move the uploaded file to the uploads directory
        move_uploaded_file($tmpName, 'uploads/' . $newImageName);
        $filesArray[] = $newImageName; // Add the file name to the array
    }

    $filesJson = json_encode($filesArray);

    // Insert data into the database
    $query = "INSERT INTO tb_images (name, image) VALUES ('$name', '$filesJson')";

    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Successfully Added');</script>";
    } else {
        echo "<script>alert('Error inserting data');</script>";
    }
}
?>

<html>
<head></head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        Name:
        <input type="text" name="name" required><br>
        Images:
        <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
    <a href="index.php">Go back to index</a>
</body>
</html>