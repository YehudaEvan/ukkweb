<?php
include 'koneksi.php';

  $id = $_POST['id'];
  $nama_buku   = $_POST['nama_buku'];
  $deskripsi     = $_POST['deskripsi'];
  $pengarang    = $_POST['pengarang'];
  $penerbit    = $_POST['penerbit'];
  $gambar_buku = $_FILES['gambar_buku']['name'];
  if($gambar_buku != "") {
    $ekstensi_diperbolehkan = array('png','jpg');  
    $x = explode('.', $gambar_buku); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_buku']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_buku; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 
                      
                   $query  = "UPDATE buku SET nama_buku = '$nama_buku', deskripsi = '$deskripsi', pengarang = '$pengarang', penerbit = '$penerbit', gambar_buku = '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_buku.php';</script>";
              }
    } else {
      $query  = "UPDATE buku SET nama_buku = '$nama_buku', deskripsi = '$deskripsi', pengarang = '$pengarang', penerbit = '$penerbit'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }