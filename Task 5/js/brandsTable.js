const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';

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
    console.log("BrandID: " + brandID);
    
    document.getElementById("btnDone").addEventListener("click", function() {
        var formData = {};
        var nameInput = document.getElementById("formName").value;
        var provinceInput = document.getElementById("formProvince").value;
        var phoneNumberInput = document.getElementById("formNumber").value;
        var emailInput = document.getElementById("formEmail").value;
        var streetAddressInput = document.getElementById("formAddress").value;
        var postalCodeInput = document.getElementById("formPostalCode").value;


        if (nameInput !== "") 
            formData["name"] = nameInput;
        if (provinceInput !== "") 
            formData["province"] = provinceInput;
        if (phoneNumberInput !== "") 
            formData["phone_number"] = phoneNumberInput;
        if (emailInput !== "") 
            formData["email"] = emailInput;
        if (streetAddressInput !== "") 
            formData["street_address"] = streetAddressInput;
        if (postalCodeInput !== "") 
            formData["postal_code"] = postalCodeInput;

        const data = {
            "Type": "UpdateBrand",
            "ID": brandID,
            "UpdateInfo": formData
        };

        fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(result => {
            console.log(result);
            var divElement = document.querySelector(".modal-body");
            divElement.style.display = "none";
            document.getElementById("btnDone").style.display = "none";
            alert("Update successful!");
          })
          .catch(error => {
            console.error(error);
            var divElement = document.querySelector(".modal-body");
            divElement.style.display = "none";
            document.getElementById("btnDone").style.display = "none";
            alert("Update failed!");
          });
    });
}


function prepareForInsert() {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }

    document.getElementsById("btnDone").addEventListener("click", function() {
        var nameInput = form.querySelector("#name-input").value;
        var provinceInput = form.querySelector("#province-input").value;
        var phoneNumberInput = form.querySelector("#phone-number-input").value;
        var emailInput = form.querySelector("#email-input").value;
        var streetAddressInput = form.querySelector("#street-address-input").value;
        var postalCodeInput = form.querySelector("#postal-code-input").value;
        const data = {
          "Type": "GetWines",
          "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "brandName", "awardName", "awardDetails"],
          "Limit": 24,
          "Sort": "name"
        }
    });
}