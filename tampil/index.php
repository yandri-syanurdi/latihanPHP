<?php
	$page = "Home";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page; ?></title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}

		#wrapper{
			width: 960px;
			margin: auto;
		}

		#header{
			background-color: red;
			height: 100px;
			padding: 5px;
			color: #ffffff;
		}

		#menu{
			background: blue;
			height: 50px;
		}

		#menu ul .active{
			text-decoration: underline;
		}

		#menu ul .active a{
			color: #ffff00;
		}

		#menu ul li{
			list-style: none;
			text-decoration: none;
			display: inline;
			margin: 0 85px;
			line-height: 50px;
		}

		#menu ul li a{
			color: #000000;
			text-decoration: none;
			text-transform: uppercase;
			color: #ffffff;
			font-weight: bold;
		}

		#content{
			padding: 5px;
			line-height: 20px;
			height: 300px;
		}

		#footer{
			background-color: green;
			height: 50px;
			text-align: center;
			color: #ffffff;
			line-height: 50px;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1>Simple Website</h1>
		</div> <!-- end of header -->

		<!-- Include Navigasi -->
		<?php
			include "navigasi.php";	
		?>
		
		<div id="content">
			<h2>Ini Halaman <?php echo $page; ?> (home.php)</h2>
		</div><!-- end of content -->
		<div id="footer">
			<p>Hak Cipta YELLOWWEB.ID | &copy; <?php echo date("Y");?></p>
		</div><!-- end fo footer -->  
	</div><!-- end of wrapper -->

</body>
</html>