<?php
    include "../conn.php";
?>
<!DOCTYPE html>
<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 

    <link rel="stylesheet" href="../css/layout.css">
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
    <div class="container" style="padding-top: 30px;">
        <div class="card shadow mb-4" style="width: 113%;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 20px;">Data Karyawan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">No</th>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Jam</th>
                                <th style="text-align:center">Absen</th>
                                <th style="text-align:center">Keterangan</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                $q="SELECT a.*,DATE_FORMAT(a.tanggal,'%d-%M-%Y %h:%i') as tanggal,p.nama
                                    FROM absen a
                                    INNER JOIN pegawai p ON (p.id=a.pegawai_id)";
                            
                                $res=mysqli_query($conn,$q);
                                while ($row=mysqli_fetch_assoc($res))
                                {
                                   
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
                                                    echo date("d-M-Y",strtotime($row["tanggal"]));;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo date("H:i",strtotime($row["tanggal"]));
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row["status"]=="1")
                                                    {
                                                        echo "Masuk";
                                                    }
                                                    else {
                                                        echo "Pulang";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                   echo $row["keterangan"];
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php
                                                    echo "<a class='btn btn-primary' style='padding: 5px 30px 5px 30px;' role='button' href='editabsensi.php?id=".$row["id"]."'>Edit</a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    $no++;
                                }
                            ?>
                            <!--
                            <tr>
                                <td align="center">1</td>
                                <td align="center">Raymond Thiono</td>
                                <td align="center">17/10/2022</td>
                                <td align="center">07.30</td>
                                <td align="center">Hadir</td>
                                <td align="center">
                                    <a href="#" class="btn btn-primary btn-icon-split">
                                        <span class="text" style="padding: 5px 15px 5px 15px;"><i class="fa fa-edit"></i> Edit</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">2</td>
                                <td align="center">Ryond Franklin</td>
                                <td align="center">17/10/2022</td>
                                <td align="center">-</td>
                                <td align="center">Sakit</td>
                                <td align="center">
                                    <a href="#" class="btn btn-primary btn-icon-split">
                                        <span class="text" style="padding: 5px 15px 5px 15px;"><i class="fa fa-edit"></i> Edit</span>
                                    </a>
                                </td>
                            </tr>-->
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
        $(document).ready(function()
        {
            $("#dataTable").dataTable();    
        });
    </script>
</body>
</html>