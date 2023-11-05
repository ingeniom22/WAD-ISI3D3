<?php

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "wad-mg07";

$conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Berhasil terhubung ke database " . $DATABASE . " !";
// }

function excecute_query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function insert_data($data, $table)
{
    global $conn;

    $kode_barang = $data['kode_barang'];
    $nama_barang = $data['nama_barang'];
    $harga_barang = $data['harga_barang'];
    $stok_barang = $data['stok_barang'];
    $gambar_barang = $data['gambar_barang'];

    $query = "INSERT INTO $table (kode_barang, nama_barang, harga_barang, stok_barang, gambar_barang) 
              VALUES ('$kode_barang', '$nama_barang', '$harga_barang', '$stok_barang', '$gambar_barang')";

    return mysqli_query($conn, $query);
}

function update_data($id, $data, $table)
{
    global $conn;

    $nama_barang = $data['nama_barang'];
    $harga_barang = $data['harga_barang'];
    $stok_barang = $data['stok_barang'];
    $gambar_barang = $data['gambar_barang'];

    $query = "UPDATE $table SET 
            nama_barang = '$nama_barang', 
            harga_barang = '$harga_barang', 
            stok_barang = '$stok_barang', 
            gambar_barang = '$gambar_barang' 
            WHERE kode_barang = '$id'";

    return mysqli_query($conn, $query);
}


function delete_data($id, $table)
{
    global $conn;

    $query = "DELETE FROM $table WHERE kode_barang = '$id'";

    return mysqli_query($conn, $query);
}
