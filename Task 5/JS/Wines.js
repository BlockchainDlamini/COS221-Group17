
  //Load wines

  const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
  const data = {
    "Type": "GetWines",
    "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "brandName"],
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
      "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
      "Limit": 24,
    }; 

    if (Object.keys(array).length !== 0)
        request1 = {
        "Type": "GetWines",
        "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
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
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
            "Limit": 24,
            "Sort" : "name",
            "Order" : sortOrderValue
          };
          break;
        case "Age":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
            "Limit": 24,
            "Sort" : "age",
            "Order" : sortOrderValue 
          };
          break;
        case "Alchohol %":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
            "Limit": 24,
            "Sort" : "alcoholPercent",
            "Order" : sortOrderValue 
          };
          break;
        case "Quality":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
            "Limit": 24,
            "Sort" : "quality",
            "Order" : sortOrderValue 
          }; 
          break;
        case "Rating":
          request = {
            "Type": "GetWines",
            "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "awardName", "brandName", "rating"],
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
          }
        });
      })
      .catch(error => console.error('Error:', error));
  };
}

  
  