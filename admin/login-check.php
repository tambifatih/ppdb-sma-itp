<?php
session_start();
include '../koneksi.php';
$cek = 0;
if (isset($_POST['login'])) {
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '".$_POST['username']."'") or die(mysqli_error($koneksi));
    while ($loop = mysqli_fetch_array($query)) {
        if ($loop['username'] == $_POST['username'] && $loop['password'] == $_POST['password']) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['nama'] = $loop['nama'];
            $cek = 1;
        }
    }
}
if ($cek == 1) {
    header("location:list-pendaftar.php");
}
else {
    //die (mysqli_error($koneksi));
    header('location:?error');
}

?>