<?php 
include "koneksi.php";

$error = '';
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];

    $query_sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $query_sql);

    if(mysqli_num_rows($result) > 0) {
        $admins = mysqli_fetch_assoc($result);
        
        if($password === $admins['password']) {
            header("Location:form.php");
            exit();
        } else {
            $error = '<div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 mb-4 rounded" role="alert">Username atau password salah</div>';
        }
    } else {
        $error = '<div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 mb-4 rounded" role="alert">Username tidak ditemukan</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (max-width: 640px) {
            .login-container {
                width: 95%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md border border-blue-200 login-container">
        <?php echo $error; ?>
        <form method="POST" action="" class="space-y-4">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
                <h2 class="text-2xl font-bold text-center mt-2 mb-6 text-blue-800">LOGIN ADMIN</h2>
            </div>
            
            <div>
                <label for="username" class="block text-gray-700 mb-2 font-medium">Username</label>
                <input id="username" type="text" name="username" placeholder="Masukkan username" required
                    class="w-full px-4 py-3 bg-blue-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400">
            </div>
            
            <div>
                <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                <input id="password" type="password" name="password" placeholder="Masukkan password" required
                    class="w-full px-4 py-3 bg-blue-50 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-400">
            </div>
            
            <button type="submit" name="login" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 shadow-md">
                Login
            </button>
            
        </form>
    </div>
</body>
</html>