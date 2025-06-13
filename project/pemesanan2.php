<?php
session_start();
if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'pemesanan.php') === false) {
    header("Location: pembayaran.php"); 
    exit();
}
include "koneksi.php";
$query = "SELECT * FROM tipe_kamar ORDER BY dibuat_pada DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Kamar - Luxury Hotel</title>
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
    <div class="container mx-auto px-4 py-16">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-serif font-bold text-gray-900 mb-4 tracking-tight">REKOMENDASI KAMAR</h2>
            <div class="w-20 h-px bg-black mx-auto mb-4"></div>
            <p class="text-gray-600 font-light max-w-2xl mx-auto">Temukan kamar terbaik untuk pengalaman menginap yang tak terlupakan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="bg-white border border-gray-200 transition-all duration-300 hover:shadow-lg">
                <div class="h-64 bg-gray-100 overflow-hidden">
                    <?php if(!empty($row['gambar'])): ?>
                        <img src="./uploads/<?= htmlspecialchars($row['gambar']) ?>" 
                             alt="<?= htmlspecialchars($row['tipe']) ?>" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-serif font-bold text-gray-900"><?= htmlspecialchars($row['tipe']) ?></h3>
                        <span class="bg-black text-white text-xs px-2 py-1 rounded-none">ID: <?= htmlspecialchars($row['id']) ?></span>
                    </div>
                    
                    <p class="text-gray-600 text-sm mb-5 line-clamp-2 font-light"><?= htmlspecialchars($row['deskripsi']) ?></p>
                    
                    <div class="space-y-3 mb-5">
                        <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
</svg>

                            <span class="text-sm text-gray-500 font-light"><?=($row['fasilitas']) ?></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="text-sm text-gray-500 font-light"><?= htmlspecialchars($row['kapasitas_maks']) ?> orang</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider">Mulai dari</p>
                            <p class="text-lg font-serif font-bold text-gray-900">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                        </div>
                        <a href="pembayaran.php?room_id=<?= $row['id'] ?>" 
                           class="bg-black text-white px-5 py-2 rounded-none text-sm font-medium hover:bg-gray-800 transition duration-300 uppercase tracking-wider">
                            Pesan
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        
        <div class="mt-12 text-center text-gray-500 text-sm font-light border-t border-gray-200 pt-8">
            Menampilkan <?= mysqli_num_rows($result) ?> tipe kamar mewah
        </div>
    </div>
</body>
</html>