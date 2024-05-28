<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "image_pin"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$data = json_decode(file_get_contents("php://input"));
$imageUrl = $data->imageUrl;

$stmt = $conn->prepare("INSERT INTO image_pin (url) VALUES (?)");
$stmt->bind_param("s", $imageUrl);

if ($stmt->execute() === TRUE) {
    echo "Image pinned successfully!";
} else {
    echo "Error pinning image: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
