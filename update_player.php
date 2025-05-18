<?php
$servername = "sql201.infinityfree.com";
$username = "if0_38558767";
$password = "775NVcEFPd0Dmp";
$dbname = "if0_38558767_game_db";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari request
$name = $_POST['name'];
$gem = $_POST['gem'];
$player_heart = $_POST['player_heart'];
$game_time = $_POST['game_time'];

// Simpan data ke database (insert/update)
$sql = "INSERT INTO players (name, gem, player_heart, game_time)
        VALUES ('$name', '$gem', '$player_heart', '$game_time')
        ON DUPLICATE KEY UPDATE
            gem = '$gem',
            player_heart = '$player_heart',
            game_time = '$game_time'";

if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
