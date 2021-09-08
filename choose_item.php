<?php 
    error_reporting (0);
    session_start();
    if($_SESSION['namaBarang'] == null){
        $_SESSION['kodeBarang'] = array();
        $_SESSION['namaBarang'] = array();
        $_SESSION['hargaBarang'] = array();
        $_SESSION['banyakBarang'] = array();
        $_SESSION['beratBarang'] = array();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Pilih Sepatu</title>
    </head>
    <body>
    <div class="container-fluid">
        <div class = "row" style="text-align:-webkit-center;">
            <?php 
                include 'database_connection.php';

                $selectSepatu = "SELECT * FROM sepatu";
                $resultSepatu = $koneksi->query($selectSepatu);
                while($data = $resultSepatu->fetch_assoc()) {
                    $selectDetail = 'SELECT * FROM detail_sepatu WHERE tipe_sepatu = "'. $data['tipe_sepatu']. '"';
                    $resultDetail = $koneksi->query($selectDetail);
                    while($dataDetail = $resultDetail->fetch_assoc()){
                        $warnaSepatu = $dataDetail['warna'];
                        $ukuranSepatu = $dataDetail['ukuran'];
                        break;
                    }
            ?>
            <div class = "col-4 mt-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height: 17rem;" src="assets/<?php echo $data['tipe_sepatu'] ."+" . $warnaSepatu ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> Adidas <?php echo $data['tipe_sepatu']?> </h5>
                    </div>
                        <a style="background:#ff9f1a;color:white;height:60px;font-size:25px;font-weight:500;" href="shopping_page.php?content=details_page.php&tipeSepatu=<?php echo $data['tipe_sepatu']?>&warnaSepatu=<?php echo $warnaSepatu?>&ukuranSepatu=<?php echo $ukuranSepatu?>" 
                            class="btn">Details sepatu</a>
                </div>
            </div>

            <?php
                }
            ?>
            
        </div>
    </div>
    </body>
</html>