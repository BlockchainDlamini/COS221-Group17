    const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';

    function generateRow(brandID, rowIndex) {
        var newRow = document.createElement("tr");
        newRow.innerHTML = '<td></td><td></td><td></td><td></td><td></td><td></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#brandsModal" data-mdb-ripple-color="dark" data-brandID="' + brandID + '" data-rowIndex="' + rowIndex + '" title="Edit"><i class="fa-regular fa-pen-to-square fa-xl"></i></button><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#brandsModal" data-mdb-ripple-color="dark" data-brandID="' + brandID + '" data-rowIndex="' + rowIndex + '" title="Delete"><i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i></button></div></td>';

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
        const rowIndex = updateButton.getAttribute("data-rowIndex");
        sessionStorage.setItem("brandID", brandID); //save the brandID to session storage
        sessionStorage.setItem("rowIndex", rowIndex);
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
                if (result.status === "success") {
                    alert("Update successful!");
                    var table = document.getElementById("tableBody");
                    var row = table.getElementsByTagName("tr")[rowIndex];
                
                    var tds = row.querySelectorAll("td"); 
                    for (var i = 0; i < tds.length; i++) {
                        if (i === 0)
                            tds[i].textContent = brandID;
                        if (i === 1)
                            tds[i].textContent = nameInput;
                        if (i === 2)
                            tds[i].textContent = provinceInput;
                        if (i === 3)
                            tds[i].textContent = phoneNumberInput;
                        if (i === 4)
                            tds[i].textContent = emailInput;
                        if (i === 5)
                            tds[i].textContent = postalCodeInput;
                    }
                } else {
                    alert("Update failed!");
                }
            })
            .catch(error => {
                console.error(error);
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
                "Type": "AppendBrand",
                "AppendInfo": formData
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
                if (result.status === "success")
                    alert("Append successful!");
                else 
                    alert("Append failed!");
            })
            .catch(error => {
                console.error(error);
                alert("Append failed!");
            });
        });
    }

    const data = {
        "Type": "GetBrand", 
        "Return": "*", 
        "Limit": 11
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
    .then(data => {
        const dataArray = data.data.map(({ brandID, ...brand }) => brand);
        var tableBody = getElementById("tableBody");
        tableBody.innerHTML = "";

        dataArray.forEach((brand, index) => {
            var row = generateRow(brand.brandID, index);
            tableBody.appendChild(row);
            var tds = row.querySelectorAll("td");
            for (var i = 0; i < tds.length; i++) {
                if (i === 0)
                    tds[i].textContent = brand.brandID;
                if (i === 1)
                    tds[i].textContent = brand.name;
                if (i === 2)
                    tds[i].textContent = brand.province;
                if (i === 3)
                    tds[i].textContent = brand.phoneNumber;
                if (i === 4)
                    tds[i].textContent = brand.email;
                if (i === 5)
                    tds[i].textContent = brand.postalCode;
            }
        });
    })
    .catch(error => {
        console.error(error);
    });

    document.getElementById("btnConfirm").addEventListener("click", function() {
        brandID = sessionStorage.getItem("brandID");
        const data = {
            "Type": "DeleteBrand",
            "ID": brandID
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
        .then(data => {
            if (data.status === "success")
                alert("Delete successful!");
            else 
                alert("Delete failed!");
        })
        .catch(error => {
            console.error(error);
        });
    });



  
