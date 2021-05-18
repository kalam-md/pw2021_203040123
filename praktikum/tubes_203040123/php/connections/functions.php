<?php

function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'tubes_203040123');
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query);

    // jika hasilnya hanya 1 data
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function login($data)
{
    $conn = koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    // cek dulu username 
    if ($user = query("SELECT * FROM users WHERE username = '$username'")) {
        // cek password
        if (password_verify($password, $user['password'])) {
            // set session
            $_SESSION['login'] = true;

            header("Location: ../dashboard.php");
            exit;
        }
    }

    return [
        'error' => true,
        'pesan' => 'Username / Password Salah!'
    ];
}

function registration($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password_confirmation = mysqli_real_escape_string($conn, $data['password_confirmation']);

    // jika username / password kosong
    if (empty($username) || empty($password) || empty($password_confirmation)) {
        echo "<script>
            alert('Username / password tidak boleh kosong!');
            document.location.href = 'registration.php';
          </script>";

        return false;
    }

    // jika username sudah ada 
    if (query("SELECT * FROM users WHERE username = '$username'")) {
        echo "<script>
            alert('Username sudah terdaftar!');
            document.location.href = 'registration.php';
          </script>";

        return false;
    }

    // jika konfirmasi password tidak sesuai
    if ($password !== $password_confirmation) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
            document.location.href = 'registration.php';
          </script>";

        return false;
    }

    // jika password < 5 digit
    if (strlen($password) < 5) {
        echo "<script>
            alert('Password terlalu pendek!');
            document.location.href = 'registration.php';
          </script>";

        return false;
    }

    // jika username & password sudah sesuai
    // enkripsi password
    $password_baru = password_hash($password, PASSWORD_DEFAULT);
    // insert ke tabel users
    $query = "INSERT INTO users
              VALUES
            (null, '$username', '$password_baru', null, null, null)
          ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function upload()
{
    $nama_file = $_FILES["pictures"]["name"];
    $tipe_file = $_FILES["pictures"]["type"];
    $ukuran_file = $_FILES["pictures"]["size"];
    $error = $_FILES["pictures"]["error"];
    $tmp_file = $_FILES["pictures"]["tmp_name"];

    // cek apakah tidak ada gambar yg diupload
    if ($error == 4) {
        // echo "
        //     <script>
        //         alert('pilih gambar terlebih dahulu');
        //     </script>
        //     ";
        return 'no-photo.png';
    }

    // cek apakah yang diupload hanya gambar
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "
            <script>
                alert('Yang anda pilih bukan gambar');
            </script>
        ";
        return false;
    }

    // cek tipe file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png' && $tipe_file != 'image/jpg') {
        echo "
            <script>
                alert('Yang anda pilih bukan gambar dengan ekstensi yang sesuai');
            </script>
        ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuran_file > 5000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }

    // lolos pengecekan
    // siap upload
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;

    move_uploaded_file($tmp_file, '../../../assets/img/' . $nama_file_baru);

    return $nama_file_baru;
}

function create($data)
{
    $conn = koneksi();

    $names = htmlspecialchars($data['names']);
    $brands = htmlspecialchars($data['brands']);
    $descriptions = htmlspecialchars($data['descriptions']);
    $categories = htmlspecialchars($data['categories']);
    $prices = htmlspecialchars($data['prices']);

    $pictures = upload();

    if (!$pictures) {
        return false;
    }

    $query = "INSERT INTO
              products
            VALUES
            (null, '$pictures', '$names', '$brands', '$descriptions', '$categories', '$prices');
          ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    $conn = koneksi();

    $id = $data['id'];
    $names = htmlspecialchars($data['names']);
    $brands = htmlspecialchars($data['brands']);
    $descriptions = htmlspecialchars($data['descriptions']);
    $categories = htmlspecialchars($data['categories']);
    $prices = htmlspecialchars($data['prices']);
    $gambar_lama = htmlspecialchars($data['gambar_lama']);

    $pictures = upload();

    if (!$pictures) {
        return false;
    }

    if ($pictures == 'no-photo.png') {
        $pictures = $gambar_lama;
    }

    $query = "UPDATE
              products
            SET
            pictures = '$pictures', 
            names = '$names', 
            brands = '$brands', 
            descriptions = '$descriptions', 
            categories = '$categories', 
            prices = '$prices'
            WHERE id = $id
          ";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    $conn = koneksi();

    // menghapus gambar di folder
    $products = query("SELECT * FROM products WHERE id = $id");
    if ($products['pictures'] != 'no-photo.png') {
        unlink('../../assets/img/' . $products['pictures']);
    }

    mysqli_query($conn, "DELETE FROM products WHERE id = $id") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function search($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM products
              WHERE 
            names LIKE '%$keyword%' OR
            brands LIKE '%$keyword%' OR
            descriptions LIKE '%$keyword%'
          ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
