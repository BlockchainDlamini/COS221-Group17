const url = 'https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php';
const data = {
    "Type" : "GetWines",
    "Return" : ["bottleSize", "price", "image_URL", "availability", "name", "year", "age", "brandName"],
    "Limit" : 15,
    "Sort" : "name"
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
    const containers = document.querySelectorAll('.card-body');

    const dataArray = data.data.map(({ wineBarrelID, ...wine }) => wine);
    
    dataArray.forEach((wine, index) => {
        if (index < images.length && index < containers.length) {
            images[index].src = wine.image_URL;
            const paragraph = containers[index].querySelector('p');
            const title = containers[index].querySelector('h5');
            title.innerHTML = wine.name;
            paragraph.innerHTML = `Brand: ${wine.brandName}<br>
                        Year: ${wine.year}<br>
                        Age: ${wine.age} years<br>
                        Bottle Size: ${wine.bottleSize}<br>
                        Rating: ${wine.rating} stars<br>
                        Price: R${wine.price}<br>
                        In Stock: ${wine.availability}<br>`;
        }
    });
  })
  .catch(error => console.error('Error:', error));
