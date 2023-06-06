function generateRow(userID, userType) {
    var badgeColour = "badge-primary";
    var editableStatus = "wineEdit";
    if (userType == "Customer") {
        badgeColour = "badge-primary";
        editableStatus = "wineEdit";
    }
    else if (userType == "Critic") {
        badgeColour = "badge-warning";
        editableStatus = "wineEdit";
    }
    else if (userType == "Manager") {
        badgeColour = "badge-danger";
        editableStatus = "";
    }

    var newRow = document.createElement("tr");
    newRow.innerHTML = '<td><div class="d-flex align-items-center ps-1"><i class="fa-solid fa-circle-user fa-2xl" style="width: 40px; height: 40px"></i><div class="ms-3"><p class="fw-bold mb-1 userData"></p><p class="text-muted mb-0 userData"></p></div></div></td><td class="userData"></td><td class="userData"></td><td class="userData"></td><td><span class="badge ' + badgeColour + ' rounded-pill d-inline userData"></span></td><td class="userData"></td><td class="userData"></td><td class="userData"></td><td class="userData"></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="prepareForUpdate(this)" class="btn btn-link btn-floating btn-sm fw-bold ' + editableStatus + '" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID='+userID+' title="Edit"><i class="fa-regular fa-pen-to-square fa-xl"></i></button><button disabled type="button" onclick="prepareForUpdate(this)" class="btn btn-link btn-floating btn-sm fw-bold ' + editableStatus + '" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID='+userID+' title="Delete"><i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i></button></div></td>';

    newRow.classList.add("tableRow");
    return newRow;
}

function prepareForUpdate(updateButton) {
    const selectedRow = updateButton.closest("tr");
    const data = selectedRow.getElementsByClassName("userData");
    const modal = document.getElementsByClassName("modalInputs");

    var m = 0;

    for (var i = 0; i < data.length; i++) {
        modal[m++].value = data[i].innerHTML;
    }
    const userID = updateButton.getAttribute("data-userID");
    sessionStorage.setItem("userID", userID); //save the userID to session storage
}


function prepareForInsert() {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }
}