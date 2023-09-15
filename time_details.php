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


function formatTravelTime($seconds) {
    $minutes = floor($seconds / 60);
    return $minutes . ' mins';
}

function calculateDistance($lat1, $lon1, $lat2, $lon2) 
{
    $lat1 = deg2rad($lat1);
    $lon1 = deg2rad($lon1);
    $lat2 = deg2rad($lat2);
    $lon2 = deg2rad($lon2);

    $radius = 6371;

    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $radius * $c;

    return $distance;
}

$sql = "SELECT * FROM shop_details";
$result = $conn->query($sql);

$overallTimeInSeconds = 0;
$allTravelTimes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lat1 = '11.0728009';
        $lon1 = '76.9988101';
        $lat2 = $row['latitude'];
        $lon2 = $row['longitude'];

        $travelTimeInSeconds = calculateTravelTime($lat1, $lon1, $lat2, $lon2);
         $travelTimeInMinutes = round($travelTimeInSeconds / 60);
        if ($travelTimeInMinutes >= 60) 
        {
            $hours = floor($travelTimeInMinutes / 60);
            $minutes = $travelTimeInMinutes % 60;
            $formattedTravelTime = $hours . ' hours ' . $minutes . ' mins';
        }
        else 
        {
            $formattedTravelTime = $travelTimeInMinutes . ' mins';
        }

        $currentTravelTime = array(
            'shop_name' => $row['shop_name'],
            'address' => $row['address'],
            'phone_number' => $row['phone_number'],
            'email' => $row['email'],
            'owner_name' => $row['owner_name'],
            'payment_methods' => $row['payment_methods'],
            'Travel-time' =>  $formattedTravelTime, 
            'Distance' => number_format(calculateDistance($lat1, $lon1, $lat2, $lon2), 2) . " kms",
        );

        $allTravelTimes[] = $currentTravelTime;

        $overallTimeInSeconds += $travelTimeInSeconds;
    }

}

$conn->close();

$response = [
    "overall_time" => gmdate("H:i:s", $overallTimeInSeconds), 
    "travel_times" => $allTravelTimes,
];

header("Content-Type: application/json");

echo json_encode($response);

function calculateTravelTime($startLat, $startLng, $endLat, $endLng) 
{
     $averageSpeedKmph = 50;

    $distance = calculateDistance($startLat, $startLng, $endLat, $endLng);

    $travelTimeInHours = $distance / $averageSpeedKmph;

    $travelTimeInSeconds = $travelTimeInHours * 3600;

    return $travelTimeInSeconds;

}

?>

?>