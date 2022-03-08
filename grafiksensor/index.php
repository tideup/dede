<!DOCTYPE html>
<html>
<head>
	<title>Grafik Akselerometer</title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="jquery-latest.js"></script>

	<!-- memanggil data grafik -->
	<script type="text/javascript">
		var refreshid = setInterval(function(){
			$('#responsecontainer').load('data.php')
		}, 1000);
	</script>
</head>
<body>

	<!-- tempat untuk tampilan grafik  -->
	<div class="container" style="text-align: center;" >
		<h3>Grafik Realtime Accelerometer</h3>
		<p>(Data yg ditampilkan adalah 5 data terakhir)</p>
	</div>

	<!-- div grafik -->
	<div class="container">
		<div class="container" id="responsecontainer" style=" width: 100%; text-align: center;"></div>
	</div>

	<!-- Pemanis gambar -->
	<div class="container" style="text-align: center;">
		<img src="assets/img/xaa.png">
	</div>
</body>
</html>