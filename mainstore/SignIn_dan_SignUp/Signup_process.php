<?php
require_once "koneksi.php";
$conn = getConnection();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];

    // Simpan informasi pengguna baru (sesuaikan dengan cara penyimpanan yang sesuai)
    // Misalnya, Anda dapat menyimpannya di database atau file teks
    // Dalam contoh ini, kita hanya mencetak informasi pengguna baru ke konsol.
    echo "New User Registered: $new_username";

    // Set session untuk user yang baru mendaftar
    $_SESSION["username"] = $new_username;

    // Tambahkan logika redirect atau tindakan selanjutnya di sini
}
?>
