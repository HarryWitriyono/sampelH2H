<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Tagihan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Tagihan Akademik</h1>
  <form method="post">
  <div class="form-group row">
    <label for="KodeTagihan" class="col-4 col-form-label">Kode Tagihan</label> 
    <div class="col-8">
      <input id="KodeTagihan" name="KodeTagihan" type="text" class="form-control" required="required">
    </div>
  </div>  
  <div class="form-group row">
    <label for="NamaTagihan" class="col-4 col-form-label">Nama Tagihan</label> 
    <div class="col-8">
      <input id="NamaTagihan" name="NamaTagihan" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="BesarTagihan" class="col-4 col-form-label">Besar Tagihan</label> 
    <div class="col-8">
      <input id="BesarTagihan" name="BesarTagihan" type="text" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button name="cari" type="submit" class="btn btn-primary" formnovalidate formaction="hasilcaritagihan.php">Cari</button>
    </div>
  </div>
</form>
<?php if(isset($_POST['submit'])) {
  $KodeTagihan=filter_var($_POST['KodeTagihan'],FILTER_SANITIZE_STRING);
  $NamaTagihan=filter_var($_POST['NamaTagihan'],FILTER_SANITIZE_STRING);
  $BesarTagihan=filter_var($_POST['BesarTagihan'],FILTER_SANITIZE_STRING);
  include('koneksi.db.php');
  $sql="INSERT INTO `tagihan`(`IdTagihan`, `TglTagihan`, `NamaTagihan`, `BesarTagihan`) VALUES ('".$KodeTagihan."',now(),'".$NamaTagihan."','".$BesarTagihan."')";
  $q=mysqli_query($koneksi,$sql);
  $sql2="SELECT * FROM `mahasiswa`";
  $q2=mysqli_query($koneksi,$sql2);
  $r2=mysqli_fetch_array($q2);
  do {
    $sql3="INSERT INTO `transaksi`(`TglTransaksi`, `IdTagihan`, `NPM`, `BesarTransaksi`) VALUES (now(),'".$KodeTagihan."','".$r2['NPM']."','".$BesarTagihan."')";
    $q3=mysqli_query($koneksi,$sql3);
  } while($r2=mysqli_fetch_array($q2));
  if (($q) and ($q2) and ($q3)) {
    echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Sukses simpan.
      </div>';
  } else {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Gagal!</strong> Gagal simpan.
      </div>';
  }
}
?>
</div>
</body>
</html>