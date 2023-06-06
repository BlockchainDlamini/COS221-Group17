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
                <label class="filterLabels" for="">Winery</label>
                <select id="wineryfilter" class="selectpicker rounded-2" data-live-search="true" multiple>
                    <option value="Chamonix Estate">Chamonix Estate</option>
                    <option value="Groot Post Vineyards">Groot Post Vineyards</option>
                    <option value="Klawer Wine Cellars">Klawer Wine Cellars</option>
                    <option value="Kleine Zalze Wines">Kleine Zalze Wines</option>
                    <option value="Koelenhof Wine Cellar">Koelenhof Wine Cellar</option>
                    <option value="La Motte">La Motte</option>
                    <option value="Laborie Wines">Laborie Wines</option>
                    <option value="Nederburg Wines">Nederburg Wines</option>
                    <option value="Orange River Wines">Orange River Wines</option>
                    <option value="Perdeberg Wines">Perdeberg Wines</option>
                    <option value="Raka Wines">Raka Wines</option>
                    <option value="Roodeberg">Roodeberg</option>
                </select>
            </div>

            <div class="filterDivs">
                <label class="filterLabels" for="">Wine Type</label>
                <select id="typefilter" class="selectpicker rounded-2" data-live-search="true" multiple>
                    <option value="Bin Edelkeur">Bin Edelkeur</option>
                    <option value="Blend">Blend</option>
                    <option value="Cabernet Sauvignon">Cabernet Sauvignon</option>
                    <option value="Chardonnay">Chardonnay</option>
                    <option value="Chenin Blanc">Chenin Blanc</option>
                    <option value="Colombard">Colombard</option>
                    <option value="Grenache Carignan">Grenache Carignan</option>
                    <option value="Kleine Zalze Chenin Blanc">Kleine Zalze Chenin Blanc</option>
                    <option value="Kleine Zalze Red Blend">Kleine Zalze Red Blend</option>
                    <option value="Kleine Zalze Rose Chardonnay">Kleine Zalze Rose Chardonnay</option>
                    <option value="Koelenbosch Rose">Koelenbosch Rose</option>
                    <option value="Koelenbosch Merlot">Koelenbosch Merlot</option>
                    <option value="Koelenbosch Pinorto">Koelenbosch Pinorto</option>
                    <option value="Koelenbosch Pinotage">Koelenbosch Pinotage</option>
                    <option value="Koelenbosch Red Blend">Koelenbosch Red Blend</option>
                    <option value="Koelenbosch Rose Vin-Sec">Koelenbosch Rose Vin-Sec</option>
                    <option value="LYRA VEGA">LYRA VEGA</option>
                    <option value="Muscat dAlexandrie">Muscat dAlexandrie</option>
                    <option value="Perdeberg Red Blend">Perdeberg Red Blend</option>
                    <option value="Perdeberg Rose Blend">Perdeberg Rose Blend</option>
                    <option value="Perdeberg White Blend">Perdeberg White Blend</option>
                    <option value="Pinot Noir">Pinot Noir</option>
                    <option value="Pinotage">Pinotage</option>
                    <option value="Red Blend" title="Cabernet Sauvignon (55%), Shiraz (45%)">Red Blend</option>
                </select>
            </div>
            <div class="filterDivs">
                <label class="filterLabels" for="">Price</label>
                <input type="number" id="minPrice" class="priceInput form-control form-control-sm shadow-5" placeholder="min">
                <input type="number" id="maxPrice" class="priceInput form-control form-control-sm shadow-5" placeholder="max">
            </div>



            <div class="filterDivs">
                <label class="filterLabels" for="">Brand</label>
                <select id="brandfilter" class="selectpicker rounded-2" data-live-search="true" multiple>
                    <option value="Chamonix">Chamonix</option>
                    <option value="Klawer Cellars">Klawer Cellars</option>
                    <option value="Kleine Zalze">Kleine Zalze</option>
                    <option value="Koelenhof Wine Cellar">Koelenhof Wine Cellar</option>
                    <option value="KWV Emporium">KWV Emporium</option>
                    <option value="La Motte">La Motte</option>
                    <option value="Nederburg">Nederburg</option>
                    <option value="Orange River">Orange River</option>
                    <option value="Perderberg Wines">Perdeberg Wines</option>
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
                            <option value="Age">Age</option>
                            <option value="Alchohol %">Alcohol %</option>
                            <option value="Quality">Quality</option>
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
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name0" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName0" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability0" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year0" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName0" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails0" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails0" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating0" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price0" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize0" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name1" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName1" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability1" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year1" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName1" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails1" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails1" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating1" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price1" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize1" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name2" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName2" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability2" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year2" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName2" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails2" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails2" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating2" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price2" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize2" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name3" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName3" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability3" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year3" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName3" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails3" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails3" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating3" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price3" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize3" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name4" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName4" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability4" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year4" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName4" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails4" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails4" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating4" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price4" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize4" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name5" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName5" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability5" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year5" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName5" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails5" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails5" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating5" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price5" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize5" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name6" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName6" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability6" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year6" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName6" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails6" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails6" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating6" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price6" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize6" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name7" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName7" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability7" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year7" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName7" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails7" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails7" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating7" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price7" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize7" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name8" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName8" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability8" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year8" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName8" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails8" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails8" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating8" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price8" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize8" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name9" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName9" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability9" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year9" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName9" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails9" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails9" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating9" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price9" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize9" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name10" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName10" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability10" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year10" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName10" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails10" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails10" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating10" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price10" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize10" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name11" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName11" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability11" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year11" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName11" class="wineDetails" data-mdb-toggle="collapse" data-mdb-target="#awardDetails11" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails11" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating11" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price11" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize11" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
    <script src="JS/Wines.js"></script>

    <script src="css/mod/styling.js"></script>
</body>

</html>