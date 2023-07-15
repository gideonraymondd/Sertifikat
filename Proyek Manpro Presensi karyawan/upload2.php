<h3> Ijin sakit </h3>

<form action="" method="post">
<table>
    <tr>
        <td width="120"> Nama </td>
        <td> <input type="text" name="nama"> </td>
    </tr>
    <tr>
        <td> Tanggal lahir </td>
        <td> <input type="date" name="tanggal_lahir"> </td>
    </tr>
    <tr>
        <td> Jabatan </td>
        <td> <input type="text" name="jabatan"> </td>
    </tr>
    <tr>
        <td> Email </td>
        <td> <input type="text" name="email"> </td>
    </tr>
    <tr>
        <td> No Telp </td>
        <td> <input type="text" name="no_telp"> </td>
    </tr>
    <tr>
        <td> Keterangan </td>
        <td> <input type="text" name="keterangan"> </td>
    </tr>
    <tr>
        <td> Start Date </td>
        <td> <input type="date" name="start_date"> </td>
    </tr>
    <tr>
        <td> End Date </td>
        <td> <input type="date" name="end_date"> </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Ajukan ijin sakit"> </td>
    </tr>
</table>

</form>

<?php
include "conn.php";

if(isset($_POST['proses'])){
    mysqli_query($dbc, "insert into uploadd set  
    nama = '$_POST[nama]',
    tanggal_lahir = '$_POST[tanggal_lahir]',
    jabatan = '$_POST[jabatan]',
    email = '$_POST[email]',
    no_telp = '$_POST[no_telp]',
    keterangan = '$_POST[keterangan]',
    start_date = '$_POST[start_date]',
    end_date = '$_POST[end_date]'");
    
    echo "Data barang baru telah tersimpan";
    
    }
    
?>