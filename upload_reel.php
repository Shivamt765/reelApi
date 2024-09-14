<?php
include "db.php";
if (isset($_FILES['video'])) {
    $errors = [];
    $path = 'uploads/';
    $extensions = ['mp4', 'mov', 'avi'];

    $file_name = $_FILES['video']['name'];
    $file_tmp = $_FILES['video']['tmp_name'];


    $file_ext_array = explode('.', $_FILES['video']['name']);
    $file_ext = strtolower(end($file_ext_array)); 
    if (!in_array($file_ext, $extensions)) {
        $errors[] = 'Invalid file extension';
    }

    // Upload the file
    if (empty($errors)) {
        $file_path = $path . $file_name;
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Insert reel info into the database
            $reel_url = $file_path;
            $user_id = 1; 
            $description = "Sample description"; 
            $stmt = $mysqli->prepare("INSERT INTO reels (user_id, reel_url, description) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $user_id, $reel_url, $description);
            $stmt->execute();

            echo 'File uploaded and record saved successfully';
        } else {
            echo 'File upload failed';
        }
    } else {
        echo implode(', ', $errors);
    }
}
?>