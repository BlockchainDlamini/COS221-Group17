
const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
const data = {
  "Type": "GetWines",
  "Return": ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "brandName"],
  "Limit": 15,
  "Sort": "name"
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
    const wineDetails = document.querySelectorAll('.wineDetails');
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
