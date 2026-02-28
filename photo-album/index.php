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
body {
    background:#f8f9fa;
    font-family: 'Poppins', sans-serif;
}

.gallery img {
    width:100%;
    height:280px;
    object-fit:cover;
    border-radius:15px;
    transition:0.4s ease;
}

.gallery img:hover {
    transform:scale(1.08);
}

.gallery-item {
    overflow:hidden;
    border-radius:15px;
}

@media (max-width:768px){
    .gallery img{
        height:220px;
    }
}
</style>
</head>

<body>

<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold">Our Architecture Projects</h2>

    <div class="row g-4 gallery">
        <?php foreach($images as $img): ?>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="gallery-item shadow">
                <a href="<?php echo $img; ?>" class="glightbox" data-gallery="architecture">
                    <img src="<?php echo $img; ?>">
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
const lightbox = GLightbox({
    selector: '.glightbox',
    loop: true,
    zoomable: true,
    draggable: true
});
</script>

</body>
</html>