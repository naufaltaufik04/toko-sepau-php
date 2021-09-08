<?php 
    error_reporting (0);
    session_start(); 
?>

    <body>
    <style>
        td, th{
            text-align:center;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col" id="tabelBarang">
                <table class="table table-striped">
                    <!-- Head table -->
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Sub Berat</th>
                        <th>Sub Harga</th>
                        <!-- <th>Aksi</th> -->
                    </tr>

                    <?php 
                        if($_SESSION['tipeSepatu'] != null){
                            for($i=0; $i<sizeof($_SESSION['tipeSepatu']); $i++){         
                    ?>

                    <tr>
                        <td> <?php echo $_SESSION['tipeSepatu'][$i] . 
                        " " . 
                        $_SESSION['warnaSepatu'][$i] .
                        " (" . $_SESSION['ukuranSepatu'][$i] . ")";?> 
                        </td>
                        <td> <?php echo $_SESSION['hargaSepatu'][$i]; ?> </td>
                        <td> <?php echo ($_SESSION['beratSepatu'][$i] /1000) ."Kg"; ?> </td>
                        <td> <?php echo $_SESSION['banyakSepatu'][$i]; ?> </td>
                        <td> <?php echo (($_SESSION['beratSepatu'][$i] /1000)*($_SESSION['banyakSepatu'])[$i]) ."Kg"; ?> </td>
                        <td> <?php echo ( "Rp." . ($_SESSION['hargaSepatu'][$i]) * ($_SESSION['banyakSepatu'][$i])); ?> </td>
                        <!-- <td>
                        <div class="min">
                            <button class="btn"><i class="fa fa-minus"></i></button>
                            <button class="btn"><i class="fa fa-plus"></i></button>
                        </div>
                        </dt> -->
                    </tr>

                    
                    <?php 
                            }
                        }
                    ?>
                    
                    <tr>
                        <th colspan=4>Total</th>
                        <th>
                            <?php
                            
                                if($_SESSION['beratSepatu'] != null){
                                    $totalBerat = 0;
                                    for($i=0; $i<sizeof($_SESSION['tipeSepatu']); $i++){
                                        $totalBerat += ( ($_SESSION['beratSepatu'][$i])*($_SESSION['banyakSepatu'][$i]) / 1000 );
                                    }
                                    $_SESSION['beratTotal'] = $totalBerat;
                                    echo $totalBerat. "Kg";
                                }else{
                                    echo "0Kg";
                                }

                            ?>
                        </th>
                        <th> 
                            <?php  
                                if($_SESSION['hargaSepatu'] != null){
                                    $totalHarga = 0;
                                    for($i=0; $i<sizeof($_SESSION['tipeSepatu']); $i++){
                                        $totalHarga += ( ($_SESSION['hargaSepatu'][$i])*($_SESSION['banyakSepatu'][$i]) );
                                    }
                                    $_SESSION['totalHarga'] = $totalHarga;
                                    echo "Rp".$totalHarga;
                                }else{
                                    echo "Rp.0";
                                }
                            ?> 
                        </th>
                    </tr>
                                    
                </table>
            </div>
        </div>
    </div>
    </body>
</html>