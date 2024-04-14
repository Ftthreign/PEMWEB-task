<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['hapus'])) {
        $index = $_POST['index'];
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

    <h2>Daftar Tamu</h2>
    <?php 
            if(!isset($_SESSION['tamu']) || count($_SESSION['tamu']) == 0) {?>
                <p class="none-guest">Tidak ada tamu yang terdata</p>
        <?php   } else { ?>
            <table border="1">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Aksi</th>
                </tr>
                <?php if (isset($_SESSION['tamu'])) { ?>
                    <?php foreach ($_SESSION['tamu'] as $index => $data) { ?>
                        <tr>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tanggal']; ?></td>
                            <td><?php echo $data['waktu_masuk']; ?></td>
                            <td><?php echo $data['waktu_keluar']; ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                                    <input type="submit" name="hapus" value="Hapus">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        <?php } ?>
</body>
</html>
