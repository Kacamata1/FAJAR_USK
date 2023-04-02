<?php

session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaptopInAja | Keranjang Laptop All In here</title>

    <!-- Root CSS -->
    <link rel="stylesheet" href="../css/root2.css">
    <link rel="stylesheet" href="../fontawesome_web/css/all.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/cart1.css">
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <span class="iconify icon-brand" data-icon="bi:printer-fill"></span>
            <h4 class="text-brand">LaptopInAja</h4>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="../order/" class="nav-link"><span class="iconify"
                        data-icon="iconoir:shopping-bag-check"></span></a>
                <span class="badge">
                    <?php 
                    
                    if (isset($_SESSION['username'])) {

                        $id = $_SESSION['id_user'];

                        include '../database/koneksi.php';

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
                <a href="index.php" class="nav-link active"><span class="iconify"
                        data-icon="clarity:shopping-cart-line"></span></a>
                <span class="badge">
                    <?= count($_SESSION['cart']); ?>
                </span>
            </li>
            <?php

            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == 'admin') {
                    // Halaman Admin
                    echo '
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="dropbtn"><span class="iconify icon-user" data-icon="carbon:user-avatar"></span>'. $_SESSION['username'] .'</a>
                            <div class="dropdown-content">
                                <a href="../admin/dashboard.php">Dashboard</a>
                            </div>
                        </li>
                    ';
                } else {
                    echo '
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="dropbtn"><span class="iconify icon-user" data-icon="carbon:user-avatar"></span>'. $_SESSION['username'] .'</a>
                            <div class="dropdown-content">
                                <a href="../logout.php">Logout</a>
                            </div>
                        </li>
                    ';
                }
            } else {
                echo '
                        <li class="nav-item">
                            <a href="../login/" class="nav-link"><span class="iconify" data-icon="mdi:login-variant"></span></a>
                        </li>
                    ';
            }
            ?>
        </ul>
    </nav>
    <!-- End Navbar -->

    <?php
    require '../database/koneksi.php';
    require '../item.php';

    if (isset($_GET['id']) && !isset($_POST['update'])) {
        $sql = 'SELECT * FROM laptop_tb WHERE id_laptop=' . $_GET['id'];
        $result = mysqli_query($koneksi, $sql);
        $product = mysqli_fetch_object($result);
        $item = new Item();
        $item->id = $product->id_laptop;
        $item->name = $product->nama_laptop;
        $item->price = $product->harga_laptop;
        $iteminstock = 10;
        $item->quantity = 1;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $index = -1;
        $cart = unserialize(serialize($_SESSION['cart']));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]->id == $_GET['id']) {
                $index = $i;
                break;
            }
        }

        if ($index == -1) {
            $_SESSION['cart'][] = $item;
        } else {
            if ($cart[$index]->quantity < $iteminstock) {
                $cart[$index]->quantity++;
            }

            $_SESSION['cart'] = $cart;
        }  
    }

    if (isset($_GET['index']) && !isset($_POST['update'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }
    
    if (isset($_POST['update'])) {
        $arrQuantity = $_POST['quantity'];
        $cart = unserialize(serialize($_SESSION['cart']));
        for ($i = 0; $i < count($cart); $i++) {
            $cart[$i]->quantity = $arrQuantity[$i];
        }
        $_SESSION['cart'] = $cart;
    }
    ?>

    <!-- Section Title -->
    <div class="container">
        <h2 class="section-title">Keranjang Belanja Anda</h2>
    </div>
    <!-- End Section Title -->
    <div class="row">
        <div class="card mt-5">
            <form method="POST">
            <table  class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                $cart = unserialize(serialize($_SESSION['cart']));
                $s = 0;
                $index = 0;
                for ($i = 0; $i < count($cart); $i++) {
                    $s += $cart[$i]->price * $cart[$i]->quantity; ?>
                    <tr>
                        <td> <?php echo $cart[$i]->id; ?> </td>
                        <td> <?php echo $cart[$i]->name; ?> </td>
                        <td>Rp. <?php echo number_format($cart[$i]->price); ?> </td>
                        <td> <input type="number" class="form-number" min="1" value="<?php echo $cart[
                        $i
                    ]->quantity; ?>" name="quantity[]"> </td>
                        <td> Rp.<?php echo number_format(
                        $cart[$i]->price * $cart[$i]->quantity     
                    ); ?> </td>
                        <td style="display: flex;align-items: center;justify-content: center;">
                            <a href="index.php?index=<?php echo $index; ?>" class="btn-danger"
                                onclick="return confirm('Apa Kamu Yakin Ingin Menghapus Ini?')">
                                <img src="../image/icon-delete.svg" alt=""></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align:right; font-weight:500">
                            <input id="saveimg" type="image" src="../image/icon-update.png" name="update"
                                alt="Save Button">
                            <input type="hidden" name="update">
                        </td>
                        <td colspan="2"> Rp.<?php echo number_format($s); ?> </td>
                    </tr>
                    <?php $index++;
                }
                ?>
                </table>
            </form>
            <br>
            <div class="row-btn">
                <a href="../index.php" class="btn btn-info">Continue Shopping</a>
                <?php 
    
            if (isset($_SESSION['id_user'])) {
            ?>
                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                <?php } 
            
            ?>
            </div>
        </div>
    </div>
    <?php if (isset($_GET['id']) || isset($_GET['index'])) {
        header('Location: index.php');
    } ?>
    <!-- Content -->

    <!-- End Content -->

     <!-- Iconify -->
     <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</body>
</html>