<?php
include "koneksi.php";

// Ambil data dari form
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = $_POST['guests'];
$room_id = $_POST['room_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Hitung total harga (contoh sederhana)
$query = "SELECT t.harga FROM kamar k 
          JOIN tipe_kamar t ON k.tipe_kamar_id = t.id 
          WHERE k.id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $room_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$room_data = mysqli_fetch_assoc($result);

$date1 = new DateTime($checkin);
$date2 = new DateTime($checkout);
$interval = $date1->diff($date2);
$nights = $interval->days;

$total_price = $room_data['harga'] * $nights;

// Simpan data booking ke database
$insert_query = "INSERT INTO reservasi (kamar_id, nama_pemesan, email, telepon, check_in, check_out, jumlah_tamu, total_harga, status, dibuat_pada)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', NOW())";
$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param($stmt, "isssssid", $room_id, $name, $email, $phone, $checkin, $checkout, $guests, $total_price);
mysqli_stmt_execute($stmt);

// Redirect ke halaman pembayaran
header("Location: pembayaran.php?booking_id=" . mysqli_insert_id($conn));
exit();
?>