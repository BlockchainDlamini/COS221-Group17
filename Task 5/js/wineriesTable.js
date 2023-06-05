function generateRow(wineryID) {
    var newRow = document.createElement("tr");
    newRow.innerHTML = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#wineriesModal" data-mdb-ripple-color="dark" data-wineryID=' + wineryID + ' title="Edit"><i class="fa-regular fa-pen-to-square fa-xl"></i></button><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#wineriesModal" data-mdb-ripple-color="dark" data-wineryID=' + wineryID + ' title="Delete"><i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i></button></div></td>';

    newRow.classList.add("tableRow");
    return newRow;
}

function updateTable(updateButton) {
    //skip index 0 and index 12(row number and actions column)
    const selectedRow = updateButton.closest("tr");
    const cols = selectedRow.children;
    const modal = document.getElementsByClassName("modalInputs");

    var m = 0;
    for (var i = 1; i < cols.length - 1; i++) {
        modal[m++].value = cols[i].innerHTML;
    }
    const wineryID = updateButton.getAttribute("data-wineryID");
    sessionStorage.setItem("wineryID", wineryID); //save the wineryID to session storage
}


function insertIntoTable(insertButton) {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }
}