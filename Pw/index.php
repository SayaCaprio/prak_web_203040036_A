<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buku</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: maroon;
      }
    table {
      background-color:	#C0C0C0;
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 35px;
        /*text-shadow: 1px 1px 1px #fff;*/
    }
    a {
          background-color: salmon;
          color: black;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Buku</h1><center><br>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
    <br/>
    <table>
      <thead>
        <tr>

          <th style="text-align: center">id buku</th>
          <th style="text-align: center">Nama Buku</th>
          <th style="text-align: center">Penulis</th>
          <th style="text-align: center">Gambar</th>
          <th style="text-align: center">Harga</th>
          <th style="text-align: center">Aksi</th>
          

        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM buku ";
      $result = mysqli_query($koneksi, $query); 
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td style="text-align: center"><?php echo $row['id_buku']; ?></td>
           <td style="text-align: center"><?php echo $row['nama_buku']; ?></td>
           <td style="text-align: center"><?php echo $row['penulis']; ?></td>
          <td style="text-align: center;"><img src="assets/img/<?php echo $row['gambar']; ?>" style="width: 150px;"></td>
          <td style="text-align: center">Rp.<?php echo $row['harga_buku']; ?></td>
          <td>
              <a class='btn btn-primary btn-sm' href="edit_produk.php?id=<?php echo $row['id_buku']; ?>">Update Data</a> |
              <a class='btn btn-danger btn-sm' href="proses_hapus.php?id=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus Data</a> |
              <a class='btn btn-warning btn-sm' href="edit_produk.php?id=<?php echo $row['id_buku']; ?>">Lihat Data Details</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>