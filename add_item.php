<?php  
    session_start();
    $tipeSepatu  = $_GET['tipeSepatu'];
    $warnaSepatu  = $_GET['warnaSepatu'];
    $ukuranSepatu  = $_GET['ukuranSepatu'];
    $hargaSepatu  = $_GET['hargaSepatu'];
    $beratSepatu  = $_GET['beratSepatu'];

    if($_SESSION['tipeSepatu'] != null){
        $totalItem = sizeof($_SESSION['tipeSepatu']);

        for($i=0; $i<$totalItem; $i++){
            if($_SESSION['tipeSepatu'][$i] == $tipeSepatu
             && $_SESSION['warnaSepatu'][$i] == $warnaSepatu
             && $_SESSION['ukuranSepatu'][$i] == $ukuranSepatu){
                $_SESSION['banyakSepatu'][$i] ++;
                break;
            }
            else{
                if($i == $totalItem-1){
                    array_push($_SESSION['tipeSepatu'], $tipeSepatu); 
                    array_push($_SESSION['warnaSepatu'], $warnaSepatu);
                    array_push($_SESSION['ukuranSepatu'], $ukuranSepatu); 
                    array_push($_SESSION['hargaSepatu'], $hargaSepatu); 
                    array_push($_SESSION['banyakSepatu'], 1); 
                    array_push($_SESSION['beratSepatu'], $beratSepatu); 
                }
            }
        }
    }
    else{
        array_push($_SESSION['tipeSepatu'], $tipeSepatu); 
        array_push($_SESSION['warnaSepatu'], $warnaSepatu); 
        array_push($_SESSION['ukuranSepatu'], $ukuranSepatu); 
        array_push($_SESSION['hargaSepatu'], $hargaSepatu); 
        array_push($_SESSION['banyakSepatu'], 1); 
        array_push($_SESSION['beratSepatu'], $beratSepatu);
    }

    //Kurangi stok
    // include "database_connection.php";
    // $selectBarang = "SELECT * from barang";
    // $data = mysqli_query($koneksi, $selectBarang);
    // while($d = mysqli_fetch_array($data)){
    //     if($d['kode_barang'] == $tipeSepatu){
    //         $stok = $d['stok_barang'];
    //         $updateStok = "UPDATE barang SET stok = ($stok - 1)";
    //         $koneksi->query($updateStok);
    //     }
    // }

    header("Location: shopping_page.php?content=shopping_cart.php");
?>
