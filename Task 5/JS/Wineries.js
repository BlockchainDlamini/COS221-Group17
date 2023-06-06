    const url = "https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php";
    const data = {
        "Type": "GetWinery",
        "Return": "*",
        "Sort": "name",
        "Order": "ASC",
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
        const images = document.querySelectorAll('.card-img-top');
        const wineryDetails = document.querySelectorAll('.wineryDetails');
        const dataArray = data.data.map(({ wineryID, ...winery }) => winery);

        clearScreen();
        dataArray.forEach((winery, index) => {
            if (index < wineryDetails.length) {
                images[index].src = winery.Winery_URL;
                document.getElementById(`name${index}`).innerHTML = winery.Name;
                document.getElementById(`Province${index}`).innerHTML = winery.Province;
                document.getElementById(`StreetAddress${index}`).innerHTML = winery.Street_Address;
                document.getElementById(`PostalCode${index}`).innerHTML = winery.Postal_Code;
                document.getElementById(`Email${index}`).innerHTML = winery.Email;
                document.getElementById(`PhoneNumber${index}`).innerHTML = winery.Phone_Number;
                document.getElementById(`Rating${index}`).innerHTML = winery.rating;
            }
        });
    })
    .catch(error => console.error('Error:', error));
        

    document.getElementById("sortOrder").addEventListener("click", sort);
    function sort() {    
      document.getElementById('winesort').onchange = function() {
        const sortOrderButton = document.getElementById('sortOrder');
        const selectedValue = this.value;
        var sortOrderValue = sortOrderButton.value;
        var request = "";
  
        switch (selectedValue) {
          case "Name":
            request = {
              "Type": "GetWinery",
              "Return": "*",
              "Limit": 11,
              "Sort" : "name",
              "Order" : sortOrderValue
            };
            break;
          case "Rating":
            request = {
                "Type": "GetWinery",
                "Return": "*",
                "Limit": 11,
                "Sort" : "rating",
                "Order" : sortOrderValue
              };
            break;
        }
      
        fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
          },
          body: JSON.stringify(request)
        })
        .then(response => response.json())
        .then(data => {
          const images = document.querySelectorAll('.card-img-top');
          const wineryDetails = document.querySelectorAll('.wineryDetails');
          const dataArray = data.data.map(({ wineryID, ...winery }) => winery);
  
          clearScreen();
          dataArray.forEach((winery, index) => {
            if (index < wineryDetails.length) {
              images[index].src = winery.Winery_URL;
              document.getElementById(`name${index}`).innerHTML = winery.Name;
              document.getElementById(`Province${index}`).innerHTML = winery.Province;
              document.getElementById(`StreetAddress${index}`).innerHTML = winery.Street_Address;
              document.getElementById(`PostalCode${index}`).innerHTML = winery.Postal_Code;
              document.getElementById(`Email${index}`).innerHTML = winery.Email;
              document.getElementById(`PhoneNumber${index}`).innerHTML = winery.Phone_Number;
              document.getElementById(`Rating${index}`).innerHTML = winery.rating;
            }
          });
        })
        .catch(error => console.error('Error:', error));
    };
  }

  function clearScreen() {
    const images = document.querySelectorAll('.card-img-top');
    const wineryDetails = document.querySelectorAll('.wineryDetails');

    images.forEach((image) => {
      image.src = '';
    });
    
    wineryDetails.forEach((detail) => {
      detail.innerHTML = '';
    });
  }

  function search() {
    var inputElement = document.querySelector('.form-control'); // Get the input element using a class selector
    var inputValue = inputElement.value; // Get the value of the input field
    var fuzzy = true;
    const data = {
      Type: "GetWinery",
      Return:"*",
      Search: {
        name: inputValue
      },
      Fuzzy: fuzzy
    };
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: "Basic " + btoa("u22557858:NeimanAris123#")
      },
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        const images = document.querySelectorAll('.card-img-top');
        const wineryDetails = document.querySelectorAll('.wineryDetails');
        console.log(data);
        const dataArray = data.data.map(({wineryID, ...winery }) => winery);

        clearScreen();
        dataArray.forEach((winery, index) => {
          if (index < wineryDetails.length) {
            images[index].src = winery.Winery_URL;
            document.getElementById(`name${index}`).innerHTML = winery.Name;
            document.getElementById(`Province${index}`).innerHTML = winery.Province;
            document.getElementById(`StreetAddress${index}`).innerHTML = winery.Street_Address;
            document.getElementById(`PostalCode${index}`).innerHTML = winery.Postal_Code;
            document.getElementById(`Email${index}`).innerHTML = winery.Email;
            document.getElementById(`PhoneNumber${index}`).innerHTML = winery.Phone_Number;
            document.getElementById(`Rating${index}`).innerHTML = winery.rating;
          }
        });
    })
    .catch(error => console.error('Error:', error));
  }

  function enablefilter() {
    const rating = Array.from(document.getElementById('typefilter').selectedOptions).map(option => option.value);
    var singleRating = "";
    var array = {};
    if (rating.length === 1) {
        singleRating = rating[0][0];
        array["rating"] = singleRating;
    }
    if (Object.keys(array).length === 0) {
        alert("Please select values to filter by. ");
        return;
    }

    if (Object.keys(array).length !== 0) {
        const data = {
            "Type": "GetWinery",
            "Return": "*",
            "Search": parseInt(array)
        };
        console.log(data);
        fetch(url, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const images = document.querySelectorAll(".card-img-top");
                const wineryDetails = document.querySelectorAll('.wineryDetails');
                clearScreen();
                if (data.data === "No matching results found") {
                    alert("No matching results found.");
                    return;
                }
                const dataArray = Array.isArray(data.data) ? data.data : [data.data];
                dataArray.forEach((winery, index) => {
                    if (index < wineryDetails.length) {
                        images[index].src = winery.Winery_URL;
                        document.getElementById(`name${index}`).innerHTML = winery.Name;
                        document.getElementById(`Province${index}`).innerHTML = winery.Province;
                        document.getElementById(`StreetAddress${index}`).innerHTML = winery.Street_Address;
                        document.getElementById(`PostalCode${index}`).innerHTML = winery.Postal_Code;
                        document.getElementById(`Email${index}`).innerHTML = winery.Email;
                        document.getElementById(`PhoneNumber${index}`).innerHTML = winery.Phone_Number;
                        document.getElementById(`Rating${index}`).innerHTML = winery.rating;
                    }
                });
            })
            .catch(error => console.error('Error:', error));
        }
    }
  
  
  