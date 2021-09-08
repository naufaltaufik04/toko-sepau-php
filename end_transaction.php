<?php
    include'database_connection.php';

    $nama = $_POST['nama'];
    $noTelepon = $_POST['noTelepon'];
    $alamat = $_POST['alamat'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $kodePos = $_POST['kodePos'];
    $kodePosTujuan = $_POST['kodePosTujuan'];
    $date = date("Y-m-d");
    $totalHarga = $_SESSION['totalHarga'];


    // ============= Tambah ke tabel transaksi ============= 
    $insert = "INSERT INTO transaksi (tanggal, nama_pembeli, no_telepon, alamat, kecamatan, kota, kode_pos, total_jual)
    VALUES(
        '$date', 
        '$nama', 
        '$noTelepon', 
        '$alamat', 
        '$kecamatan', 
        '$kota', 
        '$kodePos',
        '$totalHarga'
    )";
    $result  = mysqli_query($koneksi, $insert);

    if($result){
       //============= Tambah ke tabel jual ============= 
        $selectTransaksi = "SELECT * from transaksi";
        $data = mysqli_query($koneksi, $selectTransaksi);
        while($d = mysqli_fetch_array($data)){
            if($d['nama_pembeli'] == $nama){
                $noTransaksi = $d['no_transaksi'];
            }
        }

        for($i=0; $i<sizeof($_SESSION['tipeSepatu']); $i++){
            $tipeSepatu = $_SESSION['tipeSepatu'][$i];
            $warnaSepatu = $_SESSION['warnaSepatu'][$i];
            $ukuranSepatu = $_SESSION['ukuranSepatu'][$i];
            $hargaSepatu = $_SESSION['hargaSepatu'][$i];
            $banyakSepatu = $_SESSION['banyakSepatu'][$i];
            $result  = mysqli_query($koneksi, "INSERT INTO `jual` (`no_transaksi`, `tipe_sepatu`, `warna_sepatu`, `ukuran_sepatu`, `jumlah_jual`, `harga_sepatu`) 
                VALUES (
                    '$noTransaksi',
                    '$tipeSepatu',
                    '$warnaSepatu',
                    '$ukuranSepatu',
                    '$banyakSepatu',
                    '$hargaSepatu')");
        }
        
        if($result){
            // =============  Update stok tabel detail_sepatu ============= 
            $selectDetail = "SELECT * from detail_sepatu";
            $dataDetail = mysqli_query($koneksi, $selectDetail);

            while($data = mysqli_fetch_array($dataDetail)){
                for($i=0; $i<sizeof($_SESSION['tipeSepatu']); $i++){
                    if($data['tipe_sepatu'] == $_SESSION['tipeSepatu'][$i]
                     && $data['warna'] == $_SESSION['warnaSepatu'][$i]
                     && $data['ukuran'] == $_SESSION['ukuranSepatu'][$i]){
                        $sisaStok = $data['stok'] - $_SESSION['banyakSepatu'][$i];
                        
                        $tipeSepatu = $_SESSION['tipeSepatu'][$i];
                        $warnaSepatu = $_SESSION['warnaSepatu'][$i];
                        $ukuranSepatu = $_SESSION['ukuranSepatu'][$i];

                        // echo $tipeSepatu;
                        // echo $warnaSepatu;
                        // echo $ukuranSepatu;

                        $update = "UPDATE detail_sepatu SET stok = '$sisaStok' WHERE 
                            tipe_sepatu = '$tipeSepatu'
                            AND warna = '$warnaSepatu'
                            AND ukuran = $ukuranSepatu";
                        $result = $koneksi->query($update);
                    }
                }   
            }
            if($result){
                //Hitung berat total
                if ($_SESSION['beratTotal'] < 1){
                    $beratTotal = 1;
                }else{
                    if(is_float($_SESSION['beratTotal'])){
                        $split = explode(".",$_SESSION['beratTotal']);
                        if($split[1] > (3 * pow(10, strlen($split[1])-1))){
                            $beratTotal = $split[0] + 1;
                        }else{
                            $beratTotal = $split[0];
                        }
                    }else{
                        $beratTotal = $_SESSION['beratTotal'];
                    }
                }

                //Tampilkan data ongkir
                //============= Tambah ke tabel jual ============= 
                $cariKodePos = "SELECT * from ongkir";
                $data = mysqli_query($koneksi, $cariKodePos);
                while($d = mysqli_fetch_array($data)){
                    if($d['kodePosAwal'] == $kodePos){
                        if($d['kodePosTujuan'] == $kodePosTujuan){
                            $ongkir = $d['ongkosKirim'];
                            $totalOngkir = $d['ongkosKirim'] * $beratTotal;
                        }
                    }
                }
                
                echo "Total Harga: Rp." .  $totalHarga . "<br>";
                echo "Total berat: " . $_SESSION['beratTotal'] . "kg ". "(" . $beratTotal . "kg)" . "<br>";
                echo "Kode pos Awal: " . $kodePos . "<br>";
                echo "Kode pos Tujuan: " . $kodePosTujuan . "<br>";
                echo "Ongkir: Rp" . $ongkir  . "<br>";
                echo "Total Ongkir: Rp" . $totalOngkir . "<br><br>";
                echo "Total Harga Transaksi: Rp" . ($totalHarga + $totalOngkir);
            }
        }

    }else{
        echo"gagal";
    }

?>