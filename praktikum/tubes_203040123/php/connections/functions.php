<?php

// Fungsi untuk melakukan koneksi ke database
function koneksi()
{
    // Melakukan koneksi ke database
    $conn = mysqli_connect("localhost", "root", "");

    // Memilih database
    mysqli_select_db($conn, "pw_tubes_203040123");

    return $conn;
}

// Fungsi untuk melakukan query dan memasukan array kedalamnya
function query($sql)
{
    $conn = koneksi();

    // Query dari database
    $result = mysqli_query($conn, $sql);
    $row = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}