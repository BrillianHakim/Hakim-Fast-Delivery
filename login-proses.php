<?php
session_start();

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "hakiemdeliveryform");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk mengenkripsi password
function encrypt_password($password) {
    // Ganti salt dengan nilai yang sesuai
    $salt = 'your_salt_here';
    $hashed_password = hash('sha256', $salt . $password);
    return $hashed_password;
}
// Proses login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk mengambil data pengguna
    $query = "SELECT * FROM tb_admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Cek jika pengguna ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Cek password dengan password_verify
        if (password_verify($password, $hashed_password)) {
            // Login berhasil, buat session
            $_SESSION['username'] = $username;
            header('Location: admin.php');
            exit;
        } else {
            // Password salah
            echo "<script>alert('Password salah. Silakan coba lagi.');</script>";
        }
    } else {
        // Username tidak ditemukan
        echo "<script>alert('Username tidak ditemukan. Silakan coba lagi.');</script>";
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>



