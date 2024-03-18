<?php
$conn = mysqli_connect("localhost", "root", "", "ppoly");
mysqli_set_charset($conn,"utf8");


$result = mysqli_query($conn, "SELECT summary, image, answer1,answer2, answer3, answer4, correct, createDate FROM quiz ORDER BY RAND() "); 

// Connect to MySQL database



mysqli_set_charset($conn, 'utf8');

// Create empty array for JSON data
$json_data = array();

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
    $json_data[] = $row;
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);

echo $json_output;

// Close MySQL connection
mysqli_close($conn);

?>

