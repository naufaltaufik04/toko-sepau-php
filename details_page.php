<?php
    if(isset($_GET['tipeSepatu'])){
        $tipeSepatu = $_GET['tipeSepatu'];
    }
    if(isset($_GET['warnaSepatu'])){
       $warnaSepatu = $_GET['warnaSepatu'];
    }
    if(isset($_GET['ukuranSepatu'])){
        $ukuranSepatu = $_GET['ukuranSepatu'];
    }


    //Get harga berdasarkan tipe sepatu, warna, dan ukuran yang dipilih
    include 'database_connection.php';
    $selectUkuranSepatu = "SELECT * FROM detail_sepatu WHERE tipe_sepatu = '$tipeSepatu' AND warna = '$warnaSepatu' ORDER BY ukuran DESC";
    $result = $koneksi->query($selectUkuranSepatu);                        
    while($data = $result->fetch_assoc()){
        if($data['ukuran'] == $ukuranSepatu){
            $ukuranTersedia = true;
            break;
        }
        else{
            $ukuranTemp = $data['ukuran'];
            $ukuranTersedia = false;
        }
    }

    if(!$ukuranTersedia){
        $ukuranSepatu = $ukuranTemp;
    }

    //Get harga berdasarkan tipe sepatu, warna, dan ukuran yang dipilih
    include 'database_connection.php';
    $selectHargaSepatu = "SELECT * FROM detail_sepatu WHERE tipe_sepatu = '$tipeSepatu'";
    $result = $koneksi->query($selectHargaSepatu);                        
    while($data = $result->fetch_assoc()){
        if($data['warna'] == $warnaSepatu){
            if($data['ukuran'] == $ukuranSepatu){
                $hargaSepatu = $data['harga'];

                $beratSepatu = $data['berat'];
            }
        }
    }

    $inStok = "";
?>
<body>
	<style>
    
/*****************globals*************/
body {
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }
        
.card {
  margin-top: 0px;
  background: white;
  padding: 0em;
  line-height: 2em; }

.btn-orange {
  background: #ff9f1a; 
  color: white;
  height:50px;
  font-size:20px;}

.details{
    padding-top:5rem;
}
    </style>

	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
                          <img src="assets/<?php echo $tipeSepatu?>+<?php echo $warnaSepatu?>.jpg"/>
                          <!-- image by: https://www.adidas.com/us/ -->
					</div>

					<div class="details col-md-6" style="padding:2rem 0rem 2rem 2rem;">
						<h1 class="product-title">Adidas <?php echo $tipeSepatu;?></h1>						
						<p class="product-description">Sepatu Adidas bertipe <?php echo $tipeSepatu;?> Warna <?php echo $warnaSepatu;?></p>
						<h4 class="price">Harga: <span>Rp.<?php echo $hargaSepatu?></span></h4>
                        <h4 class="stocks">
                            <?php 
                                include'database_connection.php';
                                $selectDetailSepatu = "SELECT * FROM detail_sepatu 
                                    WHERE tipe_sepatu = '$tipeSepatu' AND warna = '$warnaSepatu' AND ukuran = '$ukuranSepatu' ";
                                $resultDetail = $koneksi->query($selectDetailSepatu);
                        
                                while($dataDetail = $resultDetail->fetch_assoc()){
                                    if($dataDetail['stok'] > 0){
                                        echo '<h4 style="color:#7ec17e;">Stok: '. $dataDetail['stok']. '</h4>';
                                        break;
                                    }else{
                                        echo '<h4 style="color:red;">Stok tidak tersedia</h4>';
                                        $inStok = "disabled";
                                    }
                                }
                            ?>
                        </h4>
						<h5 class="colors" style="padding-top:1rem">Warna:
                            <div class="dropdown">
                                <button class="btn dropdown-toggle btn-orange" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $warnaSepatu?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php
                                    include'database_connection.php';
                                    $selectDetailSepatu = "SELECT * FROM detail_sepatu WHERE tipe_sepatu = '$tipeSepatu' ORDER BY warna ASC";
                                    $resultDetail = $koneksi->query($selectDetailSepatu);
                            
                                    $temp = "";
                                    while($dataDetail = $resultDetail->fetch_assoc()){
                                        if($dataDetail['warna'] != $temp){
                                            echo '<a class="dropdown-item"
                                                href="shopping_page.php?content=details_page.php'.
                                                    '&tipeSepatu='. $tipeSepatu. 
                                                    '&warnaSepatu=' . $dataDetail['warna'] . 
                                                    '&ukuranSepatu='. $ukuranSepatu .'">' 
                                                .$dataDetail['warna'] . '</a>';
                                            $temp = $dataDetail['warna'];
                                        }
                                    }
                                ?>
                                </ul>
                            </div>
                        <h5 class="sizes">Ukuran:
                        <div class="dropdown">
                                <button class="btn dropdown-toggle btn-orange" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $ukuranSepatu;?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php
                                    include'database_connection.php';
                                    $selectDetailSepatu = "SELECT * FROM detail_sepatu WHERE tipe_sepatu = '$tipeSepatu' AND warna = '$warnaSepatu'";
                                    $resultDetail = $koneksi->query($selectDetailSepatu);
                            
                                    $temp = "";
                                    while($dataDetail = $resultDetail->fetch_assoc()){
                                        if($dataDetail['ukuran'] != $temp){
                                            echo '<a class="dropdown-item"
                                            href="shopping_page.php?content=details_page.php'.
                                            '&tipeSepatu='. $tipeSepatu. 
                                            '&warnaSepatu=' . $warnaSepatu . 
                                            '&ukuranSepatu='. $dataDetail['ukuran'] .'">' 
                                            .$dataDetail['ukuran'] . '</a>';
                                            
                                            $temp = $dataDetail['ukuran'];
                                        }
                                    }
                                ?>
                                </ul>
                            </div>
						</h5>
						</h5>
						<div class="addToCart">
                            <a href="add_item.php?tipeSepatu=<?php echo $tipeSepatu?>&warnaSepatu=<?php echo $warnaSepatu?>&ukuranSepatu=<?php echo $ukuranSepatu?>&hargaSepatu=<?php echo $hargaSepatu?>&beratSepatu=<?php echo $beratSepatu;?>" 
                                style="margin-top:40px;" 
                                class="btn btn-orange <?php echo $inStok;?>" 
                                role="button" aria-disabled="true">
                                Tambah Ke Keranjang
                            </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>

