<?php
$message = "";

if(isset($_POST['upload'])){

    $targetDir = "uploads/";
    $allowTypes = ['jpg','jpeg','png','webp','JPG','JPEG','PNG','WEBP'];

    foreach($_FILES['images']['name'] as $key => $val){

        $fileName = $_FILES['images']['name'][$key];
        $tmpName  = $_FILES['images']['tmp_name'][$key];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if(in_array($fileType, $allowTypes)){

            $newFileName = time().'_'.$key.'.'.$fileType;
            $targetFilePath = $targetDir . $newFileName;

            if(move_uploaded_file($tmpName, $targetFilePath)){
                $message .= "$fileName uploaded successfully.<br>";
            }else{
                $message .= "Error uploading $fileName.<br>";
            }

        }else{
            $message .= "$fileName - Invalid file type.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload Architecture Images</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
    font-family: 'Poppins', sans-serif;
}
.card{
    border-radius:15px;
}
</style>

</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">Upload Multiple Architecture Images</h2>

    <?php if($message!=""){ ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php } ?>

    <form method="post" enctype="multipart/form-data" class="card p-4 shadow">

        <div class="mb-3">
            <label class="form-label">Select Images</label>
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>

        <button type="submit" name="upload" class="btn btn-dark w-100">
            Upload Images
        </button>

    </form>

    <div class="text-center mt-4">
        <a href="project01.php" class="btn btn-outline-secondary">
            View Gallery
        </a>
    </div>
</div>

</body>
</html>