<?php 
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaptopInAja</title>
   

    <!-- Root CSS -->
    <link rel="stylesheet" href="css/root2.css">
    <link rel="stylesheet" href="css/home4.css">
    <link rel="stylesheet" href="fontawesome_web/css/all.css">

    <!-- Style CSS -->
    

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <span class="iconify icon-brand"><i class="fa-solid fa-laptop"></i></span>
            <h4 class="text-brand">LaptopInAja</h4>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="order/" class="nav-link"><span class="iconify" data-icon="iconoir:shopping-bag-check"></span></a>
                <span class="badge">
                    <?php 
                    
                    if (isset($_SESSION['username'])) {

                        $id = $_SESSION['id_user'];

                        include 'database/koneksi.php';

                        $sql = "SELECT transaksi.subtotal, transaksi.Jumlah, transaksi.idTransaksi, transaksi.status ,  transaksi.UserIdUser2, user.Username, laptop_tb.nama_laptop, laptop_tb.harga_laptop FROM transaksi INNER JOIN user ON transaksi.UserIdUser2 = user.idUser INNER JOIN laptop_tb ON transaksi.laptop_tblid_laptop = laptop_tb.id_laptop WHERE UserIdUser2 = '$id'";
                        $excute = mysqli_query($koneksi, $sql);
                        $result = mysqli_num_rows($excute);

                        echo $result;

                    } else {

                        echo 0;

                    }
                    ?>
                </span>
            </li>
            <li class="nav-item">
                <a href="cart/" class="nav-link"><span class="iconify" data-icon="clarity:shopping-cart-line"></span></a>
                <span class="badge"><?= count($_SESSION['cart']); ?></span>
            </li>
            <?php

            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == 'admin') {
                    echo '
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="dropbtn"><span class="iconify icon-user" data-icon="carbon:user-avatar"></span>'. $_SESSION['username'] .'</a>
                            <div class="dropdown-content">
                                <a href="admin/dashboard.php">Dashboard</a>
                            </div>
                        </li>
                    ';
                } else {
                    echo '
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="dropbtn"><span class="iconify icon-user" data-icon="carbon:user-avatar"></span>'. $_SESSION['username'] .'</a>
                            <div class="dropdown-content">
                                <a href="logout.php" >Logout</a>
                            </div>
                        </li>
                    ';
                }
            } else {
                echo '
                        <li class="nav-item">
                            <a href="login/" class="nav-link" ><span class="iconify" data-icon="mdi:login-variant"></span></a>
                        </li>
                    ';
            }
            ?>            
        </ul>
    </nav>
    <!-- End Navbar -->

    <!-- Banner -->
    <div class="banner">
        <div class="banner-description">
            <h5>Best And Quality</h5>
            <h3>All Quality Laptop</h3>
            <h1>IN HERE</h1>
        </div>
        <div class="banner-img">
            <img src="image/banner2.png" alt="">
        </div>
    </div>
    <!-- End Banner -->

    <!-- Section Title -->
    <div class="container">
        <div class="section-title">
            <h3>Laptop All In Here New</h3>
        </div>
    </div>
    <!-- End Section Title -->

    <!-- Content -->
    <div class="container">
        <div class="row-card">
            <?php
            include 'database/koneksi.php';

            $query = 'SELECT * FROM laptop_tb ORDER BY id_laptop DESC';
            $result = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($result)) { ?>
            <div class="card style="width: 18rem;">
                <div class="card-image">
                    <img src="img-product/<?= $data[
                                'gambar_laptop'
                            ] ?>" alt="">
                </div>
                <div class="card-body">
                    <h4 class="title-product"><?= $data['nama_laptop'] ?></h4>
                    <p class="price-product"><?= 'Rp.' .
                            number_format($data['harga_laptop']) ?></p>
                    <a href="cart/index.php?id=<?php echo $data[
                                'id_laptop'
                            ]; ?>&action=add" class="btn-add-to-cart">Add To Cart <span class="iconify icon-to-cart"
                            data-icon="ic:outline-add-shopping-cart"></span></a>
                </div>
            </div>
            <?php }
            ?>
        </div>
    </div>
    <!-- End Content -->

    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>

</body>
</html>