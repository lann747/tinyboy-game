<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$servername = "sql201.infinityfree.com";
$username = "if0_38558767";
$password = "775NVcEFPd0Dmp";
$dbname = "if0_38558767_game_db";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data leaderboard berdasarkan jumlah Gem tertinggi
$sql = "SELECT name, gem, player_heart, game_time FROM players ORDER BY gem DESC";
$result = $conn->query($sql);

$leaderboard = [];
while ($row = $result->fetch_assoc()) {
    $leaderboard[] = $row;
}

// Kembalikan data dalam format JSON
echo json_encode($leaderboard);

$conn->close();
?>