<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Including configuration
require_once ("Config.php");
$db = Connect::instance();

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
    "brandName"=> "bar.Brand_Name AS brandName","wineryName"=> "bar.Winery_Name AS wineryName", 
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

    $sql .= "SELECT bot.Wine_Barrel_ID AS wineBarrelID, bot.Bottle_Size AS bottleSize, bot.Price AS price, bot.Image_URL AS image_URL, bot.Num_Bottles_Made - bot.Num_Bottles_Sold AS availability, 
    bar.Name AS name, bar.Year AS year, YEAR(CURDATE()) - bar.Year AS age, bar.Description AS description, bar.Cellaring_Potential AS cellaringPotential, 
    var.Category_Name AS categoryName, var.Varietal_Name AS varietalName, var.Residual_Sugar AS residualSugar, var.pH AS ph, 
    var.Alcohol_Percentage AS alcoholPercent, var.Quality AS quality, bar.Brand_Name AS brandName, bar.Winery_Name AS wineryName, bar.Wineyard_Name AS wineyardName, 
    AVG(rate.Rating) AS rating, bar.Production_Method AS productionMethod, bar.Production_Date AS productionDate
    FROM Bottle AS bot
    JOIN WineBarrels AS bar
    ON bot.Wine_Barrel_ID = bar.ID
    LEFT JOIN Varietal AS var
    ON bar.Varietal = var.Varietal_Name AND bar.Brand_Name=var.Brand_Name
    LEFT JOIN WineRating AS rate 
    ON bar.ID = rate.Bottle_ID"; 
  }
  else //Returing selected stuff
  {
    $sql .= "SELECT bot.Wine_Barrel_ID AS wineBarrelID, ";
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
    ON bar.Varietal = var.Varietal_Name AND bar.Brand_Name=var.Brand_Name
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
    "rating" => "SUM(WineryRating.Rating) AS rating"
  ];

  $fuzzy = isset($decode->fuzzy) ? $decode->fuzzy : true;
  $search = isset($decode->search) ? $decode->search : [];
  $returnFields = isset($decode->return) ? $decode->return : [];
  $sortField = isset($decode->sort) ? $decode->sort : 'name';
  $sortOrder = isset($decode->order) ? strtoupper($decode->order) : 'ASC';
  $limit = isset($decode->limit) ? intval($decode->limit) : null;

  // Prepare the SQL query
  $sql = "SELECT ";

  if (empty($returnFields) || $returnFields === '*') {
    $sql .= "DISTINCT Winery.*, Wineyards.Wineyard_Name, Wineyards.Grape_Variety, Wineyards.Area, SUM(WineryRating.Rating) AS rating";
  } else {
    $selectFields = [];
    foreach ($returnFields as $field) {
      if (!isset($validReturn[$field])) {
        errorHandling("Incorrect parameters", 400);
      }
      $selectFields[] = $validReturn[$field];
    }
    $sql .= implode(", ", $selectFields);
  }

  $sql .= " FROM Winery
          LEFT JOIN Wineyards ON Winery.Name = Wineyards.Winery_Name
          LEFT JOIN WineryRating ON Winery.Name = WineryRating.Winery_Name";

  // Add search conditions to the SQL query if search fields are provided
  if (!empty($search)) {
    $conditions = [];
    foreach ($search as $field => $value) {
      if (isset($validReturn[$field])) {
        $column = $validReturn[$field];
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

  // Add grouping to the SQL query
  $sql .= " GROUP BY Winery.Name";

  // Add sorting to the SQL query
  $sql .= " ORDER BY $sortField $sortOrder";

  // Add limit to the SQL query if specified
  if ($limit !== null) {
    $sql .= " LIMIT $limit";
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
  $fuzzy = isset($decode->fuzzy) ? $decode->fuzzy : true;
  $search = isset($decode->search) ? $decode->search : [
    'name' => null,
    'rating' => null,
    'wineryName' => null
  ];
  $returnFields = isset($decode->return) ? (is_array($decode->return) ? $decode->return : explode(',', $decode->return)) : [];
  $sortField = isset($decode->sort) ? $decode->sort : 'name';
  $sortOrder = isset($decode->order) ? strtoupper($decode->order) : 'ASC';
  $limit = isset($decode->limit) ? intval($decode->limit) : null;

  // Mapping of return fields to database column names
  $fieldMappings = [
    'name' => 'Name',
    'phoneNumber' => 'Phone_Number',
    'email' => 'Email',
    'streetAddress' => 'Street_Address',
    'province' => 'Province',
    'postalCode' => 'Postal_Code',
    'rating' => 'brandRating.Rating',
    'wineryName' => 'winery.Name'
  ];

  // Prepare the SQL query
  $sql = "SELECT ";

  if (empty($returnFields) || $returnFields === '*') {
    $sql .= "Brand.*, Brand_Rating.Rating, Winery.Name AS WineryName";
  } else {
    $mappedFields = [];
    foreach ($returnFields as $field) {
      if (isset($fieldMappings[$field])) {
        $mappedFields[] = $fieldMappings[$field];
      }
    }
    if (empty($mappedFields)) {
      $mappedFields[] = "Brand.*"; // Add default fields if $returnFields is empty or no valid fields are found
    }
    $sql .= implode(", ", $mappedFields);
    if (in_array('rating', $returnFields)) {
      $sql .= ", Brand_Rating.Rating";
    }
    if (in_array('wineryName', $returnFields)) {
      $sql .= ", Winery.Name AS WineryName";
    }
  }

  $sql .= " FROM Brand";

  // Add the join with the brandRating table if searching for rating
  if (in_array('rating', $returnFields)) {
    $sql .= " LEFT JOIN Brand_Rating ON Brand.Name = Brand_Rating.Brand_Name";
  }

  // Add the join with the Winery table if searching for wineryName
  if (in_array('wineryName', $returnFields)) {
    $sql .= " LEFT JOIN Winery ON Brand.Brand_Name = Winery.Brand_Name";
  }

  // Add search conditions to the SQL query if search fields are provided
  if (!empty($search)) {
    $conditions = [];
    foreach ($search as $field => $value) {
      if (isset($fieldMappings[$field]) && $value !== null) {
        $column = $fieldMappings[$field];
        if ($field === 'rating' || $field === 'wineryName') {
          $conditions[] = "$column LIKE :$field";
        } else {
          if ($fuzzy) {
            $conditions[] = "Brand.$column LIKE '%$value%'";
          } else {
            $conditions[] = "Brand.$column = '$value'";
          }
        }
      }
    }
    if (!empty($conditions)) {
      $sql .= " WHERE " . implode(" AND ", $conditions);
    }
  }


  // Add sorting to the SQL query
  $sql .= " ORDER BY $sortField $sortOrder";

  // Add limit to the SQL query if specified
  if ($limit !== null) {
    $sql .= " LIMIT $limit";
  }

  // Execute the query using the runSelectQuery() function
  $result = Connect::instance()->runSelectQuery($sql, $search);

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

  $updateInfo = json_decode($decode->UpdateInfo);

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $sql = "UPDATE User SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(!array_key_exists($key, $validValues))
      errorHandling("Incorrect parameters", 400);

    array_push($temp,$validValues[$key] . " = " . $value);  
  }
  $sql.= implode(",", $temp) . "WHERE User.User_ID = " .$userID;

  Connect::instance()->runInsertOrDelteQuery($sql);
}

function UpdateWine($decode)  //************************************************************************************************************************************ */
{
  $ID = json_decode($decode->wineyardID);
  $wineBarrelID = $ID->wineBarrelID;
  $bottleID = $ID->bottleID;

  //Checking if the wineBarrel record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $wineBarrelID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("WineBarrel ID does not exist", 400);
  
  //Checking if the wineBottle record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $bottleID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Bottle ID does not exist", 400);

  $updateInfo = json_decode($decode->UpdateInfo);

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);
  
  //checking that the brand name provided exists
  if(isset($updateInfo->brandName))
  {
    $sql = "SELECT * FROM Brand WHERE Brand.Name = ". $updateInfo->brandName;
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Brand name provided does not exist. Please insert into brand first", 400);
  }
  
  $validBottleValues = array("bottleSize" => "bot.Bottle_Size", "price" => "bot.Price", "image_URL" => "bot.Image_URL", "numBotllesMade"=> "bot.Num_Bottles_Made", 
  "numBotllesSold" =>"bot.Num_Bottles_Sold");

  $validBarrelValues = array("name"=> "bar.Name ", "year"=> "bar.Year", "description"=> "bar.Description", "cellaringPotential"=> "bar.Cellaring_Potential","brandName"=> "bar.Brand_Name", "varietalName"=> "bar.Varietal",
  "wineryName"=> "bar.Winery_Name", "productionMethod"=> "bar.Production_Method", "productionDate"=> "bar.Production_Date", "wineyardName"=> "bar.Wineyard_Name");

  $validAwardValues = array("awardName"=> "aw.Award", "awardYear"=> "aw.Year", "awardDetails"=> "aw.Details");

  $validVarietyValues = array("varietalName"=> "var.Varietal_Name", "brandName"=>"var.Brand_Name", "residualSugar"=> "var.Residual_Sugar", "ph"=> "var.pH", 
  "alcoholPercent"=> "var.Alcohol_Percentage", "quality"=> "var.Quality","categoryName"=> "var.Category_Name");

  //Updating Barrel   
  $sql = "UPDATE WineBarrels AS bar SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validBarrelValues))
      array_push($temp,$validBarrelValues[$key] . " = " . $value);  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . "WHERE bar.ID = " .$wineBarrelID;
    Connect::instance()->runInsertOrDelteQuery($sql);
  }
  

  //Updating Award
  $sql = "UPDATE Award AS aw SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validAwardValues))
      array_push($temp,$validAwardValues[$key] . " = " . $value);  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . "WHERE aw.Wine_Barrel_ID = " .$wineBarrelID;
    Connect::instance()->runInsertOrDelteQuery($sql);
  }
  

  //Updating Variety 
  $sql = "UPDATE Varietal AS var SET ";
  $temp = [];
  //Getting the varietal name:
  $sql = "SELECT Varietal FROM User WHERE User.User_ID = ". $wineBarrelID;
  $varietalName = Connect::instance()->runInsertOrDelteQuery($sql);

  foreach($updateInfo as $key=>$value)
  {
    if(array_key_exists($key, $validVarietyValues))
      array_push($temp,$validVarietyValues[$key] . " = " . $value);  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . "WHERE var.Varietal_Name = " .$varietalName;
    Connect::instance()->runInsertOrDelteQuery($sql);
  }

  //Updating Bottle 
  $sql = "UPDATE Bottle AS bot SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(!array_key_exists($key, $validBottleValues))
      errorHandling("Incorrect parameters", 400);

    array_push($temp,$validBottleValues[$key] . " = " . $value);  
  }
  if(!empty($temp))
  {
    $sql.= implode(",", $temp) . "WHERE bot.Bottel_ID = " .$bottleID;
    Connect::instance()->runInsertOrDelteQuery($sql);
  }
}

function UpdateWinery($decode)
{
  $wineryID = $decode->wineryID;
  //Checking if the record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $wineryID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Winery ID does not exist", 400);
  
  $validValues = array("name"=>"Winery.Name", "phoneNumber"=>"Winery.Phone_Number", "email"=>"Winery.Email", "streetAddress"=>"Winery.Street_Address",
  "province"=>"Winery.Province", "postalCode"=>"Winery.Postal_Code", "brandName"=>"Winery.Brand_Name", "image_URL"=>"Winery.Winery_URL");

  $updateInfo = json_decode($decode->UpdateInfo);

  //Checking the brand name given exists
  if(isset($updateInfo->brandName))
  {
    $sql = "SELECT * FROM Brand WHERE Brand.Name = ". $updateInfo->brandName;
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Brand name provided does not exist. Please do an insert into the Brand table first", 400);
  } 

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $sql = "UPDATE Winery SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(!array_key_exists($key, $validValues))
      errorHandling("Incorrect parameters", 400);

    array_push($temp,$validValues[$key] . " = " . $value);  
  }
  $sql.= implode(",", $temp) . "WHERE Brand.Brand_ID = " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
}

function UpdateWineyard($decode)
{
  $ID = json_decode($decode->wineyardID);
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

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $updateInfo = json_decode($decode->UpdateInfo);

  //getting the wineryID if it is being updated 
  if(isset($updateInfo->wineryName))
  {
    "SELECT Winery_ID FROM Winery WHERE Winery.Name = ". $updateInfo->wineryName;
    $newWineryID =Connect::instance()->runSelectQuery($sql);
    if(!$newWineryID)
      errorHandling("Winery name provided does not exist", 400);

    $updateInfo["wineryID"] = $newWineryID;
  }

  //Checking the brand name given exists
  if(isset($updateInfo->brandName))
  {
    $sql = "SELECT * FROM Brand WHERE Brand.Name = ". $updateInfo->brandName;
    if(!Connect::instance()->runSelectQuery($sql))
      errorHandling("Brand name provided does not exist", 400);
  } 

  $sql = "UPDATE Wineyard SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(!array_key_exists($key, $validValues))
      errorHandling("Incorrect parameters", 400);

    array_push($temp,$validValues[$key] . " = " . $value);  
  }
  $sql.= implode(",", $temp) . "WHERE Brand.Brand_ID = " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
}

function UpdateBrand($decode)
{
  $brandID = $decode->brandID;
  //Checking if the record exists
  $sql = "SELECT * FROM User WHERE User.User_ID = ". $brandID;
  if(!Connect::instance()->runSelectQuery($sql))
    errorHandling("Brand ID does not exist", 400);
  
  $validValues = array("name"=>"Brand.Name", "phoneNumber"=>"Brand.Phone_Number", "email"=>"Brand.Email", "streetAddress"=>"Brand.Street_Address",
  "province"=>"Brand.Province", "postalCode"=>"Brand.Postal_Code");

  $updateInfo = json_decode($decode->UpdateInfo);

  if(!isset($decode->UpdateInfo) || json_last_error())
    errorHandling("Incorrect parameters", 400);

  $sql = "UPDATE Brand SET ";
  $temp = [];

  foreach($updateInfo as $key=>$value)
  {
    if(!array_key_exists($key, $validValues))
      errorHandling("Incorrect parameters", 400);

    array_push($temp,$validValues[$key] . " = " . $value);  
  }
  $sql.= implode(",", $temp) . "WHERE Brand.Brand_ID = " .$brandID;
  Connect::instance()->runInsertOrDelteQuery($sql);
}

function DeleteUser($decode)
{
  $id = $decode->userID;
  $sql = "DELETE FROM Brand_Rating WHERE Brand_Rating.User_ID = ".$id ;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM WineryRating WHERE WineryRating.User_ID =" .$id ;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM WineRating WHERE WineRating.User_ID =" .$id;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM WineyardRating WHERE WineyardRating.User_ID=" .$id;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM Purchases WHERE Purchases.User_ID =" .$id;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM User WHERE User.User_ID =" .$id;
  Connect::instance()->runInsertOrDelteQuery($sql);  
}

function DeleteWine($decode)
{
  $wineBarrelID = $decode->wineBarrelID;
  $wineBottelID = $decode->bottleID;

  $sql = "DELETE FROM WineRating WHERE WineRating.Bottle_ID= " .$wineBottelID;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM Bottle WHERE Bottle.Bottle_ID= " .$wineBottelID;
  Connect::instance()->runInsertOrDelteQuery($sql);

  $sql = "SELECT * FROM Bottle WHERE Bottle.Wine_Barrel_ID = " .$wineBarrelID;
 
  //Should still cascade through wineBarrel???
}

function DeleteWinery($decode)
{
  $wineryID= $decode->wineryID;

  $sql = "DELETE FROM WineryRating WHERE WineryRating.Winery_ID= " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM WineyardRating WHERE WineyardRating.Winery_ID= " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM Wineyards WHERE Wineyards.Winery_ID= " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM Winery WHERE Winery.Winery_ID= " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
}

function DeleteWineyard($decode)
{
  $wineryID= $decode->wineryID;
  $sql = "DELETE FROM WineyardRating WHERE WineyardRating.Winery_ID= " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM Wineyards WHERE Wineyards.Winery_ID= " .$wineryID;
  Connect::instance()->runInsertOrDelteQuery($sql);
}

function DeleteBrand($decode)
{
  $brandID= $decode->brandID;
  $sql = "DELETE FROM Brand_Rating WHERE Brand_Rating.Brand_ID= " .$brandID;
  Connect::instance()->runInsertOrDelteQuery($sql);
  $sql = "DELETE FROM Brand WHERE Brand.Brand_ID= " .$brandID;
  Connect::instance()->runInsertOrDelteQuery($sql);
}

function AppendUser($decode)
{

}

function AppendWine($decode)
{

}
function AppendWinery($decode)
{

}

function AppendWineyard($decode)
{

}

function AppendBrand($decode)
{

}

function AppendBrandRating($decode)
{

}

function AppendWineRating($decode)
{

}

function AppendWineryRating($decode)
{

}

function AppendWineyardRating($decode)
{

}
?>
