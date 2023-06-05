function generateRow(userID) {
    var newRow = document.createElement("tr");
    newRow.innerHTML = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID=' + userID + ' title="Edit"><i class="fa-regular fa-pen-to-square fa-xl"></i></button><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID=' + userID + ' title="Delete"><i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i></button></div></td>';

    newRow.classList.add("tableRow");
    return newRow;

    // var theTable = document.getElementById("tableBody");
    // theTable.appendChild(newRow);
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
    const userID = updateButton.getAttribute("data-userID");
    sessionStorage.setItem("userID", userID); //save the userID to session storage
}


function insertIntoTable(insertButton) {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }
}