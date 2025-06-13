<?php 
session_start();
if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'index.php') === false) {
    header("Location: pemesanan2.php");
    exit();
}
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['simpan'])) {
    $cek_in = $_POST['cek_in'];
    $cek_out = $_POST['cek_out'];
    $jumlah_tamu = $_POST['jumlah_tamu'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    
    $query = "INSERT INTO pemesan (cek_in, cek_out, jumlah_tamu, nama_lengkap, email, telepon) 
              VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssss', $cek_in, $cek_out, $jumlah_tamu, $nama_lengkap, $email, $telepon);
        
        if(mysqli_stmt_execute($stmt)) {
            header("Location: pemesanan2.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in prepared statement: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form - Luxury Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Montserrat', 'sans-serif'],
              serif: ['"Playfair Display"', 'serif'],
            },
          }
        }
      }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-white text-gray-800">
    <section class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-4xl mx-auto">
            <div class="bg-white p-8 md:p-12 rounded-none shadow-sm border border-gray-200">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4 tracking-tight">PEMESANAN KAMAR</h2>
                    <div class="w-20 h-px bg-black mx-auto mb-4"></div>
                    <p class="text-gray-600 font-light">Silakan lengkapi formulir pemesanan kamar</p>
                </div>
                
                <form action="" method="POST" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex flex-col">
                            <label for="cek_in" class="text-left mb-2 text-sm font-medium text-gray-700 uppercase tracking-wider">Check In</label>
                            <input type="date" id="cek_in" name="cek_in" required 
                                   class="px-4 py-3 border border-gray-300 bg-white rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300">
                        </div>

                        <div class="flex flex-col">
                            <label for="cek_out" class="text-left mb-2 text-sm font-medium text-gray-700 uppercase tracking-wider">Check Out</label>
                            <input type="date" id="cek_out" name="cek_out" required 
                                   class="px-4 py-3 border border-gray-300 bg-white rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300">
                        </div>

                        <div class="flex flex-col">
                            <label for="jumlah_tamu" class="text-left mb-2 text-sm font-medium text-gray-700 uppercase tracking-wider">Jumlah Tamu</label>
                            <select id="jumlah_tamu" name="jumlah_tamu" required 
                                    class="px-4 py-3 border border-gray-300 bg-white rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300 appearance-none">
                                <option value="" disabled selected>Pilih</option>
                                <option value="1">1 Orang</option>
                                <option value="2">2 Orang</option>
                                <option value="3">3 Orang</option>
                                <option value="4">4 Orang</option>
                                <option value="5">5+ Orang</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="nama_lengkap" class="text-left mb-2 text-sm font-medium text-gray-700 uppercase tracking-wider">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" required 
                                   class="px-4 py-3 border border-gray-300 bg-white rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300">
                        </div>

                        <div class="flex flex-col">
                            <label for="email" class="text-left mb-2 text-sm font-medium text-gray-700 uppercase tracking-wider">Email</label>
                            <input type="email" id="email" name="email" required 
                                   class="px-4 py-3 border border-gray-300 bg-white rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300">
                        </div>

                        <div class="flex flex-col">
                            <label for="telepon" class="text-left mb-2 text-sm font-medium text-gray-700 uppercase tracking-wider">Telepon</label>
                            <input type="tel" id="telepon" name="telepon" required 
                                   class="px-4 py-3 border border-gray-300 bg-white rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" name="simpan" 
                                class="w-full bg-black text-white py-4 px-6 rounded-none uppercase tracking-wider font-medium hover:bg-gray-800 transition duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-black">
                            LANJUTKAN PEMESANAN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>