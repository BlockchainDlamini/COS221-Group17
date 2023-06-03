<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wines</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="css/mod/bootstrap-3.3.2/css/bootstrapDropdown.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
</head>



<body>


    <?php include_once "header.php"; ?>

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
            <button type="button" class="btn btn-secondary">Go</button>
        </div>

    </div>

    <main>

        <div class="sortDiv">
            <div class="sortGroup btn-group" role="group" aria-label="Sort Wines">
                <select id="winesort" class="selectpicker">
                    <option value="Name" selected>Name</option>
                    <option value="Age">Age</option>
                    <option value="Alchohol Percentage">Alchohol %</option>
                    <option value="Quality">Quality</option>
                    <option value="Rating">Rating</option>
                </select>

                <select id="sortorder" class="selectpicker">
                    <option id="mama" value="Asc" selected>Asc</option>
                    <option value="Desc">Desc</option>
                </select>
            </div>
        </div>




        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>

        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>

        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>

        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>

        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>

        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>

        <div class="card border-light mb-3" style="max-width: max-content;">
            <img class="card-img-top" src="img/winebottle.jpg" style="width:100px;height:200px;margin:auto">
            <div class="card-body">
                <h5 class="card-title">Diemersfontein Pinotage</h5>
                <p>Age: 15 years<br>Alchohol Percentage: 14%<br>Quality: Excellent<br>Rating: 5 stars<br>Price: R450</p>
            </div>
        </div>




    </main>



    <script src="css/jquery-3.7.0/jquery-3.7.0.min.js"></script>
    <script src="css/bootstrap-3.3.2/dist/js/bootstrap.min.js"></script>
    <script src="css/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="JS/Wines.js"></script>

    <script src="css/mod/styling.js"></script>


    <?php include_once "footer.php"; ?>
</body>

</html>