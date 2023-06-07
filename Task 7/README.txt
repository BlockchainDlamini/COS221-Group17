# COS221-Group17
Group Project

A user can signup/login with the respective pages. Once a user is logged in, he/she will be taken to the wines page. The user will be shown various wine products as well as information relating to the specific product. A user can choose to filter/sort these wines by various constraints such as age, name, rating, quality, region and many more. The wineries page works in a similar fashion. The user is able to filter by region as well as rating. The wineries can also be sorted by name and rating (ascending as well as descending order). Both of the aforementioned pages have a seach bar that the user can use as they so please. The about us is a simple page showing the user the various activities that the company prides itself in. These are shown with a bootstrap carousel. The management page allows a manager to manage various tables in our database. A manager can add another user to the system, edit a user's information as well as delete a user. A manager can also update the wines/wineries table with the help of a form and a delete button. 




================================================================================================================================
GET WINES 

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
--------------------------------------------------------------------------------------------------------------------------------
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type: 		|	*	|String		|"GetWines"	
--------------------------------------------------------------------------------------------------------------------------------
Return:		| 	*	|String	array	|"bottleSize", "price", "image_URL", "availability", "name", "year", "age", 
		|		|		|"description","cellaringPotential", "awardName", "awardYear", "awardDetails", 	
		|		|		|"categoryName", "varietalName","residualSugar", "ph", "alcoholPercent", "quality",	
		|		|		|"brandName","wineryName", "wineyardName","productionMethod", 
		|		|		|"productionDate" *It always returns the wineBarrelID, bottleID, awardID and varietalID*
--------------------------------------------------------------------------------------------------------------------------------
Limit:		| 		|Int		|Number between 1 and 44
--------------------------------------------------------------------------------------------------------------------------------
Sort: 		|		|String		|"bottleSize", "price", "availability", "name", "year", "age", "cellaringPotential",
		|		|		|"categoryName", "varietalName", "residualSugar", "ph", "alcoholPercent", "quality",
		|		|		|"brandName", "wineryName", "wineyardName", "rating"
--------------------------------------------------------------------------------------------------------------------------------
Order: 		|		|String		|"ASC" or "DESC". Default is "ASC"
--------------------------------------------------------------------------------------------------------------------------------
Search: 	|		|JSON Object	|"name", "wineryName", "categoryName", "varietalName", "price", "brandName", "rating"
--------------------------------------------------------------------------------------------------------------------------------
Fuzzy: 		|		|String		|"true" or "false". Default is "false"
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT
{
    "Type": "GetWines",
    "Return":  "*",
    "Limit":2
}
OUTPUT
{
    "status": "sucsess",
    "timestamp": 1686119597,
    "data": [
        {
            "wineBarrelID": "2",
            "bottleSize": "750ml",
            "price": "440.00",
            "image_URL": "https://images.commerce7.com/chamonix-estate/images/x-large/old-vine-steen-1678709501278.webp",
            "availability": "10",
            "name": "Chamonix Old Vine Steen",
            "year": "2022",
            "age": "1",
            "description": "The old vine wine has a lemon-green colour and exquisite aroma, with scents reminiscent of stone fruit and hints of saline aromas. Well-structured, complex and minerally with flavours of citrus on the palate.",
            "cellaringPotential": null,
            "varietalID": "12",
            "categoryName": "White",
            "varietalName": "Chenin Blanc",
            "residualSugar": "2.20",
            "ph": "3.20",
            "alcoholPercent": "13.40",
            "quality": "5",
            "brandName": "ThandosWines",
            "wineryName": "Chamonix Estate",
            "wineyardName": "Chamonix Estate",
            "rating": "5.0000",
            "productionMethod": "White wine made by Neil Bruwer.",
            "productionDate": "1965",
            "award": [
                {
                    "awardID": "1",
                    "awardName": "Decanter Award",
                    "awardYear": "2022",
                    "awardDetails": "Silver for the Old Vine Steen 2021."
                },
                {
                    "awardID": "2",
                    "awardName": "John Platter",
                    "awardYear": "2023",
                    "awardDetails": "4.5 stars for the Old Vine Steen (Reserve Range) 2021."
                }
            ]
        },
        {
            "wineBarrelID": "4",
            "bottleSize": "750ml",
            "price": "285.00",
            "image_URL": "https://images.commerce7.com/chamonix-estate/images/x-large/c7-chamonix-reserve-white-nv-1678713873905.webp",
            "availability": "10",
            "name": "Chamonix Estate White ",
            "year": "2021",
            "age": "2",
            "description": "The Estate White in the first year after harvest shows a pale straw colour, fresh aromas with scents of exotic spice, figs, and grapefruit. On the palate it is full and round with rich fruit sensation and minerality. The wine reaches its prime in about 3 years after release.",
            "cellaringPotential": null,
            "varietalID": "5",
            "categoryName": "White",
            "varietalName": "Blend",
            "residualSugar": "2.30",
            "ph": "3.24",
            "alcoholPercent": "13.71",
            "quality": "5",
            "brandName": "ThandosWines",
            "wineryName": "Chamonix Estate",
            "wineyardName": "Chamonix Estate",
            "rating": "8.0000",
            "productionMethod": "Semillon 58% and Sauvignon Blanc 42% blend made by Neil Bruwer.",
            "productionDate": "1965",
            "award": "none"
        }
    ]
}
================================================================================================================================


================================================================================================================================
GET WINERY

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
--------------------------------------------------------------------------------------------------------------------------------
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type		|	*	|String		|"GetWinery"
--------------------------------------------------------------------------------------------------------------------------------
Return: 	|	*	|String		|"*" *It always returns the wineyardID*
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT
{
    "Type": "GetWineyard",
    "Return":  "*",
}
OUTPUT
status": "success",
    "timestamp": 1685726843,
    "data": [
          {
            "Winery_ID": "1",
            "Name": "Chamonix Estate",
            "Region": "Western Cape",
            "Province": "Western Cape",
            "Postal_Code": "7690",
            "Street_Address": "Uitkyk Street, Franschhoek",
            "Phone_Number": "021 876 8400",
            "Email": "staff@chamonix.co.za",
            "Brand_Name": "Chamonix",
            "Wineyard_Name": "Chamonix Estate",
            "Grape_Variety": "Red and White",
            "Area": "Franschhoek",
            "rating": "30"
        }
================================================================================================================================



================================================================================================================================
GET WINEYARD

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
--------------------------------------------------------------------------------------------------------------------------------
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type		|	*	|String		|"GetWineyard"
--------------------------------------------------------------------------------------------------------------------------------
Return: 	|	*	|String		|"*" *It always returns the wineyardID*
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT
{
    "Type": "GetWineyard",
    "Return":  "*",
}
OUTPUT
status": "success",
    "timestamp": 1685726843,
    "data": [
          {
            "Winery_ID": "1",
            "Name": "Chamonix Estate",
            "Region": "Western Cape",
            "Province": "Western Cape",
            "Postal_Code": "7690",
            "Street_Address": "Uitkyk Street, Franschhoek",
            "Phone_Number": "021 876 8400",
            "Email": "staff@chamonix.co.za",
            "Brand_Name": "Chamonix",
            "Wineyard_Name": "Chamonix Estate",
            "Grape_Variety": "Red and White",
            "Area": "Franschhoek",
            "rating": "30"
        }
================================================================================================================================



================================================================================================================================
GET BRAND 

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"GetWinery"
--------------------------------------------------------------------------------------------------------------------------------
Return: 	|	*	|String		|"name" "phoneNumber", "email", "postalCode", "province", "rating", "wineryName", 
		|		|		|"address"*It always returns the brandID*
--------------------------------------------------------------------------------------------------------------------------------
Limit:		|		|Int		|Number between 1 and 11
--------------------------------------------------------------------------------------------------------------------------------
Sort: 		|		|String		|"name", "rating"
--------------------------------------------------------------------------------------------------------------------------------
Order:		|		|String		|"ASC" or "DESC"
--------------------------------------------------------------------------------------------------------------------------------
Search: 	|		|JSON Object	|"name", "rating", "wineryName" 
--------------------------------------------------------------------------------------------------------------------------------
Fuzzy: 		|		|String		|"true" or "false"
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT
{
    "Type": "GetWinery",
    "Return":  ["name" "phoneNumber", "email", "postalCode", "province", "address"],
    "Limit": 1
}
OUTPUT
"status": "success",
    "timestamp": 1685726843,
    "data": [
        {
            "Brand_ID": "1",
            "Name": "Chamonix",
            "Phone_Number": "021 876 8400",
            "Email": "staff@chamonix.co.za",
            "Street_Address": "Uitkyk Street, Franschhoek",
            "Province": "Western Cape",
            "Postal_Code": "7690"
        }]
================================================================================================================================



================================================================================================================================
GET USERS

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"GetUser"
--------------------------------------------------------------------------------------------------------------------------------
Return: 	|	*	|String		|"fName", "lName", "email", "userType" *It always returns the userID*
--------------------------------------------------------------------------------------------------------------------------------
Search: 	|		|JSON Object	|"email", "password"
--------------------------------------------------------------------------------------------------------------------------------
Fuzzy: 		|		|String		|"true" or "false"
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT
{
    "Type": "GetUser",
    "Return": "*",
    "Limit": 1
}
OUTPUT
"status": "success",
    "timestamp": 1685726981,
    "data": [
        {
            "User_ID": "1",
            "First_Name": "Dominic",
            "Last_Name": "Fanjek",
            "Phone_Number": "082 588 3562 ",
            "Email": "domfan@gmail.com",
            "Street_Address": "1516 Mosman Rd",
            "Province": "",
            "Postal_Code": "8320",
            "User_Type": "Customer",
            "Department": null,
            "Credentials": null,
            "Preferences": null,
            "Password": "Rhino88"
        }
================================================================================================================================



================================================================================================================================
UPDATE USERS

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"UpdateUser"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the userID *only allowed to edit normal users, not other managers
--------------------------------------------------------------------------------------------------------------------------------
UpdateInfo:	|	*	|JSON Object	|"fName", "lName", "email", "userType", "phoneNumber", "streetAddress" 
		|		|		|"province", "postalCode", "department", "password", "credentials", 
		|		|		|"prefences"
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT
{
  "Type": "UpdateUser",
  "ID": 1,
  "UpdateInfo": {
                "fName": "test", 
                "lName": "test", 
                "email": "test", 
                "userType": "Customer", 
                "phoneNumber": "test", 
                "streetAddress": "test",
                "province": "Gauteng", 
                "postalCode": "test", 
                "department":"test", 
                "password":"test", 
                "credentials":"test", 
                "prefences": "test"
                }
}
OUTPUT
{
    "status": "success",
    "timestamp": 1686120655
}
================================================================================================================================



================================================================================================================================
UPDATE WINE

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"UpdateWine"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|JSON Object	|"wineBarrelID", "bottleID", "awardID" = [Allows for an array of values], "varietalID".
		|		|		|These id are the ID before the update
--------------------------------------------------------------------------------------------------------------------------------
WineUpdateInfo:	|	*	|JSON Object	|"bottleSize", "price", "image_URL", "numBotllesMade", "numBotllesSold", "name",
		|		|		|"description","cellaringPotential","wineryName", "wineyardName","productionMethod",
		|		|		|"year","productionDate". 
--------------------------------------------------------------------------------------------------------------------------------
VarUpdateInfo:	|	*	|JSON Object	|"varietalName","residualSugar", "ph","alcoholPercent",	"quality","brandName", 
		|		|		|"categoryName"
--------------------------------------------------------------------------------------------------------------------------------
AwardUpdateInfo:|	*	|JSON Object	|"awardID","awardName","awardYear", "awardDetails"
		|		|array		|awardID is the id that corresponds to the award record that needs to be updated.
--------------------------------------------------------------------------------------------------------------------------------

EXAMPLE
--------------------------------------------------------------------------------------------------------------------------------
INPUT DATA:
{
    "Type": "UpdateWine",
    "ID": {
        "wineBarrelID":2, 
        "bottleID":1, 
        "awardID":[1,2],
        "varietalID": 12
    },
    "WineUpdateInfo": {
        "bottleSize":"500ml", 
        "price":10, 
        "image_URL":"test", 
        "numBotllesMade":10, 
        "numBotllesSold":1, 
        "name":"test",
        "description":"test",
        "cellaringPotential":2008,
        "wineryName":"test", 
        "wineyardName":"test",
        "productionMethod":"test",
        "year":2008,
        "productionDate":2006
    },
    "VarUpdateInfo":
    {
        "varietalName":"Blend",
        "residualSugar":2.30, 
        "ph":3.24,
        "alcoholPercent":13.71,	
        "quality":5,
        "brandName":"Chamonix Estate", 
        "categoryName":"white"
    },
    "AwardUpdateInfo": [
        {
            "awardID":1,
            "awardName":"test",
            "awardYear":2013, 
            "awardDetails":"test"
        },
        {
            "awardID":2,
            "awardName":"test",
            "awardYear":2004, 
            "awardDetails":"test"
        }
    ]
}

OUTPUT:
{
    "status": "error",
    "timestamp": 1686118769,
    "data": "Brand name provided does not exist. Please insert into brand first"
}
================================================================================================================================



================================================================================================================================
UPDATE WINERY

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"UpdateWinery"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the wineryID
--------------------------------------------------------------------------------------------------------------------------------
UpdateInfo:	|	*	|JSON Object	|"name", "phoneNumber", "email", "postalCode", "province",  
		|	*	|		|"steetAddress","brandName", "image_URL"
--------------------------------------------------------------------------------------------------------------------------------

EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "UpdateWinery",
  "ID": 1,
  "UpdateInfo": {
                "name": "test", 
                "phoneNumber": "test", 
                "email": "test", 
                "postalCode": "test", 
                "province": "Gauteng",  
                "steetAddress": "test",
                "brandName": "test", 
                "image_URL":"test"
                }
}

OUTPUT:
{
    "status": "error",
    "timestamp": 1686120847,
    "data": "Brand name provided does not exist. Please do an insert into the Brand table first"
}
================================================================================================================================



================================================================================================================================
UPDATE WINEYARD

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"UpdateWineyard"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|"wineyardID" and "wineryID"
--------------------------------------------------------------------------------------------------------------------------------
UpdateInfo:	|	*	|JSON Object	|"wineyardName", "wineryName", "postalCode", "province", "steetAddress", "area",
		|	*	|		|"grapeVariety","image_URL"
--------------------------------------------------------------------------------------------------------------------------------

EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "UpdateWineyard",
  "ID": {
      "wineyardID": 1,
      "wineryID":1
  },
  "UpdateInfo": {
                "wineyardName": "test", 
                "wineryName": "test", 
                "postalCode": "test", 
                "province": "Gauteng", 
                "steetAddress": "test", 
                "area": "test",
                "grapeVariety": "test",
                "image_URL": "test"
                }
}
OUTPUT:
{
    "status": "error",
    "timestamp": 1686118855,
    "data": "Winery name provided does not exist"
}
================================================================================================================================



================================================================================================================================
UPDATE BRAND

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"UpdateBrand"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the brandID
--------------------------------------------------------------------------------------------------------------------------------
UpdateInfo:	|	*	|JSON Object	|"name", "phoneNumber", "email", "postalCode", "province","streetAddress"  
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "UpdateUser",
  "ID": 1,
  "UpdateInfo": {
                "fName": "test", 
                "lName": "test", 
                "email": "test", 
                "userType": "Customer", 
                "phoneNumber": "test", 
                "streetAddress": "test",
                "province": "Gauteng", 
                "postalCode": "test", 
                "department":"test", 
                "password":"test", 
                "credentials":"test", 
                "prefences": "test"
                }
}
OUTPUT:
{
    "status": "success",
    "timestamp": 1686120443
}

================================================================================================================================



================================================================================================================================
DELETE USERS

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"DeleteUser"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the userID. Only nornal users not managers
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "DeleteUser",
  "ID": 1
}
OUTPUT:
{
    "status": "sucess",
    "timestamp": 1686118855,
}
================================================================================================================================



================================================================================================================================
DELETE WINE

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"DeleteWine"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the bottleID
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "DeleteWine",
  "ID": 1
}
OUTPUT:
{
    "status": "sucess",
    "timestamp": 1686118855,
}
================================================================================================================================



================================================================================================================================
DELETE WINERY

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"DeleteWinery"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the wineryID
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "DeleteWinery",
  "ID": 1
}
OUTPUT:
{
    "status": "sucess",
    "timestamp": 1686118855,
}
================================================================================================================================



================================================================================================================================
DELETE WINEYARD

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"DeleteWineyard"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the wineyardID
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "DeleteWineyard",
  "ID": 1
}
OUTPUT:
{
    "status": "sucess",
    "timestamp": 1686118855,
}
================================================================================================================================


================================================================================================================================
DELETE BRAND

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"DeleteBrand"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|Int		|Give the brandID
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "DeleteBrand",
  "ID": 1
}
OUTPUT:
{
    "status": "sucess",
    "timestamp": 1686118855,
}
================================================================================================================================



================================================================================================================================
APPEND USERS

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendUser"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|Int		|"fName", "lName", "email", "userType" "phoneNumber" "email" "streetAddress" 
		|		|		|"province" "postalCode" "userType" "department" "password" "credentials" 
		|		|		|"prefences"
--------------------------------------------------------------------------------------------------------------------------------



EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "AppendUser",
  "AppendInfo": {
    "department": " ",
    "email": "kumbishonhiwa@popo.com",
    "fName": "Kumbirai",
    "lName": "Shonhiwa",
    "password": "926390f32b1087dda9cb5745ea4cb437962426aebae2ac5f1eb46bff1262ad11",
    "phoneNumber": "0723523319",
    "postalCode": "0083",
    "province": "Gauteng",
    "streetAddress": "1036 Station Place, Hatfield,Pretoia,0083",
    "userType": "Customer",
    "credentials":" ",
    "preferences":" "
  }
}
================================================================================================================================



================================================================================================================================
APPEND WINE

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendWine"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|JSON Object	|"bottleSize", "price", "image_URL", "numBotllesMade", "numBotllesSold", "name",  
		|		|		|"description","cellaringPotential", "awardName", "awardYear", "awardDetails", 	
		|		|		|"categoryName", "varietalName","residualSugar", "ph", "alcoholPercent", 	
		|		|		|"quality","brandName","wineryName", "wineyardName","productionMethod", "year",
		|		|		|"productionDate"
--------------------------------------------------------------------------------------------------------------------------------



EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
"Type": "AppendWine",
AppendInfo:	{
    "bottleSize": "750ml", 
    "price": "380", 
    "image_URL": "https://perdeberg.co.za/wp-content/uploads/Perdeberg-SSR-Red-Can_Shadow.png", 
    "numBotllesMade": "10", 
    "numBotllesSold": "0", 
    "name": "SIGNATURE CABERNET SAUVIGNON", 
    "description": "Intense and near-opaque with a dark-ruby centre and magenta rim, this wine’s nose is bursting with notes of ripe blackberry, cassis and hints of warm spice. Full-bodied and firm, the wine’s velvety tannins are well-balanced with its opulent fruit flavours. Delicious to drink right away, it has maturation potential of at least 3 years.",
    "cellaringPotential": "NULL" , 
    "awardName": "Vitis Vinifera Awards", 
    "awardYear": "2020", 
    "awardDetails": "Gold",
    "categoryName": "Red", 
    "varietalName": Pinotage,
    "residualSugar": "4.7", 
    "ph": "5.8", 
    "alcoholPercent": "13,3",
    "quality": "5",
    "brandName": "Alvis Drift",
    "wineryName": "Alvis Drift", 
    "wineyardName": "Alvis Drift",
    "productionMethod": "White wine made by Nell Bruwer", 
    "year": "2020",
    "productionDate": "2003"
    }
}
================================================================================================================================



================================================================================================================================
APPEND WINERY

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendWinery"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|JSON Object	|"name", "phoneNumber", "email", "postalCode", "province",  
		|	*	|		|"steetAddress","brandName"
--------------------------------------------------------------------------------------------------------------------------------
================================================================================================================================



================================================================================================================================
APPEND WINEYARD

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendWineyard"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|JSON Object	|"wineyardName" "wineryName", "postalCode", "province", "steetAddress", "area",
		|	*	|		|"grapeVariety"
--------------------------------------------------------------------------------------------------------------------------------


EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
"Type": "AppendWineyard",
"AppendInfo": {
     "wineyardName": "ABC Wineyard",
    "wineryName": "ABC Winery",
    "postalCode": "1234",
    "province": "Free State",
    "streetAddress": "456 Vine St",
    "area": "10 acres",
    "grapeVariety": "Chardonnay"
}
}
================================================================================================================================


================================================================================================================================
APPEND BRAND

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendBrand"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|JSON Object	|"name" "phoneNumber", "email", "postalCode", "province", "postalCode"
		|		|		|"streetAddress"
--------------------------------------------------------------------------------------------------------------------------------
================================================================================================================================



================================================================================================================================
APPEND BRAND RATING

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendBrandRating"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|JSON Object	|"brandID" and "userID"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|Int		|"rating"
--------------------------------------------------------------------------------------------------------------------------------

EXAMPLE:
--------------------------------------------------------------------------------------------------------------------------------
INPUT:
{
  "Type": "AppendBrandRating",
  "ID": {
    "brandID": 123,
    "userID": 456
  },
  "AppendInfo": {
    "rating": 4.5
  }
}
================================================================================================================================



================================================================================================================================
APPEND WINE RATING

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendWineRating"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|JSON Object	|"userdID" and "wineBarrelID"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|Int		|"rating"
--------------------------------------------------------------------------------------------------------------------------------
================================================================================================================================



================================================================================================================================
APPEND WINERY RATING

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendWineryRating"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|JSON Object	|"userdID" and "wineryID"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|Int		|"rating"
--------------------------------------------------------------------------------------------------------------------------------
================================================================================================================================



================================================================================================================================
APPEND WINEYARD RATING

URL: https://wheatley.cs.up.ac.za/u22557858/GetWineBottles.php
Method: POST

PARAMETERS
Parameter 	| Required	| Type		| Description 
Name		|		|		|
--------------------------------------------------------------------------------------------------------------------------------
Type 		|	*	|String		|"AppendWineyardRating"
--------------------------------------------------------------------------------------------------------------------------------
ID: 		|	*	|JSON Object	|"userdID", "wineryID" and "wineyardID"
--------------------------------------------------------------------------------------------------------------------------------
AppendInfo:	|	*	|Int		|"rating"
--------------------------------------------------------------------------------------------------------------------------------
================================================================================================================================


