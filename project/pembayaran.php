<?php
session_start();
if (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], 'pemesanan2.php') === false) {
    header("Location: pembayaran.php"); 
    exit();
}
include "koneksi.php";

if (isset($_GET['room_id'])) {
    $room_id = intval($_GET['room_id']);
} elseif (isset($_POST['room_id'])) {
    $room_id = intval($_POST['room_id']);
} else {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM tipe_kamar WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $room_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$room = mysqli_fetch_assoc($result);

if (!$room) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Kamar - <?= htmlspecialchars($room['tipe']) ?></title>
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
    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-2xl">
            <div class="bg-white border border-gray-200">
                <div class="bg-black px-8 py-6">
                    <h2 class="text-2xl font-serif font-bold text-white tracking-tight">KONFIRMASI PEMBAYARAN</h2>
                </div>
                
                <div class="p-8">
                    <div class="mb-8">
                        <h3 class="text-xl font-serif font-bold text-gray-900 mb-2"><?= htmlspecialchars($room['tipe']) ?></h3>
                        <p class="text-gray-600 font-light"><?= htmlspecialchars($room['deskripsi']) ?></p>
                    </div>
                    
                    <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-6">
                        <span class="text-lg font-medium text-gray-700">Harga per Malam:</span>
                        <span class="text-lg font-serif font-bold text-gray-900">Rp <?= number_format($room['harga'], 0, ',', '.') ?></span>
                    </div>

                    <form onsubmit="return sendWhatsApp()" class="space-y-6">
                        <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
                        
                        <div>
                            <label for="durasi" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Durasi Menginap (Malam)</label>
                            <input type="number" id="durasi" min="1" value="1" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300"
                                   onchange="updateTotal()">
                        </div>
                        
                        <div class="flex justify-between items-center mb-8 border-t border-gray-200 pt-6">
                            <span class="text-lg font-medium text-gray-700">Total Harga:</span>
                            <span id="total-harga" class="text-xl font-serif font-bold text-gray-900">Rp <?= number_format($room['harga'], 0, ',', '.') ?></span>
                        </div>
                        
                        <div class="space-y-6">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                                <input type="text" id="nama" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300">
                            </div>
                            
                            <div>
                                <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2 uppercase tracking-wider">Nomor WhatsApp</label>
                                <input type="tel" id="telepon" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-none focus:outline-none focus:ring-1 focus:ring-black focus:border-black transition duration-300" 
                                       placeholder="Contoh: 6281234567890">
                            </div>
                        </div>
                      
                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full bg-black text-white py-4 px-6 rounded-none uppercase tracking-wider font-medium hover:bg-gray-800 transition duration-300 flex items-center justify-center border border-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-6.29-3.51c.545 0 1.033-.487 1.033-1.032 0-.546-.487-1.033-1.033-1.033s-1.033.487-1.033 1.033c0 .545.487 1.032 1.033 1.032m4.008 0c.546 0 1.033-.487 1.033-1.032 0-.546-.487-1.033-1.033-1.033s-1.033.487-1.033 1.033c0 .545.487 1.032 1.033 1.032M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20z"/>
                                </svg>
                                Hubungi via WhatsApp
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-8 text-center">
                        <a href="index.php" class="text-gray-600 hover:text-black transition duration-300 font-light">
                            ← Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function updateTotal() {
        const durasi = document.getElementById('durasi').value;
        const hargaPerMalam = <?= $room['harga'] ?>;
        const totalHarga = durasi * hargaPerMalam;
        
        // Format angka ke format Rupiah
        document.getElementById('total-harga').textContent = 'Rp ' + formatRupiah(totalHarga);
    }

    // Fungsi format Rupiah
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function sendWhatsApp() {
        const nama = document.getElementById('nama').value;
        const telepon = document.getElementById('telepon').value;
        const durasi = document.getElementById('durasi').value;
        const roomType = "<?= htmlspecialchars($room['tipe'], ENT_QUOTES) ?>";
        const hargaPerMalam = <?= $room['harga'] ?>;
        const totalHarga = durasi * hargaPerMalam;
        
        if (!telepon.startsWith('62')) {
            alert('Tolong gunakan nomor dengan awalan 62 (contoh: 6281234567890)');
            return false;
        }
        
        const message = `Halo, kami dari Luxury Hotel ingin mengkonfirmasi bahwa ${nama} ingin memesan kamar:
        
    Nama          : ${nama}
    Tipe Kamar    : ${roomType}
    Durasi        : ${durasi} Malam
    Harga/Malam   : Rp ${formatRupiah(hargaPerMalam)}
    Total Harga   : Rp ${formatRupiah(totalHarga)}
    No. Rekening  : 028824243314 (PT. Luxury Hotel)

Mohon segera melakukan pembayaran untuk kamar ini. Terima kasih.`;
        
        const whatsappUrl = `https://wa.me/${telepon}?text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
        
        return false; 
    }
    </script>
</body>
</html>