<?php 
if (isset($_GET['NPM'])) {
    include('../servera/koneksi.db.php');
    $NPM=filter_var($_GET['NPM'],FILTER_SANITIZE_STRING);
    $sql="select NPM,NamaMahasiswa from mahasiswa where NPM='".$NPM."'";
    $q=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_array($q);
    $hasil=array();
    do {
        $hasil= $r;
    }while($r=mysqli_fetch_array($q));
    $hasil=json_encode($hasil);
    echo $hasil;
    mysqli_close($koneksi);
} 
