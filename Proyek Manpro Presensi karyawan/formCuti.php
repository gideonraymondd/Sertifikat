<?php
    include "conn.php";
    
    $tipe="";
    if (isset($_GET["tipe"]))
    {
        $tipe=mysqli_real_escape_string($conn,$_GET["tipe"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/layout.css">
    <style>
        .row {
            padding-top: 10px;
        }
    </style>

    <script type="text/javascript">
        function button_alert() {
            alert("Form cuti telah berhasil diajukan");
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="Foto/UKP.png">
            </div>
            <ul class="list-unstyled components">
                <p style="opacity: 60%;">DASHBOARD</p>
                <li>
                    <a href="./home.html">Home</a>
                </li>
                <li>
                    <a href="./profilePegawai.php">Profile</a>
                </li>
                <li>
                    <a href="./absensi.php">Absensi</a>
                </li>
                <li>
                    <a href="./ijinCuti.php">Ijin Cuti</a>
                </li>
                <li>
                    <a href="./ijinSakit.php">Ijin Sakit</a>
                </li>
            </ul>
            <a href="./login.php">
                <button type="button" id="sidebarCollapse" class="btn btn-info">LOG OUT</button>
            </a>
        </nav>
    </div>
    <div class="container" style="padding-top: 20px;">
        <input type="button" class="btn btn-info" value="Back" onclick="history.back()">
        <h2 style="margin-left: 40%; padding-bottom: 30px;"><b>FORM PENGAJUAN <?php echo strtoupper($tipe);?></b></h2>
        <form enctype='multipart/form-data' action="uploadCuti.php" method="POST">
            <div class="card shadow mb-4" style="width: 113%; padding: 5px 20px 10px 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h5>Alasan  <?php echo strtoupper($tipe);?></h5>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" name="alasan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h5>Durasi  <?php echo strtoupper($tipe);?></h5>
                        </div>
                        <div class="col-2">
                            <input type="date" class="form-control" name="cutiDari">
                        </div>
                        <div class="col-1" style="margin-top: 5px;">
                            <h5><b>-</b></h5>
                        </div>
                        <div class="col-2" style="margin-left: -60px;">
                            <input type="date" class="form-control" name="cutiSampai">
                        </div>
                    </div>
                    <?php
                    ?>
                    <input type="hidden" name="tipe" value="<?php echo $tipe;?>">
                    <div class="row">
                        <div class="col-4">
                            <h5>Lampiran</h5>
                        </div>
                        <div class="col-8">
                            <input name="file" type="file">
                        </div>
                    </div>
                    <a href="#">
                        <button class="btn btn-primary" style="margin-top: 30px; margin-left: 45%;" onclick="button_alert()">Ajukan  <?php echo strtoupper($tipe);?></button>
                    </a>
                </div>
            </div>
        </form>
        <div class="footer">
            <p><b>@ 2022 All Rights Reserved by Universitas Kristen Petra</b></p>
        </div>
    </div>
</body>
</html>