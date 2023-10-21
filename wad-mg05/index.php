<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "wad-mg05";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Berhasil terhubung ke database " . $database . " !";
}


$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);

echo "<ul>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>ID Siswa: " . $row["id_siswa"] . " - Nama Siswa: " . $row["nama_siswa"] . "</li>";
    }
} else {
    echo "<li>Tidak ada data pada tabel 'pelajaran'.</li>";
}

echo "</ul>";

$conn->close();
