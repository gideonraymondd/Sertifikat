<?php
    include "conn.php";
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
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
                    <a href="./ijinSakit.php?tipe=Sakit">Ijin Sakit</a>
                </li>
            </ul>
            <a href="./login.php">
                <button type="button" id="sidebarCollapse" class="btn btn-info">LOG OUT</button>
            </a>
        </nav>
    </div>
    <div class="container" style="padding-top: 30px;">
        <h2 style="margin-left: 42%; padding-bottom: 30px;"><b>ABSENSI HARIAN</b></h2>
        <div class="card shadow mb-4" style="width: 113%;">
            <div class="card-body" style="padding-top: 40px; padding-bottom: 40px;">
                <div class="container" style="margin-left: 0px;">
                    <div class="row">
                        <div class="col-6" align="center">
                            <?php
                                $user=$_SESSION["user"];
                            ?>
                            <div class="body">
                                <button style="display: none; padding: 15px 30px 15px 30px;" id="btnAbsen" onclick="absen();" class="btn btn-primary">Absen Datang</button>
                            </div>
                        </div>
                        <div class="col-6" align="center">
                            <div class="body">
                                <button style="padding: 15px 30px 15px 30px;" id="btnAbsen2" onclick="absen2();" class="btn btn-danger">Absen Pulang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4" style="width: 113%;">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">No</th>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Jam Kedatangan</th>
                                <th style="text-align:center">Jam Pulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                $q="SELECT DATE_FORMAT(a.tanggal,'%d-%M-%Y') as tanggal,p.nama,a.pegawai_id
                                    FROM absen a
                                    INNER JOIN pegawai p ON (p.id=a.pegawai_id)
                                    GROUP BY a.pegawai_id,DATE_FORMAT(a.tanggal,'%d-%M-%Y')";
                            
                                $res=mysqli_query($conn,$q);
                                while ($row=mysqli_fetch_assoc($res))
                                {
                                    $jam_masuk="";
                                    $jam_pulang="";
                                    $q="SELECT DATE_FORMAT(tanggal,'%H:%i') as jam FROM absen WHERE pegawai_id=".$row["pegawai_id"]." AND DATE_FORMAT(tanggal,'%d-%M-%Y')='".$row["tanggal"]."' AND status='1'";
                                    //echo $q;
                                    $res2=mysqli_query($conn,$q);
                                    if ($row2=mysqli_fetch_assoc($res2))
                                    {
                                        $jam_masuk=$row2["jam"];
                                    }


                                    $q="SELECT DATE_FORMAT(tanggal,'%H:%i') as jam FROM absen WHERE pegawai_id=".$row["pegawai_id"]." AND DATE_FORMAT(tanggal,'%d-%M-%Y')='".$row["tanggal"]."' AND status='2'";
                                    $res2=mysqli_query($conn,$q);
                                    if ($row2=mysqli_fetch_assoc($res2))
                                    {
                                        $jam_pulang=$row2["jam"];
                                    }
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo $no;          
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $row["nama"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $row["tanggal"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $jam_masuk;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $jam_pulang;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    $no++;
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

    <script>
        var latitude=0;
        var longitude=0;
        var user=<?php echo $user["id"];?>;
        function absen()
        {
            
            $.ajax({
                    url: "action/absen.php",
                    type: "post",
                    dataType  : 'json',
                    data: {latitude,longitude,user} ,
                    success: function (response) {
                        alert(response.status);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
            });
            //console.log(latitude,longitude);
        }

        function absen2()
        {
            
            $.ajax({
                    url: "action/absen2.php",
                    type: "post",
                    dataType  : 'json',
                    data: {latitude,longitude,user} ,
                    success: function (response) {
                        alert(response.status);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
            });
            //console.log(latitude,longitude);
        }
        // var x = document.getElementById("demo");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            //console.log(position.coords);
            $("#btnAbsen").show();
            latitude=position.coords.latitude;
            longitude=position.coords.longitude;
            //x.innerHTML = "Latitude: " + position.coords.latitude +
            //"<br>Longitude: " + position.coords.longitude;
        }

        getLocation();
    </script>
</body>