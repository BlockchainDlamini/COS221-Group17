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
if ($decode->type == "GetWines") 
  echo getWines($decode);
else if ($decode->type == "GetWinery") 
  echo getWinery($decode);
else if ($decode->type == "GetBrand") 
  echo getBrands($decode);
else if ($decode->type == "GetUser") 
  echo getUser($decode);
else //the user did not give the correct type
  errorHandling("Incorrect request type", 400);

function getWines($decode)
{
  //Create SQL query 
  global $db;
  $validReturn = array("bottleSize" => "bot.Bottle_Size", "price" => "bot.Price", 
    "image_URL" => "bot.Image_URL", "availability" => "", "name"=> "bar.Name", "year"=> "bar.Year", 
    "age" => "YEAR(CURDATE()) - bar.Year AS age","description"=> "bar.Description",
    "cellaringPotential"=> "bar.Cellaring_Potential", "awardName"=> "aw.Award", 
    "awardYear"=> "aw.Year", "awardDetails"=> "aw.Details", "categoryName"=> "var.Category_Name", "varietalName"=> "var.Varietal_Name",
    "residualSugar"=> "var.Residual_Sugar", "ph"=> "var.pH", "alcoholPercent"=> "var.Alcohol_Percentage", 
    "quality"=> "var.Quality", "brandName"=> "bar.Brand_Name","wineryName"=> "bar.Winery_Name", 
    "wineyardName"=> "bar.Wineyard_Name","rating"=> "AVG(rate.Rating) AS rating",
    "productionMethod"=> "bar.Production_Method", "productionDate"=> "bar.Production_Date");
  $awardFlag = false;
  $sql = "";
  
  if(!isset($decode->return)) //Checking that required field is set
    errorHandling("The parameters are incorrect", 400);
  
  //SELECT and FROM statements
  if($decode->return == "*") //Returing everything 
  {
    //Seperate call "awardName", "awardYear", "awardDetails". Setting flag for call later on
    $awardFlag = true;

    $sql .= "SELECT *, YEAR(CURDATE()) - bar.Year AS age, AVG(rate.Rating) AS rating
    FROM Bottle AS bot
    JOIN WineBarrels AS bar
    ON bot.Wine_Barrel_ID = bar.ID
    LEFT JOIN Varietal AS var
    ON bar.Varietal = var.Varietal_Name AND bar.Brand_Name=var.Brand_Name
    LEFT JOIN WineRating AS rate 
    ON bar.ID = rate.WineBarrel_ID
    GROUP BY rate.WineBarrel_ID"; 
  }
  else //Returing selected stuff
  {
    $sql .= "SELECT bot.Wine_Barrel_ID, ";
    $temp =[];
    
    foreach($decode->return as $item)
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
    ON bar.ID = rate.WineBarrel_ID
    GROUP BY rate.WineBarrel_ID";
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

      if(!isset($decode->Fuzzy) || $decode->Fuzzy == "false") //Default and case: fuzzy = false
        array_push($temp, $validReturn[$key]. "='" . $value . "'");
      else if(isset($decode->Fuzzy) && $decode->Fuzzy == "true")
        array_push($temp, $validReturn[$key]. " LIKE '%" . $value . "%'");
    }

    $sql .= implode(" AND ", $temp);    
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
      $sql .= $decode->Order;
    }
      
  }

  //Adding the Limit
  if(isset($decode->Limit))
    $sql.= " LIMIT " . $decode->Limit;  

    
  //Run the query via config.php
  $queryResults = $db->runSelectQuery($sql);

  if($queryResults) //There is atleast 1 row returned 
  {
    if($awardFlag) //Need to fetch the awward for each row
    {
      foreach($queryResults as $row)
      { 
        $sql = "SELECT ";
        $temp = [];
        if(in_array( "awardName",$decode->result))
          array_push($temp, $validReturn["awardName"]);
        if(in_array("awardYear", $decode->result))
          array_push($temp, $validReturn["awardName"]);
        if(in_array("awardDetails", $decode->result))
          array_push($temp, $validReturn["awardName"]);

        $sql .= implode( ",",$temp) . " FROM Award AS aw WHERE aw.Wine_Barrel_ID = " . $row["Wine_Barrel_ID"];
        
        $awardResult = $db->runSelectQuery($sql);
        $row["award"] = $awardResult; 
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

}


function getBrands($decode)
{
  global $db;

  $fuzzy = isset($decode->fuzzy) ? $decode->fuzzy : true;
  $search = isset($decode->search) ? $decode->search : [];
  $returnFields = isset($decode->return) ? $decode->return : [];
  $sortField = isset($decode->sort) ? $decode->sort : 'name';
  $sortOrder = isset($decode->order) ? strtoupper($decode->order) : 'ASC';
  $limit = isset($decode->limit) ? intval($decode->limit) : null;
  
  // Prepare the SQL query
  $sql = "SELECT ";

  if (empty($returnFields) || $returnFields === '*') {
    $sql .= "*";
  } else {
    $sql .= implode(", ", $returnFields);
  }

  $sql .= " FROM Brand";

  // Add search conditions to the SQL query if search fields are provided
  if (!empty($search)) {
    $conditions = [];
    foreach ($search as $column => $value) {
      if ($fuzzy) {
        $conditions[] = "$column LIKE :$column";
      } else {
        $conditions[] = "$column = :$column";
      }
    }
    $sql .= " WHERE " . implode(" AND ", $conditions);
  }

  // Add sorting to the SQL query
  $sql .= " ORDER BY $sortField $sortOrder";

  // Add limit to the SQL query if specified
  if ($limit !== null) {
    $sql .= " LIMIT $limit";
  }

  // Execute the query using the runSelectQuery() function
  $result = $db->runSelectQuery($sql);

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

    header('Content-Type: application/json');
    echo json_encode($response);
  }
  exit();
}

function getUser($decode)
{
  global $db;

  $fuzzy = isset($decode->fuzzy) ? $decode->fuzzy : true;
  $search = isset($decode->search) ? $decode->search : [];
  $returnFields = isset($decode->return) ? $decode->return : [];
  
  // Prepare the SQL query
  $sql = "SELECT ";

  if (empty($returnFields) || $returnFields === '*') {
    $sql .= "*";
  } else {
    $sql .= implode(", ", $returnFields);
  }

  $sql .= " FROM User";

  // Add search conditions to the SQL query if search fields are provided
  if (!empty($search)) {
    $conditions = [];
    foreach ($search as $column => $value) {
      if ($fuzzy) {
        $conditions[] = "$column LIKE '%$value%'";
      } else {
        $conditions[] = "$column = '$value'";
      }
    }
    $sql .= " WHERE " . implode(" AND ", $conditions);
  }

  // Execute the query using the runSelectQuery() function
  $result = $db->runSelectQuery($sql);

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

    header('Content-Type: application/json');
    echo json_encode($response);
  }
  exit();
}
?>


