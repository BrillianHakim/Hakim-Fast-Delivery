<?php
// Koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hakiemdeliveryform";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit();
}

// Dapatkan data form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Siapkan dan ikat
$sql = "INSERT INTO tb_admin (username, email, password) VALUES (:username, :email, :password)";
$statement = $pdo->prepare($sql);
$statement->bindParam(':username', $username);
$statement->bindParam(':email', $email);
$statement->bindParam(':password', $hashed_password);

// Setel password ke hash
$hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 8]);

// Eksekusi pernyataan
if ($statement->execute()) {
    echo "<script>
    alert('Registrasi berhasil! Silakan login untuk melanjutkan.');
    window.location = 'login.php';
    </script>";
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $pdo->errorInfo()[2];
}

// Tutup pernyataan dan koneksi
$statement->closeCursor();
$pdo = null;
?>