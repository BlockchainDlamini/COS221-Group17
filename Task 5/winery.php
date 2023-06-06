<!DOCTYPE html>
<html lang="en">

<head>
    <title>GWS - Wines</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="css/mod/bootstrap-3.3.2/css/bootstrapDropdown.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="icon" media="(prefers-color-scheme: dark)" href="img/favicon-dark/favicon-dark.ico">
    <link rel="icon" media="(prefers-color-scheme: light)" href="img/favicon-light/favicon-light.ico">
</head>



<body>
    <?php
    include_once "navigation.php";
    $wines = "active";
    $winesSelected = "true";
    include_once "header.php";
    ?>

    <div class="wrapper">
        <div class="sidebar">
            <div class="filterDivs">
                <label class="filterLabels" for="">Filter by region:</label>
                <select id="wineryfilter" class="selectpicker rounded-2">
                    <option value="all" selected>All</option>
                    <option value="Western Cape">Western Cape</option>
                    <option value="Northern Cape">Northern Cape</option>
                    <option value="Free State">Free State</option>
                    <option value="Gauteng">Gauteng</option>
                    <option value="Eastern Cape">Eastern Cape</option>
                    <option value="Mpumalanga">Mpumalanga</option>
                    <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                    <option value="Limpopo">Limpopo</option>
                    <option value="North West">North West</option>

                </select>
            </div>

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
                <button type="button" class="btn btn-secondary">Go</button>
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
                            <i id="sortOrderIcon" class="fa-solid fa-arrow-up-z-a fa-2xl"></i>
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
                            <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>
                </div>
                  


                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                                <h1>Chamonix Estate</h1>
                                <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/chamonixestate.jpg" style="width:400px;height:200px;margin:auto">
                            <div class="card-body">
                            <label>Region: </label>
                                <label id = "region">Franschoek</label>
                                <br>
                                <label>Rating: </label>
                                <label id = "rating">5 stars</label>
                                <br>
                                <label>Email: </label>
                                <label id = "email">john123@exmaple.com</label>
                                <br>
                                <label>Postal Code: </label>
                                <label id = "postalcode">1234</label>
                                <br>
                                <label>Phone Number: </label>
                                <label id = "phonenumber">061 382 1320</label>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name12" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName12" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability12" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year12" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName12" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails12" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails12" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating12" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price12" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize12" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name13" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName13" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability13" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year13" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName13" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails13" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails13" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating13" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price13" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize13" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name14" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName14" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability14" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year14" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName14" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails14" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails14" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating14" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price14" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize14" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
</body>

</html>