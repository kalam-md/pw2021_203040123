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
Pertemuan 5 - Array
---------------------------
*/

?>

<?php 

/* 
---------------------------
Array numeric
array yang indexnya angka
---------------------------
Array Assosiatif
array yang indexnya string
---------------------------
*/

$mahasiswa = [
    ["Kalam", "203040123", "Teknik Informatika", "kalam@gmail.com"],
    ["Zulfikar", "203010453", "Teknik Industri", "zull@gmail.com"],
    ["Ferdin", "203030111", "Teknik Mesin", "din@gmail.com"]
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
        <li>Nama : <?= $mhs[0] ?></li>
        <li>NRP : <?= $mhs[1] ?></li>
        <li>Jurusan : <?= $mhs[2] ?></li>
        <li>Email : <?= $mhs[3] ?></li>
    </ul>
<?php endforeach ?>
    
</body>
</html>