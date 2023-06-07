  //Load wines
  const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
  const data = {
    "Type": "GetWines",
    "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "brandName", "awardName", "awardDetails"],
    "Limit": 24,
    "Sort": "name"
  };

  function clearScreen() {
    const images = document.querySelectorAll('.card-img-top');
    const wineDetails = document.querySelectorAll('.wineDetails');

    images.forEach((image) => {
      image.src = '';
    });
    
    wineDetails.forEach((detail) => {
      detail.innerHTML = '';
    });
  }

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
    const wineDetails = document.querySelectorAll('.wineDetails');

    clearScreen();
    if (data.data === "No mathing results found") {
      alert("No matching results found.");
      return;
    }

    const dataArray = data.data.map(({ wineBarrelID, ...wine }) => wine);
    dataArray.forEach((wine, index) => {
      if (index < wineDetails.length) {
        images[index].src = wine.image_URL;
        document.getElementById(`name${index}`).innerHTML = wine.name;
        document.getElementById(`brandName${index}`).innerHTML = wine.brandName;
        document.getElementById(`availability${index}`).innerHTML = wine.availability;
        document.getElementById(`year${index}`).innerHTML = wine.year;
        document.getElementById(`rating${index}`).innerHTML = wine.rating;
        document.getElementById(`price${index}`).innerHTML = `R${wine.price}`;
        document.getElementById(`bottleSize${index}`).innerHTML = wine.bottleSize;
        if (wine.award === "none")
          document.getElementById(`awardDetails${index}`).innerHTML =  wine.award;
        else {
          for (var i = 0; i < wine.award.length; i++) {
            var a = wine.award[i];
            if (i !== wine.award.length - 1)
              document.getElementById(`awardDetails${index}`).innerHTML =  a.awardName + ", ";
            else 
              document.getElementById(`awardDetails${index}`).innerHTML =  a.awardName;
            }
        }
      }
    });
  })
  .catch(error => console.error('Error:', error));

  // filter 
  function enablefilter() {
    const selectedWineryValues = Array.from(document.getElementById('wineryfilter').selectedOptions).map(option => option.value);
    const selectedBrandValues = Array.from(document.getElementById('brandfilter').selectedOptions).map(option => option.value);
    const selectedTypeValues = Array.from(document.getElementById('typefilter').selectedOptions).map(option => option.value);
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');

    var winery = '';
    var brandName = '';
    var wineType  = '';
    var minPrice = minPriceInput.value;
    var maxPrice = maxPriceInput.value;
    var array = {};
  
    if (selectedWineryValues.length === 1) {
      winery = selectedWineryValues[0];
      array["wineryName"] = winery; 
    }
    
    if (selectedBrandValues.length === 1) {
      brandName = selectedBrandValues[0];
      array["brandName"] = brandName; 
    }

    if (selectedTypeValues.length === 1) {
      wineType = selectedTypeValues[0];
      array["varietalName"] = wineType;
    }
    
    if (Object.keys(array).length === 0 && (minPrice === '' || maxPrice === '')) {
      alert("Please select values to filter by.");
      return;
    }

    var request1 = {
      "Type": "GetWines",
      "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
      "Limit": 24,
    }; 

    if (Object.keys(array).length !== 0)
        request1 = {
        "Type": "GetWines",
        "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
        "Limit": 24,
        "Search": array
      };
    
  
    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Basic ' + btoa('u22557858:NeimanAris123#')
      },
      body: JSON.stringify(request1)
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      const images = document.querySelectorAll('.card-img-top');
      const wineDetails = document.querySelectorAll('.wineDetails');

      clearScreen();
      if (data.data === "No mathing results found") {
        alert("No matching results found.");
        return;
      }

      const dataArray = data.data.map(({ wineBarrelID, ...wine }) => wine);
      dataArray.forEach((wine, index) => {
        if (minPrice === '' && maxPrice === '') {
          if (index < wineDetails.length) {
            images[index].src = wine.image_URL;
            document.getElementById(`name${index}`).innerHTML = wine.name;
            document.getElementById(`brandName${index}`).innerHTML = wine.brandName;
            document.getElementById(`availability${index}`).innerHTML = wine.availability;
            document.getElementById(`year${index}`).innerHTML = wine.year;
            document.getElementById(`rating${index}`).innerHTML = wine.rating;
            document.getElementById(`price${index}`).innerHTML = `R${wine.price}`;
            document.getElementById(`bottleSize${index}`).innerHTML = wine.bottleSize;
            document.getElementById(`awardDetails${index}`).innerHTML = fillInAwards(wine.awardName, wine.awardDescription, index);
            }
        } else if (minPrice !== '' && maxPrice !== '') {
          if (index < wineDetails.length) {
            if (parseFloat(wine.price) > parseFloat(minPrice) && parseFloat(wine.price) < parseFloat(maxPrice)) {
              images[index].src = wine.image_URL;
              document.getElementById(`name${index}`).innerHTML = wine.name;
              document.getElementById(`brandName${index}`).innerHTML = wine.brandName;
              document.getElementById(`availability${index}`).innerHTML = wine.availability;
              document.getElementById(`year${index}`).innerHTML = wine.year;
              document.getElementById(`rating${index}`).innerHTML = wine.rating;
              document.getElementById(`price${index}`).innerHTML = `R${wine.price}`;
              document.getElementById(`bottleSize${index}`).innerHTML = wine.bottleSize;
              document.getElementById(`awardDetails${index}`).innerHTML = fillInAwards(wine.awardName, wine.awardDescription, index);
              if (wine.award === "none")
                document.getElementById(`awardDetails${index}`).innerHTML =  wine.award;
              else  {
                var abody = '';
                foreach(a, wine.awards)
                  abody = a.json();
                document.getElementById(`awardDetails${index}`).innerHTML =  wine.abody.awardName;

              } 
            }
          }
        } else {
          alert("To filter by price, please enter both min and max values.");
        }
      });
    })
    .catch(error => console.error('Error:', error));
  }

  //Sort 
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
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
            "Limit": 24,
            "Sort" : "name",
            "Order" : sortOrderValue
          };
          break;
        case "Age":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
            "Limit": 24,
            "Sort" : "age",
            "Order" : sortOrderValue 
          };
          break;
        case "Alchohol %":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
            "Limit": 24,
            "Sort" : "alcoholPercent",
            "Order" : sortOrderValue 
          };
          break;
        case "Quality":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
            "Limit": 24,
            "Sort" : "quality",
            "Order" : sortOrderValue 
          }; 
          break;
        case "Rating":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating", "awardDetails"],
            "Limit": 24,
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
        const wineDetails = document.querySelectorAll('.wineDetails');

        clearScreen();
        if (data.data === "No mathing results found") {
          alert("No matching results found.");
          return;
        }

        const dataArray = data.data.map(({ wineBarrelID, ...wine }) => wine);
        dataArray.forEach((wine, index) => {
          if (index < wineDetails.length) {
            images[index].src = wine.image_URL;
            document.getElementById(`name${index}`).innerHTML = wine.name;
            document.getElementById(`brandName${index}`).innerHTML = wine.brandName;
            document.getElementById(`availability${index}`).innerHTML = wine.availability;
            document.getElementById(`year${index}`).innerHTML = wine.year;
            document.getElementById(`rating${index}`).innerHTML = wine.rating;
            document.getElementById(`price${index}`).innerHTML = `R${wine.price}`;
            document.getElementById(`bottleSize${index}`).innerHTML = wine.bottleSize;
            if (wine.award === "none")
                document.getElementById(`awardDetails${index}`).innerHTML =  wine.award;
            else   
              document.getElementById(`awardDetails${index}`).innerHTML =  wine.award.awardName;
          }
        });
      })
      .catch(error => console.error('Error:', error));
  };
}

//search function
function search() {
  var inputElement = document.querySelector('.form-control'); // Get the input element using a class selector
  var inputValue = inputElement.value; // Get the value of the input field
  console.log(inputValue); // Display the value in the console
  var fuzzy = true;
  const url = "https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php";
  const data = {
    Type: "GetWines",
    Return: ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "brandName", "awardName", "awardDetails"],
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
      const wineDetails = document.querySelectorAll('.wineDetails');

      clearScreen();
      console.log(data.data)
      if (data.data === "No matching results found") {
        alert("No matching results found.");
        return;
      } else if (data.data !== "No matching results found") {
        const dataArray = Array.isArray(data.data) ? data.data : [data.data];
        dataArray.forEach((wine, index) => {
          if (index < wineDetails.length) {
            images[index].src = wine.image_URL;
            document.getElementById(`name${index}`).innerHTML = wine.name;
            document.getElementById(`brandName${index}`).innerHTML = wine.brandName;
            document.getElementById(`availability${index}`).innerHTML = wine.availability;
            document.getElementById(`year${index}`).innerHTML = wine.year;
            document.getElementById(`rating${index}`).innerHTML = wine.rating;
            document.getElementById(`price${index}`).innerHTML = `R${wine.price}`;
            document.getElementById(`bottleSize${index}`).innerHTML = wine.bottleSize;
            document.getElementById(`awardDetails${index}`).innerHTML = fillInAwards(wine.awardName, wine.awardDescription, index);
            if (wine.award === "none")
              document.getElementById(`awardDetails${index}`).innerHTML =  wine.award;
            else   
              document.getElementById(`awardDetails${index}`).innerHTML =  wine.award.awardName;
          }
        });
      }
    })
    .catch(error => console.error('Error:', error));
}
  
  