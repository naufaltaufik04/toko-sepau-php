<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Formulir transaksi</title>
</head>
<body>
	<style>
        table, th, td{
            border-collapse: collapse;
        }
        .col-sm{
            text-align: -webkit-center;
        }
        div{
            padding:3px;
        }
        .card {
            padding: 1rem;
            margin-top: 1rem;
            background-color:#f7f7f7;
        }
        form{
            text-align: left;
        }
	</style> 
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <h3>Formulir Data Pembeli</h3>
                    <form action="shopping_page.php?content=end_transaction.php" method="post" enctype="multipart/form-data"> 
                        <div>
                            <label>Nama </label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div>
                            <label>No Telepon </label>
                            <input type="text" name="noTelepon" class="form-control">
                        </div>
                        <div>
                            <label>Alamat </label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Kecamatan </label>
                                <input type="text" name="kecamatan" class="form-control">
                            </div>
                            <div class="col">
                                <label>Kota </label>
                                <input type="text" name="kota" class="form-control">
                                
                            </div>
                            <div class="col">
                                <label>Kode Pos </label>
                                <input type="text" name="kodePos" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                            <label>Kode Pos Tujuan </label><br>
                            <select class="form-select form-select-lg mb-3" name="kodePosTujuan" id="kodePosTujuan">
                                    <option></option>
                                        <?php
                                            include 'database_connection.php';

                                            $sql = "SELECT * FROM ongkir";
                                            $result = $koneksi->query($sql);
                                            
                                            // output data of each row
                                            while($data = $result->fetch_assoc()) {
                                                    echo '<option>'.$data['kodePosTujuan'].'</option>';
                                                }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="ongkir">
                                <?php
                                if(!isset($_GET['ongkir'])){
                                }
                                else{
                                    $page = $_GET['ongkir'];
                                    include $page;
                                }
                                ?>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit" value="Tambah data">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="padding:0rem">
                    <h3 style="padding:1rem;">Data Produk</h3>
                    <?php include'cart.php';?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>