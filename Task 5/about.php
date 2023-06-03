<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="css/about.css">
</head>

<body>
<?php
    include_once "navigation.php";
    $about = "active";
    $aboutSelected = "true";
    include_once "header.php";
    ?>

    <div class="carouselHolder">
        <p class="h2 text-center text-white">Wine Making</p>
        <div id="carouselWineMaking" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselWineMaking" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselWineMaking" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselWineMaking" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselWineMaking" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselWineMaking" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/vineyard.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Vineyard</h5>
                        <p>at sunset in autumn</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/bluegrapes.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Blue Grapes</h5>
                        <p>fresh, ripe and ready to produce wine</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/winebarrels.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Wine Barrels</h5>
                        <p>storing and aging the wine to perfection</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/winetasting.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Wine Tasting</h5>
                        <p>in the wine cellar</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/enjoyTheWine.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Enjoy The Wine</h5>
                        <p><i class="fa-solid fa-face-grin-wink fa-bounce"></i></p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselWineMaking" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselWineMaking" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <?php include_once "footer.php"; ?>
    <script>
        $('footer').slideDown();
    </script>

</body>

</html>