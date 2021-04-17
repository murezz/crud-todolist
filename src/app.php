<?php

$conn = mysqli_connect("localhost", "root", "", "crud");


function register($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $foto = $_FILES['foto']['name'];
    $file = $_FILES['foto']['tmp_name'];
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$foto', '$email', '$password')");

    move_uploaded_file($file, "../../assets/foto/" . $foto);

    return mysqli_affected_rows($conn);
}

function tambah($data)
{

    global $conn;

    $nama = htmlspecialchars($data['nama_barang']);
    $foto = $_FILES['foto_barang']['name'];
    $file = $_FILES['foto_barang']['tmp_name'];
    $harga = htmlspecialchars($data['harga']);
    $id_user = htmlspecialchars($data['id_user']);

    mysqli_query($conn, "INSERT INTO barang VALUES('', '$nama', '$foto', '$harga', '$id_user')");

    move_uploaded_file($file, "../assets/foto/" . $foto);

    return mysqli_affected_rows($conn);
}

function edit($data)
{

    global $conn;

    $id_barang = htmlspecialchars($data['id_barang']);
    $nama = htmlspecialchars($data['nama_barang']);
    $foto = $_FILES['foto_barang']['name'];
    $file = $_FILES['foto_barang']['tmp_name'];
    $harga = htmlspecialchars($data['harga']);
    $id_user = htmlspecialchars($data['id_user']);

    mysqli_query($conn, "UPDATE barang SET
                        nama_barang = '$nama',
                        foto_barang = '$foto',
                        harga = '$harga',
                        id_user = '$id_user'
                        WHERE id_barang = '$id_barang'
                            ");

    move_uploaded_file($file, "../assets/foto" . $foto);

    return mysqli_affected_rows($conn);
}
