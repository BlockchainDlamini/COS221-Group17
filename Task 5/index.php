<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wines</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="css/mod/bootstrap-3.3.2/css/bootstrapDropdown.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
</head>



<body onscroll="toggleSearchBar(this)">
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
                <input type="number" id="minPrice" class="priceInput form-control form-control-sm" placeholder="min">
                <input type="number" id="maxPrice" class="priceInput form-control form-control-sm" placeholder="max">
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

            <div class="sortDiv">
                <div class="sortGroup btn-group" role="group" aria-label="Sort Wines">
                    <select id="winesort" class="selectpicker">
                        <option value="Name" selected>Name</option>
                        <option value="Age">Age</option>
                        <option value="Alchohol %">Alchohol %</option>
                        <option value="Quality">Quality</option>
                        <option value="Rating">Rating</option>
                    </select>

                    <button id="sortOrder" value="ASC" class="btn btn-secondary" onclick="toggleSortOrder()">
                        <i id="sortOrderIcon" class="fa-solid fa-arrow-up-z-a fa-lg"></i>
                    </button>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name0" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
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
                                    <label id="awardName0" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails0" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName1" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails1" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName2" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails2" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName3" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails3" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName4" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails4" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName5" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails5" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName6" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails6" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName7" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails7" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName8" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails8" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName9" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails9" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="year1" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName10" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails10" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName11" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails11" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName12" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails12" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName13" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails13" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                                <p>
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
                                    <label id="awardName14" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails14" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
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
                <div class="row">
                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name15" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName15" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability15" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year15" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName15" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails15" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails15" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating15" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price15" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize15" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name16" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName16" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability16" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year16" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName16" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails16" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails16" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating16" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price16" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize16" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name17" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName17" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability17" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year17" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName17" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails17" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails17" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating17" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price17" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize17" class="wineDetails">750ml</label>
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
                                <h5 id="name18" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName18" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability18" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year18" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName18" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails18" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails18" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating18" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price18" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize18" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name19" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName19" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability19" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year19" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName19" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails19" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails19" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating19" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price19" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize19" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name20" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName20" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability20" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year20" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName20" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails20" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails20" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating20" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price20" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize20" class="wineDetails">750ml</label>
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
                                <h5 id="name21" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName21" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability21" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year21" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName21" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails21" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails21" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating21" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price21" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize21" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name22" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName22" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability22" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year22" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName22" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails22" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails22" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating22" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price22" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize22" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-light mb-3">
                            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
                            <div class="card-body">
                                <h5 id="name23" class="card-title wineDetails">Diemersfontein Pinotage</h5>
                                <p>
                                <div>
                                    <label for="">Brand:</label>
                                    <label id="brandName23" class="wineDetails">Chamonix</label>
                                </div>
                                <div>
                                    <label for="">Availability:</label>
                                    <label id="availability23" class="wineDetails">In Stock</label>
                                </div>
                                <div>
                                    <label for="">Year:</label>
                                    <label id="year23" class="wineDetails">2025</label>
                                </div>
                                <div>
                                    <label for="">Awards:</label>
                                    <label id="awardName23" class="wineDetails" data-bs-toggle="collapse" data-bs-target="#awardDetails23" role="button" aria-expanded="false" aria-controls="awardDetails" style="color:green">Decanter Award</label>
                                    <div id="awardDetails23" class="collapse collapsibleAwardsDiv">
                                        <label class="wineDetails">Silver for the Old Vine Steen 2021.</label>
                                    </div>

                                </div>
                                <div>
                                    <label for="">Rating:</label>
                                    <label id="rating23" class="wineDetails">4.5</label>
                                </div>
                                <div>
                                    <label for="">Price:</label>
                                    <label id="price23" class="wineDetails">$7.00</label>
                                </div>
                                <div>
                                    <label for="">BottleSize:</label>
                                    <label id="bottleSize23" class="wineDetails">750ml</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>


    <?php
    include_once "footer.php";
    ?>

    <script src="css/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
    <script src="css/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="JS/Wines.js"></script>

    <script src="css/mod/styling.js"></script>
</body>

</html>