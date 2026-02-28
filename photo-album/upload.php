<?php
if(isset($_POST['upload'])) {

    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

    $allowTypes = array('jpg','png','jpeg','webp');

    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
            $message = "Image uploaded successfully.";
        }else{
            $message = "Error uploading image.";
        }
    }else{
        $message = "Only JPG, PNG, JPEG, WEBP allowed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload Architecture Image</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">Upload Architecture Project Image</h2>

    <?php if(isset($message)) echo "<div class='alert alert-info'>$message</div>"; ?>

    <form method="post" enctype="multipart/form-data" class="card p-4 shadow">
        <div class="mb-3">
            <label>Select Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" name="upload" class="btn btn-dark w-100">Upload</button>
    </form>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-outline-secondary">View Gallery</a>
    </div>
</div>

</body>
</html>