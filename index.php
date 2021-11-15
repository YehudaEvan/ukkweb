<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Buku</title>
    <style type="text/css">
      * {
        font-family: "sans-serif";
      }
      h1 {
        text-transform: uppercase;
        color: #fff;
      }
    table {
      border: solid 1px #3A3B3C;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
      border-radius: 10px;
    }
    table thead th {
        background-color: #3A3B3C;
        border: solid 1px #fff;
        color: #fff;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
        border-radius: 10px;
    }
    table tbody td {
        border: solid 1px #3A3B3C;
        color: #fff;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
        border-radius: 10px;
    }
    a {
          background-color: #3A3B3C;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border-radius: 10px;
    }
    body {
        background-color: #000;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Buku</h1><center>
    <center><a href="tambah_buku.php">+ &nbsp; Tambah Buku</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Bukuk</th>
          <th>Dekripsi</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM buku ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      $no = 1; 
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_buku']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 100); ?></td>
          <td><?php echo $row['pengarang']; ?></td>
          <td><?php echo $row['penerbit']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_buku']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_buku.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus buku ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; 
      }
      ?>
    </tbody>
    </table>
  </body>
  <body>
    <center><a href="logout.php">+ &nbsp;Log out</a><center>
</html>
