const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
const data = {
    "Type": "GetWineyard",
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
        const dataArray = data.data.map(({ wineyard_ID, ...wineyard }) => wineyard);
        dataArray.forEach((wineyard, index) => {
            var newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${wineyard.wineyardID}</td>
                <td>${wineyard.wineyardName}</td>
                <td>${wineyard.wineryName}</td>
                <td>${wineyard.province}</td>
                <td>${wineyard.grapeVariety}</td>
                <td>${wineyard.province}</td>
                <td>${wineyard.address}</td>
                <td>${wineyard.postalCode}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-wineyardID="${wineyard.wineyardID}" data-wineryID="${wineyard.wineryID}" title="Edit">
                            <i class="fa-regular fa-pen-to-square fa-xl"></i>
                        </button>
                        <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-wineyardID="${wineyard.wineyardID}" data-wineryID="${wineyard.wineryID}"title="Delete">
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
    const cols = selectedRow.children;
    const modal = document.getElementsByClassName("modalInputs");

    var m = 0;
    for (var i = 1; i < cols.length - 1; i++) {
        modal[m++].value = cols[i].innerHTML;
    }
    const wineyardID = updateButton.getAttribute("data-wineyardID");
    const wineryID = updateButton.getAttribute("data-wineryID");
    sessionStorage.setItem("wineryID", wineryID);
    sessionStorage.setItem("wineyardID", wineyardID); //save the wineyardID to session storage
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
    const wineyardName = sessionStorage.getItem("Wineyrd Name:");
    const wineryName = sessionStorage.getItem("Winery Name:");
    const area = sessionStorage.getItem("Area:");
    const grapeVariety = sessionStorage.getItem("Grape Variety:");
    const province = sessionStorage.getItem("Province:");
    const steetAddress = sessionStorage.getItem("Street Address:");
    const postalCode = sessionStorage.getItem("Postal Code:");

    const insertData = {
        "Type": "AppendWineyard",
        "AppendInfo": {
            "wineyardName": wineyardName,
            "wineryName": wineryName,
            "postalCode": postalCode,
            "province": province,
            "steetAddress": steetAddress,
            "area": area,
            "grapeVariety": grapeVariety
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
    alert("Wineyard has been appended");
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
    const ID = sessionStorage.getItem("wineyardID");
    const wineryID = sessionStorage.getItem("wineryID");
    const wineyardName = sessionStorage.getItem("Wineyrd Name:");
    const wineryName = sessionStorage.getItem("Winery Name:");
    const area = sessionStorage.getItem("Area:");
    const grapeVariety = sessionStorage.getItem("Grape Variety:");
    const province = sessionStorage.getItem("Province:");
    const steetAddress = sessionStorage.getItem("Street Address:");
    const postalCode = sessionStorage.getItem("Postal Code:");

    const updateData = {
        "Type": "UpdateWineyard",
        "ID": ID, wineryID,
        "UpdateInfo": {
            "wineyardName": wineyardName,
            "wineryName": wineryName,
            "postalCode": postalCode,
            "province": province,
            "steetAddress": steetAddress,
            "area": area,
            "grapeVariety": grapeVariety
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

    alert("Wineyard has been updated");
}

function deleteDatabase() {
    const ID = sessionStorage.getItem("wineyardID");
    const wineryID = sessionStorage.getItem("wineryID");
    const deleteData = {
        "Type": "DeleteWinery",
        "ID": ID, wineryID

    };
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
        },
        body: JSON.stringify(deleteData)
    })
    alert("Wineyard has been deleted");
}