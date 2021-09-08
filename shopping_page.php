<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Toko Sepatu</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="assets/logo.png" style="margin-left:10px;" width="60" height="60" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="shopping_page.php?content=<?php echo 'choose_item.php' ?>">Produk</span></a>
                <a class="nav-item nav-link" href="shopping_page.php?content=<?php echo 'shopping_cart.php' ?>">Shopping Cart</a>
            </div>
        </div>
    </nav>

    <div class="content" style="margin-top:20px;margin-bottom:20px;">
        <?php
        if (!isset($_SESSION['tipeSepatu'])) {
            $_SESSION['tipeSepatu'] = array();
            $_SESSION['warnaSepatu'] = array();
            $_SESSION['ukuranSepatu'] = array();
            $_SESSION['hargaSepatu'] = array();
            $_SESSION['banyakSepatu'] = array();
            $_SESSION['beratSepatu'] = array();
        }

        if (!isset($_GET['content'])) {
        } else {
            $homepage = $_GET['content'];
            include $homepage;
        }
        ?>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

<footer class="text-center text-lg-start bg-light text-muted" style="float:none">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright: Naufal Taufik
    </div>
</footer>


</html>