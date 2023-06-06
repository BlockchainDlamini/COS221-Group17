function generateRow(brandID) {
    var newRow = document.createElement("tr");
    newRow.innerHTML = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#brandsModal" data-mdb-ripple-color="dark" data-brandID=' + brandID + ' title="Edit"><i class="fa-regular fa-pen-to-square fa-xl"></i></button><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#brandsModal" data-mdb-ripple-color="dark" data-brandID=' + brandID + ' title="Delete"><i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i></button></div></td>';

    newRow.classList.add("tableRow");
    return newRow;
}

function prepareForUpdate(updateButton) {
    //skip index 0 and index 12(row number and actions column)
    const selectedRow = updateButton.closest("tr");
    const cols = selectedRow.children;
    const modal = document.getElementsByClassName("modalInputs");

    var m = 0;

    for (var i = 1; i < cols.length - 1; i++) {
        modal[m++].value = cols[i].innerHTML;
    }
    const brandID = updateButton.getAttribute("data-brandID");
    sessionStorage.setItem("brandID", brandID); //save the brandID to session storage
}


function prepareForInsert() {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }
}