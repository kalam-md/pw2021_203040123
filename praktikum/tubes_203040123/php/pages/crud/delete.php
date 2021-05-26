<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../auth/login.php");
  exit;
}

require '../../connections/functions.php';

if (!isset($_GET['id'])) {
  header("Location: ../dashboard.php");
  exit;
}

$id = $_GET['id'];

if (delete($id) > 0) {
  echo "<script>
        alert('Data berhasil dihapus');
          document.location.href = '../dashboard.php';
       </script>";
} else {
  echo "data gagal dihapus!";
}
