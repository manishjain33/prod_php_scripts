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

// Prepare the INSERT statement using placeholders (?)
$vendors = "INSERT INTO vendor_list_premium (count, vendor, tradeNo, phone, phone2, email, email2, mobile, mobile2, emirates) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Initialize the prepared statement
$stmt = mysqli_prepare($dbhandle, $vendors);

if (!$stmt) {
  die('Prepared statement failed: ' . mysqli_error($dbhandle));
}

// Bind parameters (use 's' for strings)
mysqli_stmt_bind_param($stmt, 'sssssssss', 
    $_POST['vendor'], 
    $_POST['tradeNo'], 
    $_POST['phone'], 
    $_POST['phone2'], 
    $_POST['email'], 
    $_POST['email2'], 
    $_POST['mobile'], 
    $_POST['mobile2'], 
    $_POST['emirates']
);

// Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo "Record inserted successfully.";
} else {
    die('Error executing query: ' . mysqli_stmt_error($stmt));
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($dbhandle);
?>
