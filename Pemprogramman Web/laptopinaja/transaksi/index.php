<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaptopInAja | Transaksi Laptop All In Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sidebar1.css">
    <link rel="stylesheet" href="../css/product1.css">
    <link rel="stylesheet" href="../fontawesome_web/css/all.css">

</head>
<body>
    <?php
    include '../database/koneksi.php';

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);

        $query = "DELETE FROM laptop_tb WHERE id_laptop='$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header('Location: index.php');
        } else {
            echo "<script>alert('Produk Gagal Dihapus')</script>";
        }
    }
    ?>
    <div class="sidebar">
        <h4 class="sidebar-brand">LaptopInAja</h4>
        <ul>
            <li>
                <a href="../admin/dashboard.php"><i class="fa-solid fa-table-columns" style="color: #ffffff;"></i> &nbsp;Dashboard</a>
            </li>
            <li>
                <a href="../product/index.php"><i class="fa-solid fa-laptop" style="color: #ffffff;"></i> &nbsp;Laptop</a>
            </li>
            <li class="active">
                <a href="index.php"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> &nbsp;Transaksi</a>
            </li>
            <li>
                <a href="../logout.php" onclick="return confirm('Apakah Kamu Yakin Ingin Keluar ?')"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> &nbsp;Logout</a>
            </li>
        </ul>
    </div>
    <main>
        <center><div class="section-title">
            Data Transaksi
        </div></center>
        <div class="row">
            <div class="card mt-5">
                <div class="table-responsive-lg">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>subtotal</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    include '../database/koneksi.php';

                    $query = 'SELECT transaksi.subtotal, transaksi.Jumlah, transaksi.idTransaksi, transaksi.status ,  transaksi.UserIdUser2, user.Username, laptop_tb.nama_laptop, laptop_tb.harga_laptop FROM transaksi INNER JOIN user ON transaksi.UserIdUser2 = user.idUser INNER JOIN laptop_tb ON transaksi.laptop_tblid_laptop = laptop_tb.id_laptop';
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_object($result)) { ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->nama_laptop ?></td>
                        <td><?= $data->Username ?></td>
                        <td><?= $data->Jumlah ?></td>
                        <td><?= number_format($data->harga_laptop) ?></td>
                        <td><?= number_format($data->subtotal) ?></td>
                        <?php 
                        
                        if ($data->status == 1) {
                        ?>

                            <td><span class="badge-warning">Sedang Menunggu Konfirmasi</span></td>
                            

                        <?php 
                        } else {
                        ?>
                            <td><span class="badge-success">Produk Sudah DiKonfirmasi</span></td>

                        <?php } ?>
                    </tr>

                    <?php }
                    ?>
                </table>
                </div>
            </div>
        </div>
    </main>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b8d1f961b1.js" crossorigin="anonymous"></script>

    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</body>
</html>