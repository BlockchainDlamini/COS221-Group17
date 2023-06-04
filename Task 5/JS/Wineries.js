const url = "https://wheatley.cs.up.ac.za/u22557858/COS221HA/GetWineBottles.php";
const data = {
    "Type": "GetWinery",
    "Return": ["name", "phoneNumber", "email", "postalCode", "province", "steetAddress", "wineyardName", "wineyardGrapeVariety", "wineyardArea", "brandName", "rating", "wineryImage_URL", "wineyardImage_URL"],
    "Sort": "name",
    "Order": "ASC",
    "Limit": 15
};
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
        const images = document.querySelectorAll(".card-img-top");
        const containers = document.querySelectorAll(".card-body");
        const dataArray = data.data.map(({ wineryID, ...winery }) => winery);
        dataArray.forEach((winery, index) => {
            if (index < images.length && index < containers.length) {
                images[index].src = wine.wineryImage_URL
                const paragraph = containers[index].querySelectorAll('p');
                const title = containers[index].querySelectorAll('h1');
                title.innerHTML = winery.name;
                paragraph.innerHTML = `Phone Number: ${winery.phoneNumber}<br>
            Email: ${winery.email}<br>
            Postal Code: ${winery.postalCode}<br>
            Province: ${winery.province}<br>
            Street Address: ${winery.steetAddress}<br>
            Name of Wineyard: ${winery.wineyardName}<br>
            Grape Variety of Wineyard: ${winery.wineyardGrapeVariety}<br>
            Rating: ${winery.rating}<br>
            Brand: ${winery.brandName}<br>`;
            }
        });
    })
    .catch(error => console.error('Error:', error));
