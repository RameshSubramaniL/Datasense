<?php

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $shopName = $_POST["shop_name"];
    $address = $_POST["address"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $phone = $_POST["phone_number"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $openingHours = $_POST["opening_hours"];
    $imageUrl = $_POST["image_url"];
    $paymentMethods = $_POST["payment_methods"];
    $ownerName = $_POST["owner_name"];
    $dateEstablished = $_POST["date_established"];

    $sql = "INSERT INTO shop_details (shop_name, address, latitude, longitude, phone_number, email, description, opening_hours, image_url, payment_methods, owner_name, date_established) VALUES ('".$shopName."','".$address."','".$latitude."','".$longitude."','".$phone."','".$email."','".$description."','".$openingHours."','".$imageUrl."','".$paymentMethods."','".$ownerName."','".$dateEstablished."')";
    $result = $conn->query($sql);
    if($result)
    {
       echo "Shop details inserted successfully."; 
    }
    else
    {
        echo "Error";
    }
}
$conn->close();
?>
