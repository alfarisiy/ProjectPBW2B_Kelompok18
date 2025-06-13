<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tipe_kamar WHERE id='$id'");
header("Location: tampilan.php");
?>