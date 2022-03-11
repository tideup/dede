<?php
include "koneksi.php";
?>

<?php
  $x_tanggal  = mysqli_query($konek, 'SELECT tanggal FROM ( SELECT * FROM tabel_sensor ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  $y_suhu   = mysqli_query($konek, 'SELECT suhu FROM ( SELECT * FROM tabel_sensor ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  $y_kelembaban   = mysqli_query($konek, 'SELECT kelembaban FROM ( SELECT * FROM tabel_sensor ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Grafik Realtime Accelerometer</h3>
    </div>

    <div class="panel-body">
      <canvas id="myChart"></canvas>
      <script>
       var canvas = document.getElementById('myChart');
        var data = {
            labels: [<?php while ($b = mysqli_fetch_array($x_tanggal)) { echo '"' . $b['tanggal'] . '",';}?>],
            datasets: [
            {
                label: "Sumbu X",
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(105, 0, 132, .2)",
                borderColor: "rgba(200, 99, 132, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(200, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($y_suhu)) { echo  $b['suhu'] . ',';}?>],
            },
            {
                label: "Sumbu Y", 
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(0, 137, 132, .2)",
                borderColor: "rgba(0, 10, 130, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(0, 10, 130, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($y_kelembaban)) { echo  $b['kelembaban'] . ',';}?>],
            }
            ]
        };

        var option = 
        {
          showLines: true,
          animation: {duration: 10}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

      </script>          
    </div>    
  </div>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Tabel Grafik Accelerometer</h3>
    </div>
    <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>Tanggal</th>
            <th class='text-center'>Sumbu Y</th>
            <th class='text-center'>Sumbu X</th>
          </tr>
        </thead>
        
        <tbody>
          <?php

            $sqlAdmin = mysqli_query($konek, "SELECT tanggal,suhu,kelembaban FROM tabel_sensor ORDER BY ID DESC LIMIT 0,20");
            while($data=mysqli_fetch_array($sqlAdmin))
            {
              echo "<tr >
                <td><center>$data[tanggal]</center></td> 
                <td><center>$data[suhu]</td>
                <td><center>$data[kelembaban]</td>
              </tr>";
            }
          ?>
        </tbody>
      </table>   
    </div>
  </div>