<?php
require 'db.php'; 
$sql = "SELECT * FROM reels";
$result = $mysqli->query($sql);

$reels = [];

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $reels[] = [
            'id' => $row['id'],
            'user_id' => $row['user_id'],
            'reel_url' => $row['reel_url'],
            'description' => $row['description']
        ];
    }
}

header('Content-Type: application/json');

echo json_encode([
    'status' => 'success',
    'reels' => $reels
]);
?>
