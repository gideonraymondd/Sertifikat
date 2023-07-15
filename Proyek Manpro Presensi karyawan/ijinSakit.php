<?php
    include "conn.php";

    $tipe="";
    if (isset($_GET["tipe"]))
    {
        $tipe=mysqli_real_escape_string($conn,$_GET["tipe"]);
    }

    $user=$_SESSION["user"];
    $q="SELECT * FROM pegawai WHERE id='".$user["id"]."'";
    $res=mysqli_query($conn,$q);
    $data=mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/layout.css">
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
                    <a href="./ijinCuti.php?tipe=Cuti">Ijin Cuti</a>
                </li>
                <li>
                    <a href="./ijinCuti.php?tipe=Sakit">Ijin Sakit</a>
                </li>
            </ul>
            <a href="./login.php">
                <button type="button" id="sidebarCollapse" class="btn btn-info">LOG OUT</button>
            </a>
        </nav>
    </div>
    <div class="container" style="padding-top: 30px;">
        <div class="card shadow mb-4" style="width: 113%;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 20px;">Pengajuan <?php echo $tipe;?> Pegawai</h6>
            </div>
            <div class="card-body">
                <h5>Sisa Cuti: <?php echo $data["jatah cuti"];?></h5>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">No</th>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Durasi</th>
                                <th style="text-align:center">Keterangan</th>
                                <th style="text-align:center">Lampiran</th>
                                <th style="text-align:center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                $user=$_SESSION["user"];
                                $q="SELECT c.*,p.nama ".
                                   "FROM cuti c ".
                                   "INNER JOIN pegawai p ON (c.pegawai_id=p.id) ".
                                   "WHERE Tipe='$tipe' AND p.id='".$user["id"]."'";
                                $res=mysqli_query($conn,$q);
                                while ($row=mysqli_fetch_assoc($res))
                                {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo $no;
                                                    $no++;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $row["nama"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo date("d-M-Y",strtotime($row["tanggal_mulai"]))." s/d ".date("d-M-Y",strtotime($row["tanggal_berakhir"]));
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $row["alasan"];
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-primary" href="Foto/<?php echo $row["file"];?>" role="button"><i class="fa fa-download"></i> Unduh</a>
                                            </td>
                                            <td>
                                                <?php
                                                    $query = "SELECT status FROM cuti";
                                                    $result = mysqli_query($conn,$query);
                                                    $result_check = mysqli_num_rows($result);
                                                    if($result_check > 0){
                                                        if ($row["status"] == 1)
                                                        {
                                                            echo "Terkirim";
                                                        }
                                                        elseif ($row["status"] == 2)
                                                        {
                                                            echo "Terima";
                                                        }
                                                        else
                                                        {
                                                            echo "Tolak";
                                                        }
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer">
            <p><b>@ 2022 All Rights Reserved by Universitas Kristen Petra</b></p>
        </div>
    </div>
    <a class="btn btn-primary" href="./formCuti.php?tipe=<?php echo $tipe;?>" role="button" style="float: right; margin-right: 20px;">Ajukan Form Cuti</a>
</body>
</html>