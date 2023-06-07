<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/mod/mdb5-6.3.1/mdbMod.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/header.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="css/jquery-3.7.0/jquery-3.7.0.min.js"></script>
</head>


<body>
    <?php
    include_once "navigation.php";
    ?>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img id="companyLogo" class="rounded-9" src="img/companyLogo.png" alt="" style="width:50px;">
                    <label id="companyName" for="companyLogo">GWS</label>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav navbar-dark bg-dark nav-pills nav-fill gap-2 p-1 small bg-secondary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-gray-100);">
                        <li class="nav-item" role="presentation">
                            <a id="one" class="nav-link <?= $wines; ?> rounded-pill" href="index.php" type="button" role="tab" aria-selected="<?= $winesSelected; ?>">Wines</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="two" class="nav-link <?= $wineries; ?> rounded-pill" href="winery.php" type="button" role="tab" aria-selected="<?= $wineriesSelected; ?>">Wineries</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= $suggestions; ?> rounded-pill" href="suggestions.php" type="button" role="tab" aria-selected="<?= $suggestionsSelected; ?>">Suggestions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= $about; ?> rounded-pill" href="about.php" type="button" role="tab" aria-selected="<?= $aboutSelected; ?>">About Us</a>
                        </li>
                        <li class="nav-item signupLogin logiBtn" role="presentation">
                            <a class="nav-link rounded-pill" href="login.php" type="button" role="tab" aria-selected="false">Login</a>
                        </li>
                        <li class="nav-item signupLogin signupBtn hidden" role="presentation">
                            <a class="nav-link rounded-pill" href="signup.php" type="button" role="tab" aria-selected="false">Signup</a>
                        </li>
                        <div class="dropdown userAccountDiv">
                            <button id="userAccountButton" class="nav-link dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false" title="Account">
                                <i class="fa-solid fa-user-gear fa-2xl"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item p-2 ps-3" href="#"><i class="fa-solid fa-sliders fa-lg me-2"></i>Preferences</a></li>
                                <li><a class="dropdown-item p-2 ps-3" href="winesTable.php"><i class="fa-solid fa-pen fa-lg me-2"></i>Admin</a></li>
                                <li><a class="dropdown-item p-2 ps-3" href="#"><i class="fa-solid fa-right-from-bracket fa-lg me-2"></i>Logout</a></li>
                            </ul>
                        </div>

                    </ul>
                </div>
            </div>
        </nav>
        <div id="searchBarCollapse" class="collapse">
            <div class="searchBarDiv d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary text-center" type="button" onclick="search()">Search</button>
            </div>
        </div>

    </header>

    <script type="application/javascript" src="JS/header.js"></script>

</body>


</html>