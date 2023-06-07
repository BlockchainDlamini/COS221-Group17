<!DOCTYPE html>
<html lang="en">

<head>
    <title>Management</title>
    <link rel="icon" media="(prefers-color-scheme: dark)" href="img/favicon-dark/favicon-dark.ico">
    <link rel="icon" media="(prefers-color-scheme: light)" href="img/favicon-light/favicon-light.ico">
</head>

<body>
    <?php
    include_once "tabNavigation.php";
    $winesTable = "active";
    $winesTableSelected = "true";
    include_once "management.php";
    ?>

    <main>
        <div>
            <div>
                <div class="text-center">
                    <button id="modifyTable" class="btn btn-success btn-rounded" onclick="toggleTableEdit()" data-mdb-toggle="collapse" data-mdb-target=".collapsible" aria-expanded="false" aria-controls="collapsible">Modify Table</button>
                    <div id="modifyTableContent" class="collapse collapsible">
                        <label for="">status:</label>
                        <span class="badge badge-success rounded-pill d-inline">Table modification in progress</span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="text" class="search form-control" placeholder="Search..." style="width:280px;margin-right:20px;">
            </div>


        </div>

        <div class="tableWrapper">
            <table id="winesTable" class="table caption-top table-hover results">
                <caption class="rowCount">
                </caption>
                <thead class="bg-light">
                    <tr>
                        <th class="h6" style="min-width:5px !important;">#</th>
                        <th class="h6">Wine Name</th>
                        <th class="h6">Brand</th>
                        <th class="h6">Winery</th>
                        <th class="h6">Price</th>
                        <th class="h6">Bottle Size</th>
                        <th class="h6">Varietal</th>
                        <th class="h6">Category</th>
                        <th class="h6">Alcohol%</th>
                        <th class="h6">Year</th>
                        <th class="h6">pH</th>
                        <th class="h6">Quality</th>
                        <th class="h6">Actions</th>
                    </tr>
                    <tr class="warning no-result text-center">
                        <td colspan="13"><i class="fa fa-warning"></i> No result</td>
                    </tr>
                </thead>

                <tbody id="tableBody">
                    <tr data-mdb-toggle="collapse" data-mdb-target="#demo1" class="accordion-toggle tableRow">
                        <td>1</td>
                        <td>Chamonix Old Vine Steen</td>
                        <td>alate</td>
                        <td>lolodvd</td>
                        <td>lololo</td>
                        <td>lolo</td>
                        <td>lolo</td>
                        <td>loolo</td>
                        <td>lolo</td>
                        <td>ololo</td>
                        <td>oolo</td>
                        <td>molk</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button disabled type="button" onmouseup="preventRowExtension(this)" onclick="prepareForUpdate(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#winesModal" data-mdb-ripple-color="dark" title="Edit">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </button>
                                <button disabled type="button" onmouseup="preventRowExtension(this)" onclick="" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#deleteModal" data-mdb-ripple-color="dark" title="Delete">
                                    <i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="13" class="hiddenRow">
                            <div class="accordian-body collapse" id="demo1">
                                <table class="table table-sm ms-4 table-striped mb-0">
                                    <thead class="bg-info text-dark" style="--mdb-bg-opacity:0.19;">
                                        <tr>
                                            <th>Description</th>
                                            <th>Wineyard</th>
                                            <th>Award</th>
                                            <th>Year Awarded</th>
                                            <th>Award Details</th>
                                            <th>Residual Sugar</th>
                                            <th>Cellaring Potential</th>
                                            <th>Production Method</th>
                                            <th>Production Date</th>
                                            <th>Bottles Made</th>
                                            <th>Bottles Sold</th>
                                            <th>Image URL</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr data-mdb-toggle="collapse">
                                            <td class="text-truncate" style="max-width: 5px;">The old vine wine has a lemon-green colour and exquisite aroma, with scents reminiscent of stone </td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>bot</td>
                                            <td>lololo</td>
                                            <td class="text-truncate" style="max-width: 5px;">lolol</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </td>
                    </tr>

                    <tr data-mdb-toggle="collapse" data-mdb-target="#demo2" class="accordion-toggle tableRow">
                        <td>2</td>
                        <td>Chamonix Old Vine Steen</td>
                        <td>alate</td>
                        <td>lolodvd</td>
                        <td>lololo</td>
                        <td>lolo</td>
                        <td>lolo</td>
                        <td>loolo</td>
                        <td>lolo</td>
                        <td>ololo</td>
                        <td>oolo</td>
                        <td>mol</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button disabled type="button" onmouseup="preventRowExtension(this)" onclick="prepareForUpdate(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#winesModal" data-mdb-ripple-color="dark" title="Edit">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </button>
                                <button disabled type="button" onmouseup="preventRowExtension(this)" onclick="" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#deleteModal" data-mdb-ripple-color="dark" title="Delete">
                                    <i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="13" class="hiddenRow">
                            <div class="accordian-body collapse" id="demo2">
                                <table class="table table-sm ms-4 table-striped mb-0">
                                    <thead class="bg-info text-dark" style="--mdb-bg-opacity:0.19;">
                                        <tr>
                                            <th>Description</th>
                                            <th>Vineyard</th>
                                            <th>Award</th>
                                            <th>Year Awarded</th>
                                            <th>Award Details</th>
                                            <th>Residual Sugar</th>
                                            <th>Cellaring Potential</th>
                                            <th>Production Method</th>
                                            <th>Production Date</th>
                                            <th>Bottles Made</th>
                                            <th>Bottles Sold</th>
                                            <th>Image URL</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr data-mdb-toggle="collapse" class="accordion-toggle">
                                            <td class="text-truncate" style="max-width: 5px;">The old vine wine has a lemon-green colour and exquisite aroma, with scents reminiscent of stone </td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td>lololo</td>
                                            <td class="text-truncate" style="max-width: 5px;">lolol</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </td>
                    </tr>


                </tbody>
            </table>

            <div class="container collapse collapsible">
                <div class="d-flex justify-content-center">
                    <button type="button" onclick="prepareForInsert()" style="width:30px;height:30px" class="btn btn-floating" data-mdb-toggle="modal" data-mdb-target="#winesModal"><i class="fa-solid fa-circle-plus fa-lg" style="color: #0cd434;width:30px;height:30px"></i></button>
                </div>
            </div>

        </div>



        <div class="modal fade" id="winesModal" tabindex="-1" data-mdb-backdrop="static" aria-labelledby="winesModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="winesModalLabel">Update Wines</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Wine Name:</label>
                                <input type="text" class="form-control modalInputs">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Brand:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Winery:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Price:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Bottle Size:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Varietal:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Category:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Alcohol %:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Year:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">pH:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Quality:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control modalInputs"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Vineyard:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Award:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Year Awarded:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Award Details:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Residual Sugar:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Cellaring Potential:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Production Method:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Production Date:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Bottles Made:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Bottles Sold:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Image URL:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">CLOSE</button>
                        <button type="button" class="btn btn-primary">DONE</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="fa-solid fa-triangle-exclamation fa-xl me-3" style="color: #f2c72c;"></i>
                        <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">Are you sure you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">NO</button>
                        <button type="button" class="btn btn-secondary">YES</button>
                    </div>
                </div>
            </div>
        </div>

    </main>


    <?php
    include_once "footer.php";
    ?>

    <script src="js/winesTable.js"></script>
</body>

</html>