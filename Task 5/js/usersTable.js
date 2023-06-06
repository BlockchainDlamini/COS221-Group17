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
            var newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${user.User_ID}</td>
                <td>${user.First_Name}</td>
                <td>${user.Last_Name}</td>
                <td>${user.Department}</td>
                <td>${user.User_Type}</td>
                <td>${user.Phone_Number}</td>
                <td>${user.Street_Address}</td>
                <td>${user.Province}</td>
                <td>${user.Postal_Code}</td>
                <td>${user.Password}</td>
                <td>${user.Credentials}</td>
                <td>${user.Preferences}</td>
                <td>
                    <div class="d-flex justify-content-around">
                        <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID="${user.User_ID}" title="Edit">
                            <i class="fa-regular fa-pen-to-square fa-xl"></i>
                        </button>
                        <button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-toggle="modal" data-mdb-target="#usersModal" data-mdb-ripple-color="dark" data-userID="${user.User_ID}" title="Delete">
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
    // for (let i = 0; i < columnNameElements.length; i++) {
    //     const columnName = columnNameElements[i].textContent;
    //     console.log(columnName);
    // }
    const cols = selectedRow.children;
    const modal = document.getElementsByClassName("modalInputs");
    var m = 0;
    for (var i = 1; i < cols.length - 1; i++) {
        modal[m++].value = cols[i].innerHTML;
    }
    for (var i = 0; i < cols.length; i++) {
        if (columnNameElements[i] && cols[i + 1]) {
            sessionStorage.setItem(columnNameElements[i].textContent, cols[i + 1].innerHTML);
        }
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
        })
    alert("User has been appended");
}

function updateSessionStorage() {
    const modal = document.getElementsByClassName("modalInputs");
    const columnNameElements = document.getElementsByClassName("col-form-label");
    for (var i = 0; i < modal.length; i++) {
        if (modal[i].value != sessionStorage.getItem(columnNameElements[i].textContent)) {
            sessionStorage.setItem(columnNameElements[i].textContent, modal[i].value);
        }
    }
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