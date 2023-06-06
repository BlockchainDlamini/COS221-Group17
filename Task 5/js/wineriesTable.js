const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
const data = {
    "Type": "GetWinery",
    "Return": "*"
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
        console.log(data);
        const dataArray = data.data.map(({ wineryID, ...winery }) => winery);
        dataArray.forEach((winery, index) => {
            var newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${winery.Winery_ID}</td>
                <td>${winery.Name}</td>
                <td>${winery.Province}</td>
                <td>${winery.Street_Address}</td>
                <td>${winery.Postal_Code}</td>
                <td>${winery.Email}</td>
                <td>${winery.Phone_Number}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID="${winery.Winery_ID}" title="Edit">
                            <i class="fa-regular fa-pen-to-square fa-xl"></i>
                        </button>
                        <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID="${winery.Winery_ID}" title="Delete">
                            <i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i>
                        </button>
                    </div>
                </td>
            `;

            newRow.classList.add("tableRow");
            var theTable = document.getElementById("tableBody");
            theTable.appendChild(newRow);
        })

    });

function updateTable(updateButton) {
    //skip index 0 and index 12(row number and actions column)
    const selectedRow = updateButton.closest("tr");
    const columnNameElements = document.getElementsByClassName("col-form-label");
    const cols = selectedRow.children;
    const modal = document.getElementsByClassName("modalInputs");

    var m = 0;
    for (var i = 1; i < cols.length - 1; i++) {
        modal[m++].value = cols[i].innerHTML;
    }
    for (var i = 0; i < cols.length; i++) {
        sessionStorage.setItem(columnNameElements[i].textContent, cols[i + 1].innerHTML);
        sessionStorage.setItem(columnNameElements[i].textContent + "changed", 0);
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
function insertSessionStorage() {
    const modal = document.getElementsByClassName("modalInputs");
    const columnNameElements = document.getElementsByClassName("col-form-label");
    for (var i = 0; i < modal.length; i++) {
        if (modal[i].value != sessionStorage.getItem(columnNameElements[i].textContent)) {
            sessionStorage.setItem(columnNameElements[i].textContent, modal[i].value);
        }
    }
}
function insertDatabase() {
    const wineryName = sessionStorage.getItem("Winery Name:");
    const brand = sessionStorage.getItem("Brand:");
    const province = sessionStorage.getItem("Province:");
    const address = sessionStorage.getItem("Street Address:");
    const postalCode = sessionStorage.getItem("Postal Code:");
    const email = sessionStorage.getItem("Email:");
    const phoneNumber = sessionStorage.getItem("Phone Number:");

    const insertData = {
        "Type": "AppendWinery",
        "AppendInfo": {
            "name": wineryName,
            "phoneNumer": phoneNumber,
            "email": email,
            "postalCode": postalCode,
            "province": province,
            "streetAddress": address,
            "brandName": brand
        }
    };
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
        },
        body: JSON.stringify(insertData)
    })
    alert("Winery has been appended");
}

function updateSessionStorage() {
    const modal = document.getElementsByClassName("modalInputs");
    const columnNameElements = document.getElementsByClassName("col-form-label");
    for (var i = 0; i < modal.length; i++) {
        if (modal[i].value != sessionStorage.getItem(columnNameElements[i].textContent)) {
            sessionStorage.setItem(columnNameElements[i].textContent, modal[i].value);
            sessionStorage.setItem(columnNameElements[i].textContent + "changed", 1);
        }
    }
}

function updateDatabase() {
    const ID = sessionStorage.getItem("wineryID");
    const wineryName = sessionStorage.getItem("Winery Name:");
    const brand = sessionStorage.getItem("Brand:");
    const province = sessionStorage.getItem("Province:");
    const address = sessionStorage.getItem("Street Address:");
    const postalCode = sessionStorage.getItem("Postal Code:");
    const email = sessionStorage.getItem("Email:");
    const phoneNumber = sessionStorage.getItem("Phone Number:");

    const updateData = {
        "Type": "UpdateWinery",
        "ID": ID,
        "UpdateInfo": {
            "name": wineryName,
            "phoneNumer": phoneNumber,
            "email": email,
            "postalCode": postalCode,
            "province": province,
            "streetAddress": address,
            "brandName": brand
        }
    };
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
        },
        body: JSON.stringify(updateData)
    })

    alert("Winery has been updated");
}

function deleteDatabase() {
    const ID = sessionStorage.getItem("wineryID");
    const deleteData = {
        "Type": "DeleteWinery",
        "ID": ID

    };
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
        },
        body: JSON.stringify(deleteData)
    })
    alert("Winery has been deleted");
}