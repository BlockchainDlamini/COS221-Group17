<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


//Including configuration
require_once ("Config.php");

//Setup api
header("Content-Type: application/json");

//Error handeling function 
function errorHandling($message, $statusCode)
{
  http_response_code($statusCode);
  $ReturnJson = array("status" => "error", "timestamp" => time(), "data" => "$message");
  echo json_encode($ReturnJson);
  die();
}

//Get user input
$data = file_get_contents("php://input");

//Get data from the input
$decode = json_decode($data);

// Check for JSON decoding errors
if (json_last_error() !== JSON_ERROR_NONE) 
  errorHandling("Internal server error", 500);

//checking if the data is set
if (!isset($decode)) 
  errorHandling("Internal server error", 500);

//Checking the type of request the user made
if ($decode->Type == "GetWines") 
  echo getWines($decode);
else if ($decode->Type == "GetWinery") 
  echo getWinery($decode);
else if ($decode->Type == "GetWineyard") 
  echo getWineyard($decode);
else if ($decode->Type == "GetBrand") 
  echo getBrands($decode);
else if ($decode->Type == "GetUser") 
  echo getUser($decode);
else if($decode->Type == "UpdateUser")
  echo UpdateUser($decode);
else if($decode->Type == "UpdateWine")
  echo UpdateWine($decode);
else if($decode->Type == "UpdateWinery")
  echo UpdateWinery($decode);
else if($decode->Type == "UpdateWineyard")
  echo UpdateWineyard($decode);
else if($decode->Type == "UpdateBrand")
  echo UpdateBrand($decode);
else if($decode->Type == "DeleteUser")
  echo DeleteUser($decode);
else if($decode->Type == "DeleteWine")
  echo DeleteWine($decode);
else if($decode->Type == "DeleteWinery")
  echo DeleteWinery($decode);
else if($decode->Type == "DeleteWineyard")
  echo DeleteWineyard($decode);
else if($decode->Type == "DeleteBrand")
  echo DeleteBrand($decode);
else if($decode->Type == "AppendUser")
  echo AppendUser($decode);
else if($decode->Type == "AppendWine")
  echo AppendWine($decode);
else if($decode->Type == "AppendWinery")
  echo AppendWinery($decode);
else if($decode->Type == "AppendWineyard")
  echo AppendWineyard($decode);
else if($decode->Type == "AppendBrand")
  echo AppendBrand($decode);
else if($decode->Type == "AppendBrandRating")
  echo AppendBrandRating($decode);
else if($decode->Type == "AppendWineRating")
  echo AppendWineRating($decode);
else if($decode->Type == "AppendWineryRating")
  echo AppendWineryRating($decode);
else if($decode->Type == "AppendWineyardRating")
  echo AppendWineyardRating($decode);
  
else //the user did not give the correct type
  errorHandling("Incorrect request type", 400);

function getWines($decode)
{
  //Create SQL query 
  $validReturn = array("bottleSize" => "bot.Bottle_Size AS bottleSize", "price" => "bot.Price AS price", 
    "image_URL" => "bot.Image_URL AS image_URL", "availability" => "bot.Num_Bottles_Made - bot.Num_Bottles_Sold AS availability", 
    "name"=> "bar.Name AS name", "year"=> "bar.Year AS year", "age" => "YEAR(CURDATE()) - bar.Year AS age",
    "description"=> "bar.Description AS description", "cellaringPotential"=> "bar.Cellaring_Potential AS cellaringPotential", 
    "awardName"=> "aw.Award AS awardName", "awardYear"=> "aw.Year AS awardYear", "awardDetails"=> "aw.Details AS awardDetails", 
    "categoryName"=> "var.Category_Name AS categoryName", "varietalName"=> "var.Varietal_Name AS varietalName", 
    "residualSugar"=> "var.Residual_Sugar AS residualSugar", "ph"=> "var.pH AS ph", 
    "alcoholPercent"=> "var.Alcohol_Percentage AS alcoholPercent", "quality"=> "var.Quality AS quality", 
    "brandName"=> "var.Brand_Name AS brandName","wineryName"=> "bar.Winery_Name AS wineryName", 
    "wineyardName"=> "bar.Wineyard_Name AS wineyardName","rating"=> "AVG(rate.Rating) AS rating",
    "productionMethod"=> "bar.Production_Method AS productionMethod", "productionDate"=> "bar.Production_Date AS productionDate");
  $awardFlag = false;
  $sql = "";
  
  if(!isset($decode->Return)) //Checking that required field is set
    errorHandling("The parameters are incorrect", 400);
  
  //SELECT and FROM statements
  if($decode->Return == "*") //Returing everything 
  {
    //Seperate call "awardName", "awardYear", "awardDetails". Setting flag for call later on
    $awardFlag = true;

    $sql .= "SELECT bot.Wine_Barrel_ID AS wineBarrelID, bot.Bottle_ID AS bottleID, bot.Bottle_Size AS bottleSize, bot.Price AS price, bot.Image_URL AS image_URL, bot.Num_Bottles_Made - bot.Num_Bottles_Sold AS availability, 
    bar.Name AS name, bar.Year AS year, YEAR(CURDATE()) - bar.Year AS age, bar.Description AS description, bar.Cellaring_Potential AS cellaringPotential, var.ID AS varietalID,
    var.Category_Name AS categoryName, var.Varietal_Name AS varietalName, var.Residual_Sugar AS residualSugar, var.pH AS ph, 
    var.Alcohol_Percentage AS alcoholPercent, var.Quality AS quality, var.Brand_Name AS brandName, bar.Winery_Name AS wineryName, bar.Wineyard_Name AS wineyardName, 
    AVG(rate.Rating) AS rating, bar.Production_Method AS productionMethod, bar.Production_Date AS productionDate
    FROM Bottle AS bot
    JOIN WineBarrels AS bar
    ON bot.Wine_Barrel_ID = bar.ID
    LEFT JOIN Varietal AS var
    ON bar.Varietal_ID=var.ID
    LEFT JOIN WineRating AS rate 
    ON bar.ID = rate.Bottle_ID"; 
  }
  else //Returing selected stuff
  {
    $sql .= "SELECT bot.Wine_Barrel_ID AS wineBarrelID, var.ID AS varietalID, bot.Bottle_ID AS bottleID";
    $temp =[];
    
    foreach($decode->Return as $item)
    {
      if(!array_key_exists($item, $validReturn))
        errorHandling("Incorrect parameters", 400);

      if($item == "awardName" || $item == "awardYear" || $item == "awardDetails")
        $awardFlag = true;
      else
      {
        array_push($temp,$validReturn[$item]);
      }
        
    }

    $sql .= implode(",", $temp) ." FROM Bottle AS bot
    JOIN WineBarrels AS bar
    ON bot.Wine_Barrel_ID = bar.ID
    LEFT JOIN Varietal AS var
    ON bar.Varietal_ID=var.ID
    LEFT JOIN WineRating AS rate 
    ON bar.ID = rate.Bottle_ID";
  }
  
  //Adding the Search
  if(isset($decode->Search))
  {
    $sql .= " WHERE ";
    $temp = [];

    foreach($decode->Search as $key=>$value)
    {
      if(!array_key_exists($key, $validReturn))
        errorHandling("Incorrect parameters", 400);

      $par = strstr($validReturn[$key], 'AS', true);

      if(!isset($decode->Fuzzy) || $decode->Fuzzy == "false") //Default and case: fuzzy = false
        array_push($temp, $par. "='" . $value . "'");
      else if(isset($decode->Fuzzy) && $decode->Fuzzy == "true")
        array_push($temp, $par. " LIKE '%" . $value . "%'");
    }

    $sql .= implode(" AND ", $temp);    
    $sql .= " GROUP BY bot.Bottle_ID";
  }
  else
  {
    $sql .= " GROUP BY bot.Bottle_ID";
  }

  //Adding the SORT 
  if(isset($decode->Sort))
  {
    $sql .= " ORDER BY ";
    if(!array_key_exists($decode->Sort, $validReturn))
      errorHandling("Incorrect parameters", 400);

    $sql .= $decode->Sort;
    //Adding the order
    if(isset($decode->Order))
    {
      if($decode->Order != "ASC" && $decode->Order != "DESC")
        errorHandling("Incorrect parameters", 400);
      $sql .= " ". $decode->Order;
    }
      
  }

  //Adding the Limit
  if(isset($decode->Limit))
    $sql.= " LIMIT " . $decode->Limit;  

    
  //Run the query via config.php
  $queryResults = Connect::instance()->runSelectQuery($sql);
  if($queryResults) //There is atleast 1 row returned 
  {
    if($awardFlag) //Need to fetch the awward for each row
    {
      if($decode->Return == "*")
      {
        foreach($queryResults as &$row)
        {
          $sql = "SELECT ";
          $temp = [];
          array_push($temp, "aw.ID AS awardID");
          array_push($temp, $validReturn["awardName"]);
          array_push($temp, $validReturn["awardYear"]);
          array_push($temp, $validReturn["awardDetails"]);

          $sql .= implode( ",",$temp) . " FROM Award AS aw WHERE aw.Wine_Barrel_ID = " . $row["wineBarrelID"];
          $awardResult = Connect::instance()->runSelectQuery($sql);
          if($awardResult == false) //There aren't any awards
            $row["award"] = "none"; 
          else
            $row["award"] = $awardResult; 
          
        }
      }
      else
      {
        foreach($queryResults as &$row)
        { 
          $sql = "SELECT ";
          $temp = [];
          if(in_array("awardName",$decode->Return))
            array_push($temp, $validReturn["awardName"]);
          if(in_array("awardYear", $decode->Return))
            array_push($temp, $validReturn["awardYear"]);
          if(in_array("awardDetails", $decode->Return))
            array_push($temp, $validReturn["awardDetails"]);

          $sql .= implode( ",",$temp) . " FROM Award AS aw WHERE aw.Wine_Barrel_ID = " . $row["wineBarrelID"];
          
          $awardResult = Connect::instance()->runSelectQuery($sql);
          if($awardResult == false) //There aren't any awards
            $row["award"] = "none"; 
          else
            $row["award"] = $awardResult; 
        }
      }      
    }

    $response = [
      'status' => 'sucsess',
      'timestamp' => time(),
      'data' => $queryResults
    ];
    return json_encode($response);
  }
  else if($queryResults==false)
  {
    $response = [
      'status' => 'failed',
      'timestamp' => time(),
      'data' => "No mathing results found"
    ];
    return json_encode($response);
  }
  else if ($queryResults==null)
    errorHandling('Error executing the database query.', 500);

}

function getWinery($decode)
{
  $validReturn = [
    "name" => "Winery.Name",
    "region" => "Winery.Region",
    "phoneNumber" => "Winery.Phone_Number",
    "email" => "Winery.Email",
    "postalCode" => "Winery.Postal_Code",
    "province" => "Winery.Province",
    "streetAddress" => "Winery.Street_Address",
    "wineryName" => "Winery.Name",
    "wineyardName" => "Wineyards.Wineyard_Name",
    "wineyardGrapeVariety" => "Wineyards.Grape_Variety",
    "wineyardArea" => "Wineyards.Area",
    "brandName" => "Winery.Brand_Name",
    "rating" => "SUM(WineryRating.Rating) AS rating",
    "wineyardID" => "Wineyards.Wineyard_ID" // Add this line
  ];


  $sql = "";

  if (!isset($decode->Return)) {
    return json_encode([
      'status' => 'error',
      'timestamp' => time(),
      'data' => 'The parameters are incorrect'
    ]);
  }

  // SELECT and FROM statements
  if ($decode->Return == "*") {
    $sql .= "SELECT Winery.*, Wineyards.Wineyard_ID, Wineyards.Grape_Variety, Wineyards.Area, SUM(WineryRating.Rating) AS rating
    FROM Winery
    LEFT JOIN Wineyards ON Winery.Name = Wineyards.Winery_ID
    LEFT JOIN WineryRating ON Winery.Name = WineryRating.Winery_ID";
  } else {
    $sql .= "SELECT ";
    $temp = [];

    foreach ($decode->Return as $item) {
      if (!array_key_exists($item, $validReturn)) {
        return json_encode([
          'status' => 'error',
          'timestamp' => time(),
          'data' => 'Incorrect parameters'
        ]);
      }

      array_push($temp, $validReturn[$item]);
    }

    $sql .= implode(", ", $temp) . "
    FROM Winery
    LEFT JOIN Wineyards ON Winery.Name = Wineyards.Winery_ID
    LEFT JOIN WineryRating ON Winery.Name = WineryRating.Winery_ID";
  }

  // Adding the search
  if (isset($decode->Search)) {
    $sql .= " WHERE ";
    $temp = [];

    foreach ($decode->Search as $key => $value) {
      if (!array_key_exists($key, $validReturn)) {
        return json_encode([
          'status' => 'error',
          'timestamp' => time(),
          'data' => 'Incorrect parameters'
        ]);
      }

      $column = $validReturn[$key];

      if (!isset($decode->Fuzzy) || $decode->Fuzzy == "false") {
        // Default and case: Fuzzy = false
        $temp[] = "$column = '$value'";
      } else if (isset($decode->Fuzzy) && $decode->Fuzzy == "true") {
        $temp[] = "$column LIKE '%$value%'";
      }
    }

    $sql .= implode(" AND ", $temp);
    $sql .= " GROUP BY Winery.Name";
  } else {
    $sql .= " GROUP BY Winery.Name";
  }

  // Adding the sorting
  if (isset($decode->Sort)) {
    if (!array_key_exists($decode->Sort, $validReturn)) {
      return json_encode([
        'status' => 'error',
        'timestamp' => time(),
        'data' => 'Incorrect parameters'
      ]);
    }

    $sql .= " ORDER BY " . $decode->Sort;

    // Adding the order
    if (isset($decode->Order)) {
      if ($decode->Order != "ASC" && $decode->Order != "DESC") {
        return json_encode([
          'status' => 'error',
          'timestamp' => time(),
          'data' => 'Incorrect parameters'
        ]);
      }

      $sql .= " " . $decode->Order;
    }
  }

  // Adding the limit
  if (isset($decode->Limit)) {
    $sql .= " LIMIT " . $decode->Limit;
  }
  
  // Run the query via config.php
  $queryResults = Connect::instance()->runSelectQuery($sql);

  if ($queryResults) {
    $response = [
      'status' => 'success',
      'timestamp' => time(),
      'data' => $queryResults
    ];

    return json_encode($response);
  } else if ($queryResults == false) {
    $response = [
      'status' => 'failed',
      'timestamp' => time(),
      'data' => "No matching results found"
    ];

    return json_encode($response);
  } else if ($queryResults == null) {
    return json_encode([
      'status' => 'error',
      'timestamp' => time(),
      'data' => 'Error executing the database query.'
    ]);
  }
}


function getWineyard($decode)
{
  if($decode->Return != "*" || !isset($decode->Return ))
    errorHandling("Incorrect parameters", 400);

  $sql = "SELECT Wineyards.Wineyard_ID AS wineyardID, Wineyards.Winery_Name AS wineryName, Wineyards.Wineyard_Name AS wineyardName, Wineyards.Street_Address AS address, Wineyards.Province AS province, 
  Wineyards.Postal_Code AS postalCode, Wineyards.Grape_Variety AS grapeVariety FROM Wineyards";

  $response = Connect::instance()->runSelectQuery($sql);

  if(!$response)
  {
    $response = [
      'status' => 'success',
      'timestamp' => time(),
      'data' => "No matching response"
    ];
    return json_encode($response);
  }
  else if($response == null)
  errorHandling('Error executing the database query.', 500);
  else 
  {
    $response = [
      'status' => 'success',
      'timestamp' => time(),
      'data' => $response
    ];
    return json_encode($response);
  }
}

function getBrands($decode)
{
  $validReturn = [
    "name" => "Brand.Name",
    "phoneNumber" => "Brand.Phone_Number",
    "email" => "Brand.Email",
    "streetAddress" => "Brand.Street_Address",
    "province" => "Brand.Province",
    "postalCode" => "Brand.Postal_Code",
    "rating" => "Brand_Rating.Rating",
    "wineryName" => "Winery.Name"
  ];

  $sql = "";

  if (!isset($decode->Return)) {
    return json_encode([
      'status' => 'error',
      'timestamp' => time(),
      'data' => 'The parameters are incorrect'
    ]);
  }

  $sql .= "SELECT ";
  $temp = [];

  if ($decode->Return == "*") {
    $sql .= "Brand.*, SUM(Brand_Rating.Rating) AS rating, Winery.Name AS wineryName";
  } else {
    foreach ($decode->Return as $item) {
      if (!array_key_exists($item, $validReturn)) {
        return json_encode([
          'status' => 'error',
          'timestamp' => time(),
          'data' => 'Incorrect parameters'
        ]);
      }

      array_push($temp, $validReturn[$item]);
    }

    $sql .= implode(", ", $temp);
  }

  $sql .= " FROM Brand
    LEFT JOIN Brand_Rating ON Brand.Name = Brand_Rating.Brand_Name
    LEFT JOIN Winery ON Brand.Name = Winery.Brand_Name";

  // Add search conditions to the SQL query if search fields are provided
  if (isset($decode->Search)) {
    $conditions = [];
    foreach ($decode->Search as $field => $value) {
      if (isset($validReturn[$field]) && $value !== null) {
        $column = $validReturn[$field];
        if ($field === 'rating' || $field === 'wineryName') {
          $conditions[] = "$column LIKE '%$value%'";
        } else {
          $conditions[] = "$column = '$value'";
        }
      }
    }
    if (!empty($conditions)) {
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }
  }

  // Group by Brand_Name to combine ratings with the same Brand_Name
  $sql .= " GROUP BY Brand.Name";

  // Add sorting to the SQL query
  if (isset($decode->Sort)) {
    $sortField = $validReturn[$decode->Sort];
    $sortOrder = isset($decode->Order) ? strtoupper($decode->Order) : 'ASC';
    $sql .= " ORDER BY $sortField $sortOrder";
  }

  // Add limit to the SQL query if specified
  if (isset($decode->Limit)) {
    $limit = intval($decode->Limit);
    $sql .= " LIMIT $limit";
  }

  // Execute the query using the runSelectQuery() function
  $result = Connect::instance()->runSelectQuery($sql);

  if ($result === false) {
    return json_encode([
      'status' => 'failed',
      'timestamp' => time(),
      'data' => 'No matching records found.'
    ]);
  } elseif ($result === null) {
    return json_encode([
      'status' => 'error',
      'timestamp' => time(),
      'data' => 'Error executing the database query.'
    ]);
  } else {
    $response = [
      'status' => 'success',
      'timestamp' => time(),
      'data' => $result
    ];
    return json_encode($response);
  }
}

function getUser($decode)
{
  $fuzzy = isset($decode->fuzzy) ? $decode->fuzzy : true;
  $search = isset($decode->search) ? $decode->search : [
    'fName' => null,
    'lName' => null,
    'email' => null,
    'userType' => null
  ];
  $returnFields = isset($decode->return) ? $decode->return : [];

  // Mapping of return fields to database column names
  $fieldMappings = [
    'fName' => 'First_Name',
    'lName' => 'Last_Name',
    'email' => 'Email',
    'userType' => 'User_Type'
  ];

  // Prepare the SQL query
  $sql = "SELECT ";

  if (empty($returnFields) || $returnFields === '*') {
    $sql .= "*";
  } else {
    $mappedFields = [];
    foreach ($returnFields as $field) {
      if (isset($fieldMappings[$field])) {
        $mappedFields[] = $fieldMappings[$field];
      }
    }
    $sql .= implode(", ", $mappedFields);
  }

  $sql .= " FROM User";


  // Add search conditions to the SQL query if search fields are provided
  if (!empty($search)) {
    $conditions = [];
    foreach ($search as $field => $value) {
      if (isset($fieldMappings[$field]) && $value !== null) {
        $column = $fieldMappings[$field];
        if ($fuzzy) {
          $conditions[] = "$column LIKE '%$value%'";
        } else {
          $conditions[] = "$column = '$value'";
        }
      }
    }
    if (!empty($conditions)) {
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }
  }

  // Execute the query using the runSelectQuery() function
  $result = Connect::instance()->runSelectQuery($sql);

  if ($result === false) {
    errorHandling('No matching records found.', 500);

  } elseif ($result === null) {
    errorHandling('Error executing the database query.', 500);

  } else {
    $response = [
      'status' => 'success',
      'timestamp' => time(),
      'data' => $result
    ];
    return json_encode($response);
  }
}

function UpdateUser($decode)
{
  $userID = $decode->ID;
  //Checking if the record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $userID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("User ID does not exist", 400);
  
  $validValues = array("fName"=>"User.First_Name", "lName" => "User.Last_Name", "phoneNumber" => "User.Phone_Number","email" => "User.Email", "streetAddress" => "User.Street_Address", 
  "province" =>"User.Province", "postalCode" => "User.Postal_Code", "userType" => "User.User_Type", "department" => "User.Department", "credentials" => "User.Credentials", 
  "prefences" => "User.Preferences", "password" => "User.Password");

  $updateInfo = $decode->UpdateInfo;

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $sql = "UPDATE User SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validValues))
    {
      array_push($temp,$validValues[$key] . " = '" . $value . "'");  
    }      
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . " WHERE User.User_ID = " .$userID;
    if(Connect::instance()->runInsertOrDelteQuery($sql))
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
  }
  else
   errorHandling("Please provide update info. Make sure the format is correct.", 400);
  
}

function UpdateWine($decode)  
{
  $sqlResult = array();
  $countUpdates = 0;
  $ID = $decode->ID;
  $wineBarrelID = $ID->wineBarrelID;
  $bottleID = $ID->bottleID;
  $awardID = $ID->awardID; 
  $varietalID = $ID->varietalID;

  //Checking if the wineBarrel record exists
  $sql = "SELECT * FROM WineBarrels WHERE WineBarrels.ID = ". $wineBarrelID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("WineBarrel ID does not exist", 400);
  
  //Checking if the wineBottle record exists
  $sql = "SELECT * FROM Bottle WHERE Bottle.Bottle_ID = ". $bottleID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Bottle ID does not exist", 400);

  //Checking that the awardID exists
  foreach($awardID as $id)
  {
    $sql = "SELECT * FROM Award WHERE Award.ID = ". $id ;
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("The awardIDs provided don't exist", 400);
  }  

  //Checking that the varietalID exists
  $sql = "SELECT * FROM Varietal WHERE Varietal.ID = ". $varietalID ;
  if(!Connect::instance()->runSelectQuery($sql))
     errorHandling("VarietalID provided does not exist", 400);  

  if(!isset($decode->WineUpdateInfo) && !isset($decode->VarUpdateInfo) && !isset($decode->AwardUpdateInfo))
    errorHandling("Incorrect parameters", 400);

  $wineUpdateInfo = $decode->WineUpdateInfo;
  $varUpdateInfo = $decode->VarUpdateInfo;
  $awardUpdateInfo = $decode->AwardUpdateInfo;

  //checking that the brand name provided exists
  if(isset($varUpdateInfo->brandName))
  {
    $sql = "SELECT * FROM Brand WHERE Brand.Name = '". $varUpdateInfo->brandName ."'";
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Brand name provided does not exist. Please insert into brand first", 400);
  }
  //Checking that the Winery exists
  if(isset($wineUpdateInfo->wineryName))
  {
    $sql = "SELECT * FROM Winery WHERE Winery.Name = '". $wineUpdateInfo->wineryName ."'";
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Winery name provided does not exist. Please insert into winery first", 400);
  }
  //Checking that the Wineyard exists
  if(isset($wineUpdateInfo->wineyardName))
  {
    $sql = "SELECT * FROM Wineyards WHERE Wineyards.Wineyard_Name = '". $wineUpdateInfo->wineyardName ."'";
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Wineyard name provided does not exist. Please insert into wineyard first", 400);
  }  
   
  $validBottleValues = array("bottleSize" => "bot.Bottle_Size", "price" => "bot.Price", "image_URL" => "bot.Image_URL", "numBotllesMade"=> "bot.Num_Bottles_Made", 
  "numBotllesSold" =>"bot.Num_Bottles_Sold");

  $validBarrelValues = array("name"=> "bar.Name ", "year"=> "bar.Year", "description"=> "bar.Description", "cellaringPotential"=> "bar.Cellaring_Potential","brandName"=> "var.Brand_Name", 
  "varietalName"=> "bar.Varietal","wineryName"=> "bar.Winery_Name", "productionMethod"=> "bar.Production_Method", "productionDate"=> "bar.Production_Date", "wineyardName"=> "bar.Wineyard_Name");

  $validAwardValues = array("awardName"=> "aw.Award", "awardYear"=> "aw.Year", "awardDetails"=> "aw.Details");

  $validVarietyValues = array("varietalName"=> "var.Varietal_Name", "brandName"=>"var.Brand_Name", "residualSugar"=> "var.Residual_Sugar", "ph"=> "var.pH", 
  "alcoholPercent"=> "var.Alcohol_Percentage", "quality"=> "var.Quality","categoryName"=> "var.Category_Name");

  //Updating Award
  foreach($awardUpdateInfo as $awInfo)
  {
    $sql = "UPDATE Award AS aw SET ";
    $temp = [];
    
    if(!in_array($awInfo->awardID,$awardID))
      errorHandling("The award being updated does not belong to this wine. Make sure the correct wineID has been passed", 400);
    
    foreach($awInfo as $key=>$value)
    {
      if(array_key_exists($key, $validAwardValues))
        array_push($temp,$validAwardValues[$key] . " = '" . $value. "'");  
    }
    if(!empty($temp))
    {
      $sql.= implode(",", $temp) . " WHERE aw.ID = " .$awInfo->awardID;
      $result = Connect::instance()->runInsertOrDelteQuery($sql);
      array_push($sqlResult, $result);
      $countUpdates++;
    }
  }
  
  //Updating varietal
  //Fisrt we need to check if it's a update or if the record already exists
  if(isset($varUpdateInfo->varietalName) && isset($varUpdateInfo->brandName))
  {
    $sql = "SELECT Varietal.ID FROM Varietal WHERE Varietal.Varietal_Name = '". $varUpdateInfo->varietalName ."' AND Varietal.brand_Name  = '". $varUpdateInfo->brandName ."'";
    $result = Connect::instance()->runSelectQuery($sql);
    if(!$result) //It is an update 
    {
      $sql = "UPDATE Varietal AS var SET ";
      $temp = [];

      foreach($varUpdateInfo as $key=>$value)
      {
        if(array_key_exists($key, $validVarietyValues))
          array_push($temp,$validVarietyValues[$key] . " = '" . $value . "'");  
      }
      if(!empty($temp))
      {
        $sql.= implode(",", $temp) . " WHERE var.ID = " .$varietalID;
        $result = Connect::instance()->runInsertOrDelteQuery($sql);
        array_push($sqlResult, $result);
        $countUpdates++;
      }
    }
    else //changing the varietalID in the Barrel table 
    {
      $sql = "UPDATE WineBarrels AS bar SET bar.Varietal_ID = " .$result[0]["ID"];
      $result = Connect::instance()->runInsertOrDelteQuery($sql);
      array_push($sqlResult, $result);
      $countUpdates++;
    }
  }

  //Updating Barrel   
  $sql = "UPDATE WineBarrels AS bar SET ";
  $temp = [];

  foreach($wineUpdateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validBarrelValues))
      array_push($temp,$validBarrelValues[$key] . " = '" . $value . "'");  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . " WHERE bar.ID = " .$wineBarrelID;
    $result = Connect::instance()->runInsertOrDelteQuery($sql);
    array_push($sqlResult, $result);
    $countUpdates++;
  }
  
  //Updating Bottle 
  $sql = "UPDATE Bottle AS bot SET ";
  $temp = [];

  foreach($wineUpdateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validBottleValues))
      array_push($temp,$validBottleValues[$key] . " = '" . $value. "'");  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . " WHERE bot.Bottle_ID = " .$bottleID;
    $result = Connect::instance()->runInsertOrDelteQuery($sql);
    array_push($sqlResult, $result);
    $countUpdates++;
  }
  if(in_array("false",$sqlResult))
  {
    $response = [
      'status' => 'fail',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
  else
  {
    if($countUpdates==0)
    {
      errorHandling("Please provide update info. Make sure the format is correct.", 400);
    }
    else
    {
      $response = [
      'status' => 'success',
      'timestamp' => time()
      ];
      return json_encode($response);
    }
  }
}

function UpdateWinery($decode)
{
  $wineryID = $decode->ID;
  //Checking if the record exists
  $sql = "SELECT * FROM Winery WHERE Winery.Winery_ID = ". $wineryID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Winery ID does not exist", 400);
  
  $validValues = array("name"=>"Winery.Name", "phoneNumber"=>"Winery.Phone_Number", "email"=>"Winery.Email", "streetAddress"=>"Winery.Street_Address",
  "province"=>"Winery.Province", "postalCode"=>"Winery.Postal_Code", "brandName"=>"Winery.Brand_Name", "image_URL"=>"Winery.Winery_URL");

  $updateInfo = $decode->UpdateInfo;

  //Checking the brand name given exists
  if(isset($updateInfo->brandName))
  {
    $sql = "SELECT * FROM Brand WHERE Brand.Name = '". $updateInfo->brandName. "'";
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Brand name provided does not exist. Please do an insert into the Brand table first", 400);
  } 

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $sql = "UPDATE Winery SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validValues))
      array_push($temp,$validValues[$key] . " = '" . $value. "'");  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . " WHERE Winery.Winery_ID = " .$wineryID;
    if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
  }
  else
    errorHandling("Please provide update info. Make sure the format is correct.", 400);  
}

function UpdateWineyard($decode)
{
  $ID = $decode->ID;
  $wineyardID = $ID->wineyardID;
  $wineryID = $ID->wineryID;

  //Checking if the record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $wineyardID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Wineyard ID does not exist", 400);

  $sql = "SELECT * FROM User WHERE User.User_ID = ". $wineryID;
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Winery ID does not exist", 400);
  
  $validValues = array("wineyardName" =>"Wineyards.Wineyard_Name", "wineryName" =>"Wineyards.Winery_Name", "wineryID" =>"Wineyards.Winery_ID", "postalCode" =>"Wineyards.Postal_Code", 
  "province" =>"Wineyards.Province", "steetAddress" =>"Wineyards.Street_Address", "area" =>"Wineyards.Area","grapeVariety" =>"Wineyards.Grape_Variety", "image_URL"=>"Wineyards.Wineyard_URL");

  $sql = "UPDATE Wineyards SET ";
  $temp = [];

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $updateInfo = $decode->UpdateInfo;

  //getting the wineryID if it is being updated 
  if(isset($updateInfo->wineryName))
  {
    $sql2 ="SELECT Winery_ID FROM Winery WHERE Winery.Name = '". $updateInfo->wineryName."'";
    $newWineryID =Connect::instance()->runSelectQuery($sql2);
    if(!$newWineryID)
      errorHandling("Winery name provided does not exist", 400);
    $sql.= "Wineyards.Winery_ID = " . $newWineryID[0]["Winery_ID"].",";
  }

  //Checking the brand name given exists
  if(isset($updateInfo->brandName))
  {
    $sql2 = "SELECT * FROM Brand WHERE Brand.Name = ". $updateInfo->brandName;
    if(!Connect::instance()->runSelectQuery($sql2))
      errorHandling("Brand name provided does not exist", 400);
  } 

  foreach($updateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validValues))
      array_push($temp,$validValues[$key] . " = '" . $value. "'");  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . " WHERE Wineyards.Wineyard_ID = " .$wineryID ;
    if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
  }
  else
    errorHandling("Please provide update info. Make sure the format is correct.", 400);  
}

function UpdateBrand($decode)
{
  $brandID = $decode->ID;
  //Checking if the record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $brandID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Brand ID does not exist", 400);
  
  $validValues = array("name"=>"Brand.Name", "phoneNumber"=>"Brand.Phone_Number", "email"=>"Brand.Email", "streetAddress"=>"Brand.Street_Address",
  "province"=>"Brand.Province", "postalCode"=>"Brand.Postal_Code");

  $updateInfo = $decode->UpdateInfo;

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $sql = "UPDATE Brand SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(!array_key_exists($key, $validValues))
      errorHandling("Incorrect parameters", 400);

    array_push($temp,$validValues[$key] . " = '" . $value. "'");  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . " WHERE Brand.Brand_ID = " .$brandID;
    if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
  }
  else
    errorHandling("Please provide update info. Make sure the format is correct.", 400);  
  
}

function DeleteUser($decode)
{
  if(!isset($decode->ID))
    errorHandling("The ID parameter is not set", 400);

  $sqlResults = array();
  $id = $decode->ID;
  $sql = "DELETE FROM Brand_Rating WHERE Brand_Rating.User_ID = ".$id ;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM WineryRating WHERE WineryRating.User_ID = " .$id ;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM WineRating WHERE WineRating.User_ID = " .$id;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM WineyardRating WHERE WineyardRating.User_ID= " .$id;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM Purchases WHERE Purchases.User_ID = " .$id;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM User WHERE User.User_ID = " .$id;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);  
  array_push($sqlResults,$result);

  if(in_array("false", $sqlResults))
  {
    $response = [
      'status' => 'fail',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
  else
  {
    $response = [
      'status' => 'sucess',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
}

function DeleteWine($decode)
{
  if(!isset($decode->ID))
    errorHandling("The ID parameter is not set", 400);
  $sqlResults = array();
  $wineBottelID = $decode->ID;
  $sql = "DELETE FROM WineRating WHERE WineRating.Bottle_ID= " .$wineBottelID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM Bottle WHERE Bottle.Bottle_ID= " .$wineBottelID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);

  if(in_array("false", $sqlResults))
  {
    $response = [
      'status' => 'fail',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
  else
  {
    $response = [
      'status' => 'sucess',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
}

function DeleteWinery($decode)
{
  if(!isset($decode->ID))
    errorHandling("The ID parameter is not set", 400);
  $sqlResults = array();
  $wineryID= $decode->ID;

  $sql = "DELETE FROM WineryRating WHERE WineryRating.Winery_ID= " .$wineryID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM Wineyards WHERE Wineyards.Winery_ID= " .$wineryID;//Need to delete all the wineyards associated with this winery
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM Winery WHERE Winery.Winery_ID= " .$wineryID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);

  if(in_array("false", $sqlResults))
  {
    $response = [
      'status' => 'fail',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
  else
  {
    $response = [
      'status' => 'sucess',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
}

function DeleteWineyard($decode)
{
  if(!isset($decode->ID))
    errorHandling("The ID parameter is not set", 400);
  $sqlResults = array();
  $wineryID= $decode->ID;
  $sql = "DELETE FROM WineyardRating WHERE WineyardRating.Wineyard_ID= " .$wineryID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM Wineyards WHERE Wineyards.Wineyard_ID= " .$wineryID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);

  if(in_array("false", $sqlResults))
  {
    $response = [
      'status' => 'fail',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
  else
  {
    $response = [
      'status' => 'sucess',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
}

function DeleteBrand($decode)
{
  if(!isset($decode->ID))
    errorHandling("The ID parameter is not set", 400);
  $sqlResults = array();
  $brandID= $decode->ID;
  $sql = "DELETE FROM Brand_Rating WHERE Brand_Rating.Brand_ID= " .$brandID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);
  $sql = "DELETE FROM Brand WHERE Brand.Brand_ID= " .$brandID;
  $result =Connect::instance()->runInsertOrDelteQuery($sql);
  array_push($sqlResults,$result);

  if(in_array("false", $sqlResults))
  {
    $response = [
      'status' => 'fail',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
  else
  {
    $response = [
      'status' => 'sucess',
      'timestamp' => time()
    ];
    return json_encode($response);
  }
}


function AppendUser($decode)
{
  // Get the values from the JSON object
  $firstName = $decode->AppendInfo->fName;
  $lastName = $decode->AppendInfo->lName;
  $phoneNumber = $decode->AppendInfo->phoneNumber;
  $email = $decode->AppendInfo->email;
  $streetAddress = $decode->AppendInfo->streetAddress;
  $province = $decode->AppendInfo->province;
  $postalCode = $decode->AppendInfo->postalCode;
  $userType = $decode->AppendInfo->userType;
  $department = $decode->AppendInfo->department;
  $credentials = $decode->AppendInfo->credentials;
  $preferences = $decode->AppendInfo->preferences;
  $password = $decode->AppendInfo->password;

  // Generate the SQL query to append the user data
  $sql = "INSERT INTO User (First_Name, Last_Name, Phone_Number, Email, Street_Address, Province, Postal_Code, User_Type, Department, Credentials, Preferences, Password)
          VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$streetAddress', '$province', '$postalCode', '$userType', '$department', '$credentials', '$preferences', '$password')";
          
          //echo $sql;

  // Execute the SQL query to append the user data
  // Connect::instance()->runInsertOrDelteQuery($sql);
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendWine($decode)
{
  // Get the values from the JSON object
  $bottleSize = $decode->AppendInfo->bottleSize;
  $price = $decode->AppendInfo->price;
  $imageURL = $decode->AppendInfo->image_URL;
  $numBottlesMade = $decode->AppendInfo->numBotllesMade;
  $numBottlesSold = $decode->AppendInfo->numBotllesSold;
  $name = $decode->AppendInfo->name;
  $description = $decode->AppendInfo->description;
  $cellaringPotential = $decode->AppendInfo->cellaringPotential;
  $awardName = $decode->AppendInfo->awardName;
  $awardYear = $decode->AppendInfo->awardYear;
  $awardDetails = $decode->AppendInfo->awardDetails;
  $categoryName = $decode->AppendInfo->categoryName;
  $varietalName = $decode->AppendInfo->varietalName;
  $residualSugar = $decode->AppendInfo->residualSugar;
  $pH = $decode->AppendInfo->ph;
  $alcoholPercent = $decode->AppendInfo->alcoholPercent;
  $quality = $decode->AppendInfo->quality;
  $brandName = $decode->AppendInfo->brandName;
  $wineryName = $decode->AppendInfo->wineryName;
  $wineyardName = $decode->AppendInfo->wineyardName;
  $productionMethod = $decode->AppendInfo->productionMethod;
  $year = $decode->AppendInfo->year;
  $productionDate = $decode->AppendInfo->productionDate;

  // Generate the SQL queries to append the wine data

   // Varietal table
   $sqlVarietal = "INSERT INTO Varietal (Varietal_Name, Brand_Name, Residual_Sugar, pH, Alcohol_Percentage, Quality, Category_Name)
   VALUES ('$varietalName', '$brandName', '$residualSugar', '$pH', '$alcoholPercent', '$quality', '$categoryName')";


  // WineBarrels table
  $sqlWineBarrels = "INSERT INTO WineBarrels (Name, Year, Description, Cellaring_Potential, Varietal_ID, Winery_Name, Production_Date, Production_Method, Wineyard_Name)
                     VALUES ('$name', '$year', '$description', '$cellaringPotential', (SELECT MAX(ID) FROM Varietal), '$wineryName', '$productionDate', '$productionMethod', '$wineyardName')";

  // Production table
  $sqlProduction = "INSERT INTO Production (Winery_Name, Brand_Name)
                    VALUES ('$wineryName', '$brandName')";

  // Bottle table
  $sqlBottle = "INSERT INTO Bottle (Bottle_ID, Wine_Barrel_ID, Bottle_Size, Price, Num_Bottles_Made, Num_Bottles_Sold, Image_URL)
                VALUES ((SELECT MAX(Bottle_ID) FROM Bottle) + 1, (SELECT MAX(ID) FROM WineBarrels), '$bottleSize', '$price', '$numBottlesMade', '$numBottlesSold', '$imageURL')";


  // Award table
  $sqlAward = "INSERT INTO Award (Wine_Barrel_ID, Award, Year, Details)
               VALUES ((SELECT MAX(ID) FROM WineBarrels), '$awardName', '$awardYear', '$awardDetails')";

 // echo $sqlVarietal;
  //echo $sqlWineBarrels;
 // echo $sqlProduction;
  //echo $sqlBottle;
 // echo $sqlAward;

  // Execute the SQL queries to append the wine data
  
  Connect::instance()->runInsertOrDelteQuery($sqlWineBarrels);
  Connect::instance()->runInsertOrDelteQuery($sqlProduction);
  Connect::instance()->runInsertOrDelteQuery($sqlVarietal);
  Connect::instance()->runInsertOrDelteQuery($sqlBottle);
  Connect::instance()->runInsertOrDelteQuery($sqlAward);
}


function AppendWinery($decode)
{
  // Get the values from the JSON object
  $name = $decode->AppendInfo->name;
  $phoneNumber = $decode->AppendInfo->phoneNumber;
  $email = $decode->AppendInfo->email;
  $postalCode = $decode->AppendInfo->postalCode;
  $province = $decode->AppendInfo->province;
  $streetAddress = $decode->AppendInfo->streetAddress;
  $brandName = $decode->AppendInfo->brandName;

  // Generate the SQL query to append the winery data
  $sql = "INSERT INTO Winery (Name, Province, Postal_Code, Street_Address, Phone_Number, Email, Brand_Name)
          VALUES ('$name', '$province', '$postalCode', '$streetAddress', '$phoneNumber', '$email', '$brandName')";

  //echo $sql;

  // Execute the SQL query to append the user data
  // Connect::instance()->runInsertOrDelteQuery($sql);
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendWineyard($decode)
{
  // Get the values from the JSON object
  $wineyardName = $decode->AppendInfo->wineyardName;
  $wineryName = $decode->AppendInfo->wineryName;
  $postalCode = $decode->AppendInfo->postalCode;
  $province = $decode->AppendInfo->province;
  $streetAddress = $decode->AppendInfo->streetAddress;
  $area = $decode->AppendInfo->area;
  $grapeVariety = $decode->AppendInfo->grapeVariety;

  // Generate the SQL query to append the wineyard data
  $sql = "INSERT INTO Wineyards ( Winery_ID, Wineyard_Name, Winery_Name, Street_Address, Province, Postal_Code, Area, Grape_Variety)
          VALUES ((SELECT Winery_ID FROM Winery WHERE Name = '$wineryName'), '$wineyardName', '$wineryName', '$streetAddress', '$province', '$postalCode', '$area', '$grapeVariety')";

  //echo $sql;

  // Execute the SQL query to append the user data
  // Connect::instance()->runInsertOrDelteQuery($sql);
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendBrand($decode)
{
  // Get the values from the JSON object
  $name = $decode->AppendInfo->name;
  $phoneNumber = $decode->AppendInfo->phoneNumber;
  $email = $decode->AppendInfo->email;
  $postalCode = $decode->AppendInfo->postalCode;
  $province = $decode->AppendInfo->province;
  $streetAddress = $decode->AppendInfo->streetAddress;

  // Generate the SQL query to append the brand data
  $sql = "INSERT INTO Brand (Brand_ID, Name, Phone_Number, Email, Street_Address, Province, Postal_Code)
          VALUES ((SELECT MAX(Brand_ID) FROM Brand) + 1, '$name', '$phoneNumber', '$email', '$streetAddress', '$province', '$postalCode')";

  // Execute the SQL query to append the brand data
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendBrandRating($decode)
{
  // Get the values from the JSON object
  $brandID = $decode->ID->brandID;
  $userID = $decode->ID->userID;
  $rating = $decode->AppendInfo->rating;

  // Generate the SQL query to append the brand rating data
  $sql = "INSERT INTO Brand_Rating (Brand_Name, User_ID, Rating)
          VALUES ((SELECT Name FROM Brand WHERE Brand_ID = $brandID), $userID, $rating)";

  // Execute the SQL query to append the brand rating data
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendWineRating($decode)
{
  // Get the values from the JSON object
  $userID = $decode->ID->userID;
  $wineBarrelID = $decode->ID->wineBarrelID;
  $rating = $decode->AppendInfo->rating;

  // Generate the SQL query to append the wine rating data
  $sql = "INSERT INTO WineRating (User_ID, Bottle_ID, Rating)
          VALUES ($userID, (SELECT Bottle_ID FROM Bottle WHERE Wine_Barrel_ID = $wineBarrelID), $rating)";

  // Execute the SQL query to append the wine rating data
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendWineryRating($decode)
{
  // Get the values from the JSON object
  $userID = $decode->ID->userID;
  $wineryID = $decode->ID->wineryID;
  $rating = $decode->AppendInfo->rating;

  // Generate the SQL query to append the winery rating data
  $sql = "INSERT INTO WineryRating (User_ID, Winery_ID, Rating)
          VALUES ($userID, $wineryID, $rating)";

  // Execute the SQL query to append the winery rating data
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}


function AppendWineyardRating($decode)
{
  // Get the values from the JSON object
  $userID = $decode->ID->userID;
  $wineryID = $decode->ID->wineryID;
  $wineyardID = $decode->ID->wineyardID;
  $rating = $decode->AppendInfo->rating;

  // Generate the SQL query to append the wineyard rating data
  $sql = "INSERT INTO WineyardRating (User_ID, Wineyard_ID, Rating)
          VALUES ($userID, $wineyardID, $rating)";

  // Execute the SQL query to append the wineyard rating data
  if(Connect::instance()->runInsertOrDelteQuery($sql)=="true")
    {
      $response = [
        'status' => 'success',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
    else
    {
      $response = [
        'status' => 'fail',
        'timestamp' => time()
      ];
      return json_encode($response);
    }
}
?>
