<?php
include 'koneksi.php';

  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM buku WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Buku</title>
    <style type="text/css">
      * {
        font-family: "Roboto";
      }
      h1 {
        text-transform: uppercase;
        color: #fff;
      }
    button {
          background-color: #000;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
          border-radius: 10px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
      color: #fff;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #fff;
      border: 2px solid #000;
      outline-color: #000;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #3A3B3C;
    }
    body {
        background-color: black;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Buku <?php echo $data['nama_buku']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Buku</label>
          <input type="text" name="nama_buku" value="<?php echo $data['nama_buku']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" required=""value="<?php echo $data['pengarang']; ?>" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" value="<?php echo $data['penerbit']; ?>"/>
        </div>
        <div>
          <label>Gambar Buku</label>
          <img src="gambar/<?php echo $data['gambar_buku']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_buku" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar buku</i>
        </div>
        <div>
         <button type="submit">Simpan</button>
        </div>
        </section>
      </form>
  </body>
</html>