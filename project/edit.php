<?php
include "koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tipe_kamar WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kapasitas_maks = $_POST['kapasitas_maks'];
    $fasilitas = $_POST['fasilitas'];
    $setatus = $_POST['setatus'];
    
    mysqli_query($conn, "UPDATE tipe_kamar SET 
        tipe='$tipe', 
        harga='$harga', 
        deskripsi='$deskripsi', 
        kapasitas_maks='$kapasitas_maks', 
        fasilitas='$fasilitas',
        setatus='$setatus',
        diperbarui_pada=NOW()
        WHERE id='$id'");
    
    header("Location: tampilan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tipe Kamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 640px) {
            .form-container {
                width: 95%;
                padding: 1rem;
            }
        }
    </style>
</head>    

<body class="bg-blue-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md border border-blue-200 form-container">
        <a href="tampilan.php" class="text-blue-600 hover:text-blue-800 mb-4 inline-block flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar
        </a>
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-800">Edit Tipe Kamar</h2>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <div>
                <label class="block text-gray-700 mb-2 font-medium">Tipe</label>
                <select name="tipe" id="tipe" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                    <option value="standart" <?= $data['tipe'] == 'standart' ? 'selected' : '' ?>>Standart</option>
                    <option value="vip" <?= $data['tipe'] == 'vip' ? 'selected' : '' ?>>VIP</option>
                    <option value="luxury" <?= $data['tipe'] == 'luxury' ? 'selected' : '' ?>>Luxury</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2 font-medium">Harga</label>
                <input type="number" name="harga" value="<?= $data['harga'] ?>" placeholder="Harga" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2 font-medium">Deskripsi</label>
                <textarea name="deskripsi" placeholder="Deskripsi" required rows="3"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"><?= $data['deskripsi'] ?></textarea>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2 font-medium">Kapasitas Maksimal</label>
                <input type="number" name="kapasitas_maks" value="<?= $data['kapasitas_maks'] ?>" placeholder="Kapasitas Maksimal" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2 font-medium">Fasilitas</label>
                <textarea name="fasilitas" placeholder="Fasilitas" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"><?= $data['fasilitas'] ?></textarea>
            </div>
            <div>
                <label class="block text-gray-700 mb-2 font-medium">Tipe</label>
                <select name="setatus" id="setatus" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                    <option value="terisi" <?= $data['setatus'] == 'terisi' ? 'selected' : '' ?>>Terisi</option>
                    <option value="kosong" <?= $data['setatus'] == 'kosong' ? 'selected' : '' ?>>Kososng</option>
                </select>
            </div>
            
            
            <button type="submit" name="update"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Perbarui Data
            </button>
        </form>
    </div>
</body>

</html>