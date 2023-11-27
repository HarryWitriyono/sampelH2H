<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Form Mahasiswa Baru</h1>
  <form method="post">
  <div class="form-group row">
    <label for="NPM" class="col-4 col-form-label">NPM</label> 
    <div class="col-8">
      <input id="NPM" name="NPM" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaMahasiswa" class="col-4 col-form-label">Nama Mahasiswa</label> 
    <div class="col-8">
      <input id="NamaMahasiswa" name="NamaMahasiswa" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="Password" name="Password" type="password" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="ProgramStudi" class="col-4 col-form-label">Program Studi</label> 
    <div class="col-8">
      <select id="ProgramStudi" name="ProgramStudi" class="custom-select">
        <option value="55201">Teknik Informatika</option>
        <option value="54201">Sistem Informasi</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button name="cari" type="submit" class="btn btn-primary" formnovalidate formaction="hasilcarimahasiswa.php">Cari</button>
    </div>
  </div>
</form>
<?php 
if (isset($_POST['submit'])) {
    $NPM=filter_var($_POST['NPM'],FILTER_SANITIZE_STRING);
    $NamaMahasiswa=filter_var($_POST['NamaMahasiswa'],FILTER_SANITIZE_STRING);
    $Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
    $ProgramStudi=filter_var($_POST['ProgramStudi'],FILTER_SANITIZE_STRING);
    include('koneksi.db.php');
    $sql="INSERT INTO `mahasiswa`(`NPM`, `NamaMahasiswa`, `Password`, `TglDaftar`, `ProgramStudi`) VALUES ('".$NPM."','".$NamaMahasiswa."','".$Password."',now(),'".$ProgramStudi."')";
    $q=mysqli_query($koneksi,$sql);
    mysqli_close($koneksi);
    if ($q) {
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