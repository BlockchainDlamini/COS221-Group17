<!DOCTYPE html>
<html lang="en">

<head>
    <title>Management</title>
</head>

<body>
    <?php
    include_once "tabNavigation.php";
    $usersTable = "active";
    $usersTableSelected = "true";
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
                        <th class="h6">First Name</th>
                        <th class="h6">Last Name</th>
                        <th class="h6">Department</th>
                        <th class="h6">User Type</th>
                        <th class="h6">Email</th>
                        <th class="h6">Street Address</th>
                        <th class="h6">Province</th>
                        <th class="h6">Postal Code</th>
                        <th class="h6">Password</th>
                        <th class="h6">Credentials</th>
                        <th class="h6">Preferences</th>
                        <th class="h6">Actions</th>
                    </tr>
                </thead>

                <tbody id="tableBody">
                    <tr class="tableRow">
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
                        <td>mol</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" title="Edit">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </button>
                                <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" title="Delete">
                                    <i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>


                    <tr class="tableRow">
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
                        <td>molp</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" title="Edit">
                                    <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                </button>
                                <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" title="Delete">
                                    <i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="container collapse collapsible">
                <div class="d-flex justify-content-center">
                    <button type="button" onclick="insertIntoTable(this)" style="width:30px;height:30px" class="btn btn-floating" data-mdb-toggle="modal" data-mdb-target="#usersModal"><i class="fa-solid fa-circle-plus fa-lg" style="color: #0cd434;width:30px;height:30px"></i></button>
                </div>
            </div>

        </div>



        <div class="modal fade" id="usersModal" tabindex="-1" data-mdb-backdrop="static" aria-labelledby="usersModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="usersModalLabel">Update Users</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">First Name:</label>
                                <input type="text" class="form-control modalInputs">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Last Name:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Department:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">User Type:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Email:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Street Address:</label>
                                <input class="form-control modalInputs"></input>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Province:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Postal Code:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Password:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Credentials:</label>
                                <input class="form-control modalInputs"></input>
                            </div>

                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Preferences:</label>
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

    </main>

    <?php
    include_once "footer.php";
    ?>

    <script src="js/management.js"></script>
    <script src="js/usersTable.js"></script>
</body>

</html>