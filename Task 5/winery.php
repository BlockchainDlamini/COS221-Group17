<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wineries</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="css/mod/bootstrap-3.3.2/css/bootstrapDropdown.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="icon" media="(prefers-color-scheme: dark)" href="img/favicon-dark/favicon-dark.ico">
    <link rel="icon" media="(prefers-color-scheme: light)" href="img/favicon-light/favicon-light.ico">
</head>



<body>
    <?php
    include_once "navigation.php";
    $wineries = "active";
    $wineriesSelected = "true";
    include_once "header.php";
    ?>

    <div class="wrapper">
        <div class="sidebar">
            <div class="filterDivs">
                <label class="filterLabels" for="">Filter by rating:</label>
                <select id="typefilter" class="selectpicker rounded-2">
                    <option value="all" selected>All</option>
                    <option value="5">5 stars only</option>
                    <option value="4">4 stars and up</option>
                    <option value="3">3 stars and up</option>
                    <option value="2">2 stars and up</option>
                    <option value="1">1 star and up</option>
                </select>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-secondary" onclick="enablefilter()">Go</button>
            </div>

        </div>

        <main>
            <div class="sortPaginationDiv">
                <div class="sortDiv">
                    <label for="" id="sortByLabel">sort by:</label>
                    <div class="sortGroup btn-group" role="group" aria-label="Sort Wines">
                        <select id="winesort" class="selectpicker">
                            <option value="Name" selected>Name</option>
                            <option value="Rating">Rating</option>
                        </select>

                        <button id="sortOrder" value="ASC" class="btn btn-secondary" onclick="toggleSortOrder()">
                            <i id="sortOrderIcon" class="fa-solid fa-arrow-up-z-a fa-2xl" onclick="search()"></i>
                        </button>
                    </div>
                </div>
                <div class="paginationDiv container" aria-label="Page Navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                        <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                            <h1 id="name0" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province0" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress0" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode0" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email0" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber0" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating0" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name1" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province1" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress1" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode1" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email1" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber1" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating1" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name2" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province2" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress2" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode2" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email2" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber2" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating2" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name3" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province3" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress3" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode3" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email3" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber3" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating3" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name4" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province4" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress4" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode4" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email4" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber4" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating4" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name5" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province5" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress5" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode5" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email5" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber5" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating5" class="wineryDetails"></label>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name6" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province6" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress6" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode6" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email6" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber6" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating6" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1 id="name7" class="wineryDetails">Chamonix Estate</h1>
                                <label>Province:</label>
                                <label id="Province7" class="wineryDetails"></label>
                                <br>
                                <label>Street Address:</label>
                                <label id="StreetAddress7" class="wineryDetails"></label>
                                <br>
                                <label>Postal Code:</label>
                                <label id="PostalCode7" class="wineryDetails"></label>
                                <br>
                                <label>Email:</label>
                                <label id="Email7" class="wineryDetails"></label>
                                <br>
                                <label>Phone Number:</label>
                                <label id="PhoneNumber7" class="wineryDetails"></label>
                                <br>
                                <label>Rating:</label>
                                <label id="Rating7" class="wineryDetails"></label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <button type="button" class="btn btn-dark btn-floating btn-lg rounded-7" id="scrollToTopBtn" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>


    <?php
    include_once "footer.php";
    ?>

    <script src="css/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
    <script src="css/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="css/mod/styling.js"></script>
    <script src="JS/Wineries.js"></script>
</body>

</html>