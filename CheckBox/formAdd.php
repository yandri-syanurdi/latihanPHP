<?php
  include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div align="center">
    <h3><b>Form Tambah Data</b></h3>
    <form method="POST">
      <table>
        <tr>
        <td width="60px" valign="top">Nama</td>
        <td valign="top"> 
         <input type="text" name="nama" id="nama">
        </td>
       </tr>
       <tr>
        <td width="60px" valign="top">Hobi</td>
        <td valign="top"> 
         <label><input type="checkbox" name="hobi[]" value="Nonton">Nonton</label><br>
         <label><input type="checkbox" name="hobi[]" value="Menulis">Menulis</label><br>
         <label><input type="checkbox" name="hobi[]" value="Traveling">Traveling</label><br>
         <label><input type="checkbox" name="hobi[]" value="Otomotif">Otomotif</label><br>
         <label><input type="checkbox" name="hobi[]" value="Fotografi">Fotografi</label><br>
         <label><input type="checkbox" name="hobi[]" value="Programming">Programming</label>
        </td>
       </tr>
       <tr>
        <td width="60px" valign="top"></td>
        <td valign="top"> 
         <input type="submit" name="simpan" value="Simpan">
         <a href="index.php">Kembali</a>
        </td>
       </tr>
      </table>
     </form>
      <?php
        if (isset($_POST['simpan'])) {
          $nama = $_POST['nama'];
          $hobi = implode(",", $_POST['hobi']);
          $query=mysql_query("INSERT INTO siswa(nama, hobi) VALUES('$nama','$hobi')");  
          if ($query) {
             header("location:index.php");
           } 
        }
       ?>
  </div>
</body>
</html>