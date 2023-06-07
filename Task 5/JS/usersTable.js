const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
const data = {
    "Type": "GetUser",
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
        const dataArray = data.data.map(({ userID, ...user }) => user);

        dataArray.forEach((user, index) => {
            var newRow = generateRow(user.User_ID, user.User_Type, index);
            const cells = newRow.getElementsByClassName("userData");
            console.log(cells.length);
            for (var i = 0; i < cells.length; i++) {
                cells[0].innerHTML = user.First_Name + " " + user.Last_Name;
                cells[1].innerHTML = user.Email;
                cells[2].innerHTML = user.Department;
                cells[3].innerHTML = user.Street_Address;
                cells[4].innerHTML = user.Province;
                cells[5].innerHTML = user.User_Type;
                cells[6].innerHTML = user.Postal_Code;
                cells[7].innerHTML = user.Phone_Number;
                // cells[7].innerHTML = preferences;
            }


            var theTable = document.getElementById("tableBody");
            theTable.appendChild(newRow);
        })

    });


function generateRow(userID, userType, rowIndex) {
    var badgeColour = "badge-primary";
    var editableStatus = "wineEdit";
    if (userType.toUpperCase() == "CUSTOMER") {
        badgeColour = "badge-primary";
        editableStatus = "wineEdit";
        userType = "Customer";
    }
    else if (userType.toUpperCase() == "CRITIC") {
        badgeColour = "badge-warning";
        editableStatus = "wineEdit";
        userType = "Critic";
    }
    else if (userType.toUpperCase() == "MANAGER") {
        badgeColour = "badge-danger";
        editableStatus = "";
        userType = "Manager";
    }

    var newRow = document.createElement("tr");
    newRow.innerHTML = '<td><div class="d-flex align-items-center ps-1"><i class="fa-solid fa-circle-user fa-2xl" style="width: 40px; height: 40px"></i><div class="ms-3"><p class="fw-bold mb-1 userData"></p><p class="text-muted mb-0 userData"></p></div></div></td><td class="userData"></td><td class="userData"></td><td class="userData"></td><td><span class="badge ' + badgeColour + ' rounded-pill d-inline userData"></span></td><td class="userData"></td><td class="userData"></td><td class="userData"></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="prepareForUpdate(this)" class="btn btn-link btn-floating btn-sm fw-bold ' + editableStatus + '" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID="' + userID + '" data-rowIndex="' + rowIndex + '" title="Edit"><i class="fa-regular fa-pen-to-square fa-xl"></i></button><button disabled type="button" onclick="" class="btn btn-link btn-floating btn-sm fw-bold ' + editableStatus + '" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID="' + userID + '" data-rowIndex="' + rowIndex + '" title="Delete"><i class="fa-solid fa-trash fa-xl" style="color: #f83a3a;"></i></button></div></td>';

    newRow.classList.add("tableRow");
    return newRow;
}

function prepareForUpdate(updateButton) {
    //skip index 0 and index 12(row number and actions column)
    const selectedRow = updateButton.closest("tr");
    const columnNameElements = document.getElementsByClassName("col-form-label");
    // for (let i = 0; i < columnNameElements.length; i++) {
    //     const columnName = columnNameElements[i].textContent;
    //     console.log(columnName);
    // }
    const cols = selectedRow.getElementsByClassName("userData");
    const modal = document.getElementsByClassName("modalInputs");
    var m = 0;
    var fullName = cols[0].innerHTML.split(" ");
    modal[m++].value = fullName[0];
    modal[m++].value = fullName[1];
    for (var i = 1; i < cols.length; i++) {
        modal[m++].value = cols[i].innerHTML;
    }

    var j = 0;
    sessionStorage.setItem(columnNameElements[j++].innerHTML, fullName[0]);
    sessionStorage.setItem(columnNameElements[j++].innerHTML, fullName[1]);
    for (var i = 1; i < cols.length; i++) {
        sessionStorage.setItem(columnNameElements[j++].innerHTML, cols[i].innerHTML);
    }
    const userID = updateButton.getAttribute("data-userID");
    sessionStorage.setItem("userID", userID); //save the userID to session storage
}


function insertIntoTable(insertButton) {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }
} function insertDatabase() {
    const ID = sessionStorage.getItem("userID");
    const FirstName = sessionStorage.getItem("First Name:");
    const lastName = sessionStorage.getItem("Last Name:");
    const department = sessionStorage.getItem("Department:");
    const userType = sessionStorage.getItem("User Type:");
    const email = sessionStorage.getItem("Email:");
    const streetAddress = sessionStorage.getItem("Street Address:");
    const province = sessionStorage.getItem("Province:");
    const postalCode = sessionStorage.getItem("Postal Code:");
    const password = sessionStorage.getItem("Password:");
    const credentials = sessionStorage.getItem("Credentials:");
    const preferences = sessionStorage.getItem("Preferences:");
    const phoneNumber = sessionStorage.getItem("Phone Number:");
    const insertData = {
        "Type": "AppendUser",
        "AppendInfo": {
            "fName": FirstName,
            "lName": lastName,
            "email": email,
            "userType": userType,
            "phoneNumber": phoneNumber,
            "streetAddress": streetAddress,
            "province": province,
            "postalCode": postalCode,
            "department": " ",
            "password": password,
            "credentials": " ",
            "preferences": " "
        }
    };
    console.log(insertData);
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
        },
        body: JSON.stringify(insertData)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(data["status"])
            if (data["status"] === "sucesss") {
                alert("User has been appended");
            } else {
                console.log("data")
            }
        })
}

function updateSessionStorage() {
    const modal = document.getElementsByClassName("modalInputs");
    const columnNameElements = document.getElementsByClassName("col-form-label");
    for (var i = 0; i < modal.length; i++) {
        if (modal[i].value != sessionStorage.getItem(columnNameElements[i].textContent)) {
            sessionStorage.setItem(columnNameElements[i].textContent, modal[i].value);
        }
    }
    alert("Changes have been saved")
}

function updateDatabase() {
    const ID = sessionStorage.getItem("userID");
    console.log(ID);
    const FirstName = sessionStorage.getItem("First Name:");
    console.log(FirstName);
    const lastName = sessionStorage.getItem("Last Name:");
    const department = sessionStorage.getItem("Department:");
    const userType = sessionStorage.getItem("User Type:");
    const email = sessionStorage.getItem("Email:");
    const streetAddress = sessionStorage.getItem("Street Address:");
    const province = sessionStorage.getItem("Province:");
    const postalCode = sessionStorage.getItem("Postal Code:");
    const password = sessionStorage.getItem("Password:");
    const credentials = sessionStorage.getItem("Credentials:");
    const preferences = sessionStorage.getItem("Preferences:");
    const phoneNumber = sessionStorage.getItem("Phone Number:");
    const updateData = {
        "Type": "UpdateUser",
        "ID": ID,
        "UpdateInfo": {
            "fName": FirstName,
            "lName": lastName,
            "email": email,
            "userType": userType,
            "phoneNumber": phoneNumber,
            "streetAddress": streetAddress,
            "province": province,
            "postalCode": postalCode,
            "department": department,
            "password": password,
            "credentials": credentials,
            "prefences": preferences
        }
    };
    console.log(updateData);
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
        },
        body: JSON.stringify(updateData)
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(data["status"])
            if (data["status"] === "sucesss") {
                alert("User has been updated");
            } else {
                console.log("data")
            }
        })

}


function deleteDatabase() {
    const ID = sessionStorage.getItem("userID");
    const deleteData = {
        "Type": "DeleteUser",
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
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
    alert("User has been deleted");
}