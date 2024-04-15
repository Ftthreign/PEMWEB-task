<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['hapus'])) {
        $index = $_POST['hapus'];
        unset($_SESSION['tamu'][$index]);
        header("Location: view_guest.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Tamu</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <button class="back-to-index">
        <a href="index.php">Kembali ke halaman utama</a>
    </button>
    <div class="view-guest-container">

        <h2>Daftar Tamu</h2>
        <?php 
            if(!isset($_SESSION['tamu']) || count($_SESSION['tamu']) == 0) {?>
                <p class="error-message">Tidak ada tamu yang terdata</p>
        <?php   } else { ?>
            <table border="1">
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Aksi</th>
                </tr>
                <?php if (isset($_SESSION['tamu'])) { ?>
                    <?php $number = 1 ?>
                    <?php foreach ($_SESSION['tamu'] as $index => $data) { ?>
                        <tr>
                            <td><?php echo $number ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo $data['waktu_masuk']; ?></td>
                            <td><?php echo $data['waktu_keluar']; ?></td>
                            <td>
                                <form method="post">
                                    <button type="submit" name="hapus" value="<?php echo $index;?>">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $number++?>
                        <?php } ?>
                <?php } ?>
            </table>
            <?php } ?>
        </div>
</body>
</html>
