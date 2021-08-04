<!-- Membuat Combobox Statis
Combobox statis adalah combobox yang isinya tetap dan tidak berubah-ubah kerena 
isinya ditulis melalui hardcode. Berikut adalah cara membuat combobox statis : -->


<!-- <select class="form-control" name="combo1" id="combo1">
	<option value="">Pilih Combobox Statis</option>
	<option value="Nama Provinsi 1">Nama Provinsi 1</option>
	<option value="Nama Provinsi 2">Nama Provinsi 2</option>
	<option value="Nama Provinsi 3">Nama Provinsi 3</option>
	<option value="Nama Provinsi 4">Nama Provinsi 4</option>
	<option value="Nama Provinsi 5">Nama Provinsi 5</option>
</select> -->


<!-- Membuat Combobox dengan PHP

Selanjutnya saya akan memberikan cara menampilkan data dari database ke dalam 
combobox menggunakan PHP dengan cara standar. Karena kita mengambil datanya 
dari database jadi nantinya isinya akan dinamis dan dapat berubah-ubah jika 
isi dalam database berubah. Berikut adalah cara standar yang biasa digunakan pada PHP :

1. Pertama yang WAJIB ada yaitu sobat harus membuat sebuah database. 
Sobat bisa menggunakan tools bantu seperti navicat, heidi SQL atau lainnya. 
Sobat juga bisa membuatnya dengan mengakses url localhost/phpmyadmin -> 
klik tab Database dan tuliskan db_dewankomputer-> Klik tombol Create/Buat. -->

<!-- 2. Buat tabelnya untuk mengetesnya dengan query dibawah ini -->
	
<!-- CREATE TABLE `provinsi`  (
  `id_prov` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_prov`) USING BTREE
) -->

<!-- 3. Isikan tabel provinsi dengan data dibawah ini untuk memudahkan pengetesan -->

<!-- INSERT INTO `provinsi` VALUES ('11', 'Aceh');
INSERT INTO `provinsi` VALUES ('12', 'Sumatera Utara');
INSERT INTO `provinsi` VALUES ('13', 'Sumatera Barat');
INSERT INTO `provinsi` VALUES ('14', 'Riau');
INSERT INTO `provinsi` VALUES ('15', 'Jambi');
INSERT INTO `provinsi` VALUES ('16', 'Sumatera Selatan');
INSERT INTO `provinsi` VALUES ('17', 'Bengkulu');
INSERT INTO `provinsi` VALUES ('18', 'Lampung');
INSERT INTO `provinsi` VALUES ('19', 'Kepulauan Bangka Belitung');
INSERT INTO `provinsi` VALUES ('21', 'Kepulauan Riau');
INSERT INTO `provinsi` VALUES ('31', 'DKI Jakarta');
INSERT INTO `provinsi` VALUES ('32', 'Jawa Barat');
INSERT INTO `provinsi` VALUES ('33', 'Jawa Tengah');
INSERT INTO `provinsi` VALUES ('34', 'DI Yogyakarta');
INSERT INTO `provinsi` VALUES ('35', 'Jawa Timur');
INSERT INTO `provinsi` VALUES ('36', 'Banten');
INSERT INTO `provinsi` VALUES ('51', 'Bali');
INSERT INTO `provinsi` VALUES ('52', 'Nusa Tenggara Barat');
INSERT INTO `provinsi` VALUES ('53', 'Nusa Tenggara Timur');
INSERT INTO `provinsi` VALUES ('61', 'Kalimantan Barat');
INSERT INTO `provinsi` VALUES ('62', 'Kalimantan Tengah');
INSERT INTO `provinsi` VALUES ('63', 'Kalimantan Selatan');
INSERT INTO `provinsi` VALUES ('64', 'Kalimantan Timur');
INSERT INTO `provinsi` VALUES ('65', 'Kalimantan Utara');
INSERT INTO `provinsi` VALUES ('71', 'Sulawesi Utara');
INSERT INTO `provinsi` VALUES ('72', 'Sulawesi Tengah');
INSERT INTO `provinsi` VALUES ('73', 'Sulawesi Selatan');
INSERT INTO `provinsi` VALUES ('74', 'Sulawesi Tenggara');
INSERT INTO `provinsi` VALUES ('75', 'Gorontalo');
INSERT INTO `provinsi` VALUES ('76', 'Sulawesi Barat');
INSERT INTO `provinsi` VALUES ('81', 'Maluku');
INSERT INTO `provinsi` VALUES ('82', 'Maluku Utara');
INSERT INTO `provinsi` VALUES ('91', 'Papua Barat');
INSERT INTO `provinsi` VALUES ('92', 'Papua'); -->

<!-- 4.Buat file koneksi.php yang berfugsi untuk menyambungkan aplikasi dengan 
database dan isikan dengan kode dibawah -->

 <?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_dewankomputer');
 
// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);
?>

<!-- isikan sesuai dengan host, user, password, dan nama database sobat. 
Untuk contoh di bawah ini saya berinama database dengan nama db_dewankomputer.

Jika sobat ingin tahu cara mengkoneksikan dengan dua database atau 
lebih dalam satu aplikasi maka sobat bisa kunjungi postingan dibawah ini

Cara Membuat Koneksi dengan Database MySQL bisa Dua atau Lebih Koneksi
database/Multiple Connection dalam Satu Host maupun beda Host -->

<!-- 5. Tulis kode html-nya seperti dibawah -->

<select class="form-control" name="combo2" id="combo2">
	<option value=""> Pilih Combo 1</option>
	<?php
		include 'koneksi.php';
		$query = "SELECT * FROM provinsi ORDER BY nama ASC";
		$dewan1 = $db1->prepare($query);
		$dewan1->execute();
		$res1 = $dewan1->get_result();
		while ($row = $res1->fetch_assoc()) {
				echo "<option value='" . $row['id_prov'] . "'>" . $row['nama'] . "</option>";
		}
	?>
</select>

<!-- Membuat Combobox dengan Ajax -->

<!-- Cara yang terakhir ini saya akan mencontohkan menggunakan javascript Ajax. 
Untuk actionnya sebenarnya bisa menggunakan api berbagai macam bahasa pemrograman 
ataupun framework. Namun pada contoh ini saya hanya menggunakan PHP standar. 
Untuk datanya sama saja seperti cara sebelumnya yaitu data provinsi. -->

<!-- 1. Pertama kita buat comboboxnya seperti dibawah ini -->
<div class="form-group">
	<label>Combobox dengan Javascript</label>
	<select class="form-control" name="combo3" id="combo3">
		<option value=""></option>
	</select>
</div>

	
<!-- <div class="form-group">
	<label>Combobox dengan Javascript</label>
	<select class="form-control" name="combo3" id="combo3">
		<option value=""></option>
	</select>
</div> -->

 

<!-- 2. Kemudian kita buat ajaxnya dengan menambahkan kode pada tag <script> seperti dibawah ini -->
<script type="text/javascript">
	$(document).ready(function(){
      	$.ajax({
            type: 'POST',
          	url: "get_provinsi.php",
          	cache: false, 
          	success: function(msg){
              $("#combo3").html(msg);
            }
        });
     });
</script>

	
<!-- <script type="text/javascript">
	$(document).ready(function(){
      	$.ajax({
            type: 'POST',
          	url: "get_provinsi.php",
          	cache: false, 
          	success: function(msg){
              $("#combo3").html(msg);
            }
        });
     });
</script> -->

 

<!-- 3. Kita buat file get_provinsi.php dan isikan dengan script dibawah ini
get_provinsi.php -->
<?php
	include 'koneksi.php';

	echo "<option value=''>Pilih Combo 2</option>";

	$query = "SELECT * FROM provinsi ORDER BY nama ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_prov'] . "'>" . $row['nama'] . "</option>";
	}
?>

	
<?php
	include 'koneksi.php';
 
	echo "<option value=''>Pilih Combo 2</option>";
 
	$query = "SELECT * FROM provinsi ORDER BY nama ASC";
	$dewan1 = $db1->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_prov'] . "'>" . $row['nama'] . "</option>";
	}
?>

<!-- Jika sudah benar maka hasilnya akan seperti dibawah -->

 

<!-- Pada contoh ini saya hanya akan mencontohkan mengisi combobox standar, namun jika sobat 
ingin membuat combobox bertingkat dimana saat provinsi terpilih maka combobox kabupaten 
akan terfilter sesuai provinsi yang dipilih akan saya posting pada postingan selanjutnya. 
Sekian postingan saya tentang Cara Membuat dan Mengisi Combobox dengan PHP dan Javascript. 
Jika ada salah kata saya mohon maaf dan jika ada
 pertanyaan silahkan tinggalkan pada kolom komentar dibawah. -->

 <!-- https://dewankomputer.com/2019/03/31/cara-membuat-dan-mengisi-combobox-dengan-php-dan-javascript/ -->