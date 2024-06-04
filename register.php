<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="register-proses.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required> <!-- Tambahkan atribut name -->
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" required> <!-- Tambahkan atribut name -->
                <i class='bx bxs-envelope'></i>
            </div>
            
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required> <!-- Tambahkan atribut name -->
                <i class='bx bxs-lock-alt'></i>
            </div>
         
            <button type="submit" class="btn">Make Account</button> <!-- Ubah type menjadi submit -->
        </form>
    </div>
</body>
</html>
