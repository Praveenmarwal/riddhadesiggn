<?php
$uploadDir = "uploads/";
$jsonFile = "images.json";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$images = json_decode(file_get_contents($jsonFile), true);

foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {

    $fileName = time() . "_" . basename($_FILES['images']['name'][$key]);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($tmpName, $targetFile)) {
        $images[] = $targetFile;
    }
}

file_put_contents($jsonFile, json_encode($images, JSON_PRETTY_PRINT));

echo "Images Uploaded Successfully!";
?>