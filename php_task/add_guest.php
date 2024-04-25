<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $waktu_masuk = $_POST['waktu_masuk'];
        $waktu_keluar = $_POST['waktu_keluar'];
        
        if(empty($nama) || empty($tanggal) || empty($waktu_masuk) || empty($waktu_keluar)) {
            $_SESSION['error_message'] = "Semua Kolom harus diisi";
            header("Location: add_guest.php");
            exit;
        } else {   
            $tamu_baru = array(
                'nama' => $nama,
                'tanggal' => $tanggal,
                'waktu_masuk' => $waktu_masuk,
                'waktu_keluar' => $waktu_keluar,
            );
            
            if(!isset($_SESSION['tamu'])) {
                $_SESSION['tamu'] = array();
            }

            $_SESSION['tamu'][] = $tamu_baru;
            header("Location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH TAMU</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <button class="back-to-index">
        <a href="index.php">Kembali ke halaman utama</a>
    </button>
        
    
    <div class="add-guest-container">
        <h2><?php echo "TAMBAH TAMU"?></h2>
        
        <?php if(isset($_SESSION['error_message'])) { ?>
        <p class="error-message"><?php echo $_SESSION['error_message'] ?></p>
        <?php unset($_SESSION['error_message'])?>
    <?php }?>
    
    <form action="" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="tanggal">Tanggal:</label><br>
        <input type="date" id="tanggal" name="tanggal"><br>
        <label for="waktu_masuk">Waktu Masuk:</label><br>
        <input type="time" id="waktu_masuk" name="waktu_masuk"><br>
        <label for="waktu_keluar">Waktu Keluar:</label><br>
        <input type="time" id="waktu_keluar" name="waktu_keluar"><br><br>
        <button type="submit" name="submit">Tambah tamu</button>
    </form>
</div>
</body>
</html>