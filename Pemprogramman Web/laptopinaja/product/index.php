<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaptopInAja | Data Laptop All In Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sidebar1.css">
    <link rel="stylesheet" href="../css/product1.css">
    <link rel="stylesheet" href="../fontawesome_web/css/all.css">

</head>
<body>
    <?php 
        
        include "../database/koneksi.php";
        
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);

            $query = "DELETE FROM laptop_tb WHERE id_laptop='$id'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                header("Location: index.php");
            }else {
                echo "<script>alert('Produk Gagal Dihapus')</script>";
            }
        }
        
    ?>
    <div class="sidebar">
        <h4 class="sidebar-brand">LaptopInAja</h4>
        <ul>
            <li>
                <a href="../admin/dashboard.php"><i class="fa-solid fa-table-columns" style="color: #ffffff;"></i>&nbsp;Dashboard</a>
            </li>
            <li class="active">
                <a href="index.php"><i class="fa-solid fa-laptop" style="color: #ffffff;"></i> &nbsp;Laptop</a>
            </li>
            <li>
                <a href="../transaksi"><i class="fa-solid fa-basket-shopping" style="color: #ffffff;"></i> &nbsp;Transaksi</a>
            </li>
            <li>
                <a href="../logout.php" onclick="return confirm('Apakah Kamu Yakin Ingin Keluar ?')"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>&nbsp;Logout</a>
            </li>
        </ul>
    </div>
    <main>
        <center><div class="section-title">
            Data Laptop
        </div></center>
        <div class="row">
            <div class="card mt-5">
                <center><a href="tambah.php" class="btn btn-succes">Tambah Product</a></center>
                <div class="table-responsive-lg">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Spesifikasi</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        
                        include "../database/koneksi.php";

                        $query = "SELECT * FROM laptop_tb ORDER BY id_laptop DESC";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while ($data = mysqli_fetch_array($result))  { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_laptop'] ?></td>
                                <td><?php echo $data['spesifikasi_laptop'] ?></td>
                                <td>
                                    <?php 
                                        $harga = $data['harga_laptop'];
                                        echo "Rp." . number_format($harga);
                                    ?>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo htmlspecialchars($data['id_laptop']); ?>" class="btn-edit">Edit</a>
                                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id_laptop']; ?>" class="btn-delete">Delete</a>
                                </td>
                            </tr>
                        <?php 
                        }
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