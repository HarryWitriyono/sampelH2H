<?php 
$data=file_get_contents('http://localhost/gudangkita/wsjsongudangbarang.php');
$arrahhasil=json_decode($data);
echo '<br>Hasil Array : <br>';
foreach($arrahhasil as $k) {
    echo 'Kode Barang : '.$k->KodeBarang."<br>";
    echo 'Nama Barang : '.$k->NamaBarang."<br>";
    echo 'Waktu Transaksi : '.$k->WaktuTransaksi."<br>";
    echo 'Status Transaksi : '.$k->StatusTransaksi."<br>";
    echo 'Jumlah : '.$k->Jumlah."<br>";
    echo 'Lokasi Gudang : '.$k->Alamat."<br>";
}