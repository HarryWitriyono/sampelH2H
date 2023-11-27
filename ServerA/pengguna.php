<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<div class="container">
  <h1>Pengguna</h1>
  <form method="post">
  <div class="form-group row">
    <label for="KodePengguna" class="col-4 col-form-label">Kode Pengguna</label> 
    <div class="col-8">
      <input id="KodePengguna" name="KodePengguna" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaPengguna" class="col-4 col-form-label">Nama Pengguna</label> 
    <div class="col-8">
      <input id="NamaPengguna" name="NamaPengguna" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="Password" name="Password" type="password" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Level" class="col-4 col-form-label">Level</label> 
    <div class="col-8">
      <select id="Level" name="Level" class="custom-select" required="required">
        <option value="Petugas">Petugas</option>
        <option value="Kepala">Kepala</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button name="cari" type="submit" class="btn btn-primary" formnovalidate formaction="hasilcaripengguna.php">Cari</button>
    </div>
  </div>
</form>
<?php 
if (isset($_POST['submit'])) {
    $KodePengguna=filter_var($_POST['KodePengguna'],FILTER_SANITIZE_STRING);
    $NamaPengguna=filter_var($_POST['NamaPengguna'],FILTER_SANITIZE_STRING);
    $Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
    $Level=filter_var($_POST['Level'],FILTER_SANITIZE_STRING);
    include('koneksi.db.php');
    $sql="INSERT INTO `pengguna`(`KodePengguna`, `NamaPengguna`, `Password`, `Level`) VALUES ('".$KodePengguna."','".$NamaPengguna."','".$Password."','".$Level."')";
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
