<?php
  include('koneksi.php');
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Buku</title>
    <style type="text/css">
      * {
        font-family: "Red Hat Mono";
      }
      h1 {
        text-transform: uppercase;
        color: #fff;
      }
    button {
          background-color: #3A3B3C;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          text-shadow: black;
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
      border-radius: 10px;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #3A3B3C;
      border: 2px solid #000;
      outline-color: #3A3B3C;
      border-radius: 10px;
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
      background: #fff;
      border-radius: 25px;
    }
    body {
        background-color: #000;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Buku</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama Buku</label>
          <input type="text" name="nama_buku" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" required="" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" />
        </div>
        <div>
          <label>Gambar Buku</label>
         <input type="file" name="gambar_buku" required="" />
        </div>
        <div>
         <button type="submit">Simpan Buku</button>
        </div>
        </section>
      </form>
  </body>
</html>