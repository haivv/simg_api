<?php

//error_reporting(E_ALL & ~E_WARNING);
//ini_set('display_errors', 0);

$conn = mysqli_connect( 'localhost', 'root', '', 'ppoly' );
mysqli_set_charset( $conn, 'utf8' );
/*
$memID = "177";
$title = "test";
$device = "4";
$timeofTest = "00:14";
$result = "pass";
*/
$recordDate = date('Y-m-d');


$memID = $_POST['memID'];
$title = $_POST['title'];
$device = $_POST['device'];
$timeofTest = $_POST['timeofTest'];
$result = $_POST['result'];

$difficulty = $_POST['difficulty'];
$numOfExp = $_POST['numOfExp'];
$detail = $_POST['detail'];
 
$sql="INSERT INTO `record` (`memID`, `title`, `device`, `timeofTest`, `result`, `difficulty`, `recordDate`, `numOfExp`, `detail`) VALUES ('$memID', '$title', '$device', '$timeofTest', '$result', '$difficulty', '$recordDate', '$numOfExp', '$detail')";

echo $sql;
if (mysqli_query($conn, $sql)) {
	$dataToSave = [
        'message' => 'recorded'
    ];
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$jsonString = json_encode( $dataToSave, JSON_PRETTY_PRINT );
    // You can use JSON_PRETTY_PRINT for pretty formatting
    $jsonFilePath = 'data.json';
    // Save the JSON string to the file
    if ( file_put_contents( $jsonFilePath, $jsonString ) ) {
        echo 'recorded';
    } 

$conn->close();


?>

