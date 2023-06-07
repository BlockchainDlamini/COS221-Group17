<!DOCTYPE html>
<html lang="en">

<head>
    <title>Suggestions</title>
    <link rel="icon" media="(prefers-color-scheme: dark)" href="img/favicon-dark/favicon-dark.ico">
    <link rel="icon" media="(prefers-color-scheme: light)" href="img/favicon-light/favicon-light.ico">
    <link rel="stylesheet" href="css/suggestions.css">

</head>

<body>
    <?php
    include_once "navigation.php";
    $suggestions = "active";
    $suggestionsSelected = "true";
    include_once "header.php";
    ?>

    <div class="carouselHolder">
        <p class="h2 text-center text-white">Suggestions</p>
        <div id="carouselWineMaking" class="carousel slide" data-mdb-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/winebottle.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 id="wine1">Diemersfontein</h5>

                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/winebottle.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 id="wine2">Diemersfontein</h5>

                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/winebottle.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 id="wine3">Diemersfontein</h5>

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/winebottle.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 id="wine4">Diemersfontein</h5>

                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/winebottle.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 id="wine5">Diemersfontein</h5>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselWineMaking" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>






    <?php include_once "footer.php"; ?>
</body>

</html>