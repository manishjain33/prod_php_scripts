<?php
$username = "dps";
$password = "dps123";
$hostname = "localhost";  
$dbhandle = mysqli_connect($hostname, $username, $password);

// Check if connection was successful
if (!$dbhandle) {
  die('Unable to connect to database: ' . mysqli_connect_error());
}

// Set the character set to UTF-8
mysqli_set_charset($dbhandle, "utf8");

// Select the database
$selected = mysqli_select_db($dbhandle, 'vendor');
if (!$selected) {
  die('Unable to select database: ' . mysqli_error($dbhandle));
}

// Prepare the query based on the "em" value
$vendors = "SELECT * FROM vendor_list_premium";

// Execute the query and check for errors
$vendors_result = mysqli_query($dbhandle, $vendors);
if (!$vendors_result) {
  die('Error in query: ' . mysqli_error($dbhandle));
}

// Initialize an array to store vendor data
$vendorsData = [];

// Fetch the results into an array and convert to UTF-8
while ($vendorsRow = mysqli_fetch_assoc($vendors_result)) {
  // Convert each value to UTF-8 (if necessary)
  $vendorsRow = array_map('utf8_encode', $vendorsRow);
  $vendorsData[] = $vendorsRow;
}

// Check if the array has data
if (empty($vendorsData)) {
  die('No data found');
}

// Set the header to output JSON
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type");

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
