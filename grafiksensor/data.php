<?php 
	// koneksi database
	$konek = mysqli_connect("localhost", "root", "", "grafiksensor");

	// baca data dr tabel tb_sensor
	// baca formasi tanggal untuk semua data
	$tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor ORDER BY ID ASC");
	// baca informasi suhu semua data
	$suhu = mysqli_query($konek, "SELECT suhu FROM tb_sensor ORDER BY ID ASC");
  ?> 


  <div class="panel panel-primary">
 	<div class="panel-heading">
 		GRAFIK AKSELEROMETER
 	</div>

 	<div class="panel-body">
 		<!-- canvas untuk grafik -->
 		<canvas id="myChart"></canvas>
 		<!-- gambar grafik -->
 		<script type="text/javascript">
 			//baca ID canvas tempat grafik akan diletakan
 			var canvas = document.getElementById('myChart');
 			// letakkan data tanggal dan x value data grafik
 			var data = {
 				labels : [
 					<?php 
 						while($data_tanggal = mysqli_fetch_array($tanggal))
 						{
 							echo '"'.$data_tanggal['tanggal'].'",' ;
 						}

 					 ?>
 				], 
 				datasets : [{
 					label : "Suhu", 
 					fill: true 
 					backgroundColor: "rgba(138,240,133, .2"
 					data : [
 						<?php 
 							while($data_suhu = mysqli_fetch_array($suhu))
 							{
 								echo $data_suhu['suhu'].',' ;
  							}
 						 ?>
 					]
 				}]
 			} ;

 			// opsi grafik
 			var option = {
 				showLines : true,
 				animation : {duration : 0}
 			} ;

 			// cetak grafik ke dalam kanvas
 			var myLineChart = Chart.line(canvas, {
 				data : data, 
 				options : option
 			}) ;

 		</script>		
 	</div>
 </div>