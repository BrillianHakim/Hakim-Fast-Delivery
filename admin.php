<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit();
}
include 'koneksi.php';
// Menghitung total data pengirim
$query_pengirim = mysqli_query($koneksi, "SELECT COUNT(*) AS total_pengirim FROM pengiriman");
$row_pengirim = mysqli_fetch_assoc($query_pengirim);
$total_pengirim = $row_pengirim['total_pengirim'];

// Menghitung total data penerima
$query_penerima = mysqli_query($koneksi, "SELECT COUNT(*) AS total_penerima FROM penerimaan");
$row_penerima = mysqli_fetch_assoc($query_penerima);
$total_penerima = $row_penerima['total_penerima'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="assets/majestic.png" />
  <link rel="stylesheet" href="css/admin.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HakiemDelivery.</title>
</head>

<body>
  <div class="sidebar">

    <ul class="nav-links">
      <li>
        <a href="admin.php" class="active">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="pengiriman/pengiriman.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Pengiriman</span>
        </a>
      </li>
      <li>
        <a href="penerimaan/penerimaan.php">
          <i class="bx bx-list-ul"></i>
          <span class="links_name">Penerimaan</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
      </div>
      <div class="profile-details">
        <a href="logout.php">
          <i class="bx bx-log-out">Logout</i>
        </a>
      </div>
    </nav>
    <div class="home-content">
      <h1>Welcome Sir!</h1>
      <br>
      <div class="widget">
        <div class="widget-box">
          <img src="img/bicycle.png" alt="Icon 1" style="max-width: 10%;">
          <h4>Total Data Pengirim</h4>
          <p><?php echo $total_pengirim; ?></p>
        </div>
        <div class="widget-box">
          <img src="img/receiver.png" alt="Icon 2" style="max-width: 10%;">
          <h4>Total Data Penerima</h4>
          <p><?php echo $total_penerima; ?></p>
        </div>
      </div>
      <style>
        .widget {
          display: flex;
          margin: 20px 0;
          padding: 10px;
          border-radius: 8px;
        }

        .widget-box {
          margin: 0 10px;
          padding: 20px;
          background-color: #fff;
          border: 1px solid #ddd;
          border-radius: 8px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          text-align: center;
        }

        .widget-box p {
          font-size: 1.2em;
          color: #666;
          margin: 10px 0 0;
        }
      </style>
    </div>
  </section>
</body>
<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if (sidebar.classList.contains("active")) {
      sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
</script>

</html>