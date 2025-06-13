<?php 
include "koneksi.php";

if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kapasitas_maks = $_POST['kapasitas_maks'];
    $fasilitas = $_POST['fasilitas'];
    $setatus = $_POST['setatus'];
    
    // Tanggal dibuat dan diperbarui (otomatis)
    $dibuat_pada = date('Y-m-d H:i:s');
    $diperbarui_pada = date('Y-m-d H:i:s');
    
    // Proses upload gambar
    $gambar_path = null;
    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION));
        $new_filename = uniqid().'.'.$imageFileType;
        $target_file = $target_dir . $new_filename;
        
        // Validasi gambar
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false && 
           in_array($imageFileType, ["jpg", "jpeg", "png", "gif"]) && 
           $_FILES["gambar"]["size"] <= 2000000) {
            
            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $gambar_path = $new_filename;
            }
        }
    }
    
    // Query untuk insert data
    $query = "INSERT INTO tipe_kamar (id, tipe, harga, deskripsi, kapasitas_maks, fasilitas, gambar,setatus, dibuat_pada, diperbarui_pada) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Menggunakan prepared statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssisssss', $id, $tipe, $harga, $deskripsi, $kapasitas_maks, $fasilitas, $gambar_path,$setatus, $dibuat_pada, $diperbarui_pada);
    
    if(mysqli_stmt_execute($stmt)) {
        header("Location: tampilan.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tipe Kamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-600">Tambah Tipe Kamar</h2>
        <form method="POST" action="" enctype="multipart/form-data" class="space-y-4">
            
            <div>
                <label class="block text-gray-700 mb-2">ID Tipe Kamar</label>
                <input type="text" name="id" placeholder="ID Tipe Kamar" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Tipe</label>
                <select name="tipe" id="tipe">
                    <option value="standart">standart</option>
                    <option value="vip">vip</option>
                    <option value="luxury">luxury</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Harga per Malam</label>
                <input type="number" name="harga" placeholder="Harga dalam angka" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="3" placeholder="Deskripsi kamar" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Kapasitas Maksimal</label>
                <input type="number" name="kapasitas_maks" placeholder="Jumlah orang" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Fasilitas</label>
                <textarea name="fasilitas" rows="3" placeholder="Daftar fasilitas (pisahkan dengan koma)" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 mb-2">setatus</label>
                <select name="setatus" id="setatus">
                    <option value="terisi">terisi</option>
                    <option value="kosong">kosong</option>
                </select>
            </div>
            
            <div>
                <label class="block text-gray-700 mb-2">Gambar Kamar</label>
                <input type="file" name="gambar" accept="image/*" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <button type="submit" name="simpan" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300 mt-4">
                Simpan Data Tipe Kamar
            </button>

            <div class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300 mt-4 flex justify-center">
                <a href="tampilan.php">lihat kamar</a>
            </div>
        </form>
    </div>
</body>
</html>