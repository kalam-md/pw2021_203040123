<?php

/*
---------------------------
Kalam Mahardhika
---------------------------
203040123
---------------------------
Teknik Informatika (D)
---------------------------
Senin, 8 Februari 2021
---------------------------
Pemrograman Web
---------------------------
Pertemuan 6 - Array Associative
---------------------------
*/

?>

<?php 

/* 
---------------------------
Array Associative
Keynya adalah string yang dibuat sendiri
---------------------------
contoh sederhana
$mahasiswa = [
    "nama" => "Kalam", 
    "nrp" => "203040123",
    "email" => "kalam",
    "jurusan" => "Teknik Informatika"
];

echo $mahasiswa["jurusan"];
---------------------------
contoh multidimensi
$mahasiswa = [
    [
        "nama" => "Kalam", 
        "nrp" => "203040123", 
        "jurusan" => "Teknik Informatika", 
        "email" => "kalam@gmail.com"
    ],
    [
        "nama" => "Zulfikar", 
        "nrp" => "203010453", 
        "jurusan" => "Teknik Industri", 
        "email" => "zull@gmail.com"
    ],
    [
        "nama" => "Ferdin", 
        "nrp" => "203030111", 
        "jurusan" => "Teknik Mesin", 
        "email" => "din@gmail.com"
    ]
];
            indexnya    indexnya string
                \       |
echo $mahasiswa[1]["nama"];
---------------------------
*/

$mahasiswa = [
    [
        "nama" => "Kalam", 
        "nrp" => "203040123", 
        "jurusan" => "Teknik Informatika", 
        "email" => "kalam@gmail.com",
        "gambar" => "monster.jpg"
    ],
    [
        "nama" => "Zulfikar", 
        "nrp" => "203010453", 
        "jurusan" => "Teknik Industri", 
        "email" => "zull@gmail.com",
        "gambar" => "tenet.jpg"
    ],
    [
        "nama" => "Ferdin", 
        "nrp" => "203030111", 
        "jurusan" => "Teknik Mesin", 
        "email" => "din@gmail.com",
        "gambar" => "avenger.jpg"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<?php foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>
            <img src="gambar/<?= $mhs["gambar"]; ?>">
        </li>
        <li>Nama : <?= $mhs["nama"] ?></li>
        <li>NRP : <?= $mhs["nrp"] ?></li>
        <li>Jurusan : <?= $mhs["jurusan"] ?></li>
        <li>Email : <?= $mhs["email"] ?></li>
    </ul>
<?php endforeach ?>
    
</body>
</html>