<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/sidebar1.css">
    <link rel="stylesheet" href="../fontawesome_web/css/all.css">
</head>
<body>
    <div class="sidebar">
        <h4 class="sidebar-brand">LaptopInAja</h4>
        <ul>
            <li class="active">
                <a href="dashboard.php"><i class="fa-solid fa-table-columns" style="color: #ffffff;"></i>&nbsp;Dashboard</a>
            </li>
            <li>
                <a href="../product/index.php"><i class="fa-solid fa-laptop" style="color: #ffffff;"></i> &nbsp;Laptop</a>
            </li>
            <li>
                <a href="../transaksi"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> &nbsp;Transaksi</a>
            </li>
            <li>
                <a href="../logout.php" onclick="return confirm('Apakah Kamu Yakin Ingin Keluar ?')"> <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i> &nbsp;Logout</a>
            </li>
        </ul>
    </div>
    <main>
       <center> <div class="section-title">
            Dashboard
        </div></center>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                  <center><div class="card-header">
                        Total Laptop All In Here
                    </div></center>
                    <div class="card-body">
                        <?php 
                        include '../database/koneksi.php';
                        $query = "SELECT count(*) as total FROM laptop_tb";
                        $result = mysqli_query($koneksi, $query);
                        $hasil = mysqli_fetch_assoc($result);

                        echo $hasil['total'];
                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center><div class="card-header">
                        Total Transaksi
                    </div></center>
                    <div class="card-body">
                    <?php 
                        
                        include '../database/koneksi.php';

                        $query = "SELECT count(*) as total FROM transaksi";
                        $result = mysqli_query($koneksi, $query);
                        $hasil = mysqli_fetch_assoc($result);

                        echo $hasil['total'];
                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center><div class="card-header">
                        Total User
                    </div></center>
                    <div class="card-body">
                    <?php 
                        
                        include '../database/koneksi.php';

                        $query = "SELECT count(*) as total FROM user";
                        $result = mysqli_query($koneksi, $query);
                        $hasil = mysqli_fetch_assoc($result);

                        echo $hasil['total'];
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <center><div class="section-title mt-3">
            Notifikasi Transaksi
        </div></center>
        <div class="table table-striped">
        <table  class="table table-striped" >
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>subtotal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php 
            
            include '../database/koneksi.php';

            $query = "SELECT transaksi.subtotal, transaksi.Jumlah, transaksi.idTransaksi, transaksi.status ,  transaksi.UserIdUser2, user.Username, laptop_tb.nama_laptop, laptop_tb.harga_laptop FROM transaksi INNER JOIN user ON transaksi.UserIdUser2 = user.idUser INNER JOIN laptop_tb ON transaksi.laptop_tblid_laptop = laptop_tb.id_laptop"; 
            $result = mysqli_query($koneksi, $query);
            $no = 1;
                while ($data=mysqli_fetch_object($result)) {
                if ($data->status == 1) {
                        # code...
            ?>

            <tr>     
                <td><?= $no++ ?></td>
                <td><?= $data->nama_laptop ?></td>
                <td><?= $data->Username ?></td>
                <td><?= $data->Jumlah ?></td>
                <td><?= number_format($data->harga_laptop) ?></td>
                <td><?= number_format($data->subtotal) ?></td>
                <td><span class="badge-warning">Sedang Menunggu Dikonfirmasi</span></td>
                <td>
                    <a href="dashboard.php?id=<?= $data->idTransaksi ?>" class="btn-info">Konfirmasi</a>
                </td>
            </tr>

            <?php } } ?>
            
        </table>
        </div>
    </main>

    <?php 
    
    if (isset($_GET['id'])) {
        
        include '../database/koneksi.php';

        $id = $_GET['id'];
        $status = 2;

        $query = "UPDATE transaksi SET status='$status' WHERE idTransaksi = '$id'";
        $run = mysqli_query($koneksi, $query);

        if ($run) {
            header("location:dashboard.php");
        }

    }
    
    ?>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b8d1f961b1.js" crossorigin="anonymous"></script>

    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>