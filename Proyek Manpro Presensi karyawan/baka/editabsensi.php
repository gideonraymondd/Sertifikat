<?php
    include "../conn.php";
    $id=mysqli_real_escape_string($conn,$_GET["id"]);
    $q="SELECT a.*,DATE_FORMAT(a.tanggal,'%d-%M-%Y %h:%i') as tanggal2,p.nama
    FROM absen a
    INNER JOIN pegawai p ON (p.id=a.pegawai_id)     
    WHERE a.id='$id'";
    $res=mysqli_query($conn,$q);
    $data=mysqli_fetch_assoc($res);
    //print_r($user);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/layout.css">
    <style>
        .row {
            padding-top: 10px;
        }
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-left: 49%;
            margin-top: 20px;
            margin-bottom: 40px;
        }
    </style>

    <script type="text/javascript">
        function button_alert() {
            alert("Data telah berhasil diubah");
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../Foto/UKP.png">
            </div>
            <ul class="list-unstyled components">
                <p style="opacity: 60%;">DASHBOARD</p>
                <li>
                    <a href="./home.html">Home</a>
                </li>
                <li>
                    <a href="./profile.php">Profile</a>
                </li>
                <li>
                    <a href="./dataAbsensi.php">Data Absensi</a>
                </li>
                <li>
                    <a href="./pengajuanCuti.php">Pengajuan Ijin Cuti</a>
                </li>
            </ul>
            <a href="../login.php">
                <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin-top: 170px;">LOG OUT</button>
            </a>
        </nav>
    </div>
    <div class="container" style="padding-top: 20px;">
        <input type="button" class="btn btn-info" value="Back" onclick="history.back()">
        <form action="updateabsen.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <h2 style="margin-left: 40%; padding-bottom: 30px;"><b>EDIT ABSENSI PEGAWAI</b></h2>
            <div class="card shadow mb-4" style="width: 113%; padding: 5px 20px 10px 20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h5>Tanggal</h5>
                        </div>
                        <div class="col-8">
                            <input type="datetime-local" class="form-control" name="tanggal" value="<?php echo $data["tanggal"];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h5>Pegawai</h5>
                        </div>
                        <div class="col-8">
                            <?php
                                echo $data["nama"];
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h5>Keterangan</h5>
                        </div>
                        <div class="col-8">
                           <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                    </div>
                    <a href="#">
                        <button class="btn btn-primary" style="margin-top: 30px; margin-left: 45%;" onclick="button_alert()">Simpan</button>
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