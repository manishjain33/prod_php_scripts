<?php
$username = "dps";
$password = "dps123";
$hostname = "localhost";  
$dbhandle = mysqli_connect($hostname, $username, $password);

// Check if connection was successful
if(!$dbhandle){
  die('Unable to connect to database: ' . mysqli_connect_error());
}

// Select the database
$selected = mysqli_select_db($dbhandle, 'vendor');
if(!$selected){
  die('Unable to select database: ' . mysqli_error($dbhandle));
}

// Check if "em" parameter is set in the URL, else default to "all"
$emirate = isset($_GET["em"]) ? $_GET["em"] : "all";

// Prepare the query based on the "em" value
switch ($emirate) {
  case "du":
    $vendors = "SELECT * FROM vendor_list WHERE emirates = 'Dubai'";
    break;
  case "sh":
    $vendors = "SELECT * FROM vendor_list WHERE emirates = 'Sharjah'";
    break;
  case "fu":
    $vendors = "SELECT * FROM vendor_list WHERE emirates = 'Fajairah'";
    break;
  case "all":
  default:
    $vendors = "SELECT * FROM vendor_list";
    break;
}

// Execute the query and check for errors
$vendors_result = mysqli_query($dbhandle, $vendors);
if (!$vendors_result) {
  die('Error in query: ' . mysqli_error($dbhandle));
}

// Initialize an array to store vendor data
$vendorsData = [];

// Fetch the results into an array
while ($vendorsRow = mysqli_fetch_assoc($vendors_result)) {
  $vendorsData[] = $vendorsRow;
}

// Check if the array has data
if (empty($vendorsData)) {
  die('No data found');
}

// Print the array for debugging (optional)
print_r($vendorsData); // You can comment this out later

// Set the header to output JSON
header('Content-Type: application/json');

// Encode the array to JSON
$jsonData = json_encode($vendorsData, JSON_UNESCAPED_UNICODE);

// Check if `json_encode` failed
if ($jsonData === false) {
  die('Error encoding JSON: ' . json_last_error_msg());
}

// Output the JSON data
echo $jsonData;

// Close the database connection
mysqli_close($dbhandle);
?>
