<?php
  include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
 <title>Mari Belajar Coding</title>
</head>
<body>
  <div align="center">
    <h3><b>Membuat CRUD Checkbox Menggunakan PHP MySQL<br>Maribelajarcoding.com </b></h3>

    <a href="formAdd.php">Tambah Data</a>
    <br><br>
     <!--menampilkan data di tabel-->
     <table border="1" width="700px">
      <tr>
       <th width="10%">No</th>
       <th width="35%">Nama</th>
       <th>Hobi</th>
       <th width="20%"></th>
      </tr>
      <?php
      $i=1;
      $sql=mysql_query("SELECT * FROM siswa");
      while ($data=mysql_fetch_array($sql)) {
      ?>
       <tr>
        <td><?=$i++;?></td>
        <td><?=$data['nama']?></td>
        <td><?=$data['hobi']?></td>
        <td><a href="formEdit.php?id=<?=$data['SiswaID']?>">Edit</a> || <a href="delete.php?id=<?=$data['SiswaID']?>">Hapus</a></td>
       </tr>
      <?php 
      }
      ?>  
     </table>
  </div>
</body>
</html>