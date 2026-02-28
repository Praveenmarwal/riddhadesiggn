<?php
$images = glob("uploads/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Architecture Projects Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
    font-family: 'Poppins', sans-serif;
}

h2{
    font-weight:700;
}

.gallery-item{
    overflow:hidden;
    border-radius:18px;
}

.gallery img{
    width:100%;
    height:280px;
    object-fit:cover;
    transition:0.4s ease;
}

.gallery img:hover{
    transform:scale(1.08);
}

@media(max-width:768px){
    .gallery img{
        height:220px;
    }
}

@media(max-width:576px){
    .gallery img{
        height:200px;
    }
}
</style>
</head>

<body>

<div class="container py-5">
    <h2 class="text-center mb-5">Our Architecture Projects</h2>

    <div class="row g-4 gallery">

        <?php if(!empty($images)): ?>
            <?php foreach($images as $img): ?>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="gallery-item shadow">
                    <a href="<?php echo $img; ?>" 
                       class="glightbox" 
                       data-gallery="architecture">
                        <img src="<?php echo $img; ?>" class="img-fluid">
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No images uploaded yet.</p>
        <?php endif; ?>

    </div>

    <div class="text-center mt-5">
        <a href="../project-folder/upload01.php" class="btn btn-dark">Upload Images</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
const lightbox = GLightbox({
    selector: '.glightbox',
    loop: true,
    zoomable: true,
    draggable: true,
    touchNavigation: true
});
</script>

</body>
</html>