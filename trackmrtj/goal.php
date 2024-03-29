<?php include "header.php";?>
<!-- Begin page content -->
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><center>Logger</h3>
    </div>
    
    <?php
    if(isset($_GET['sdate']) || isset($_GET['edate']))
    {
      
      $sdate = $_GET['sdate'];
      $edate = $_GET['edate'];	
      $sqlAdmin = mysqli_query($konek, "SELECT ID,suhu,kelembaban,tanggal FROM tabel_sensor WHERE tanggal BETWEEN ' $sdate ' AND ' $edate ' ORDER BY ID DESC LIMIT 0,100");
    }
    else
    {
      $sqlAdmin = mysqli_query($konek, "SELECT ID,suhu,kelembaban,tanggal FROM grafiksensor ORDER BY ID DESC LIMIT 0,100");
    }
    ?>

    <div class="panel-body">
      <form class="form-horizontal" method="GET">  
        <div class="form-group">
          <label class="col-md-2">Dari tanggal</label>   
          <div class="col-md-2">
            <input type="date" name="sdate" class="form-control" value="<?php echo $sdate; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2">sampai tanggal</label>   
          <div class="col-md-2">
            <input type="date" name="edate" class="form-control" value="<?php echo $edate; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2"></label>   
          <div class="col-md-8">
            <input type="submit" class="btn btn-primary" value="Filter">
            <a href='goal.php'  class='btn btn-warning btn-sm'>Reset</a>
          </div>
        </div>
      </form>

      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>ID</th>
            <th class='text-center'>Tanggal</th>
            <th class='text-center'>Sumbu X</th>
            <th class='text-center'>Sumbu Y</th>    
          </tr>
        </thead>
        <tbody>
          <?php
            
          while($data=mysqli_fetch_array($sqlAdmin))
          {
            echo "<tr >
            <td><center>$data[ID]</td>
            <td><center>$data[suhu]</center></td> 
            <td><center>$data[kelembaban]</td>
            <td><center>$data[tanggal]</td>              
            </tr>";
          }
          ?>
        </tbody>
      </table> 
    </div>
  </div>
</div>
<?php include "footer.php"; ?>