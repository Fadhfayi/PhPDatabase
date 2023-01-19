<?php

include_once('koneksi.php');
//echo var_dump($_POST);

$nama = $_POST['nama'];
$Alamat = $_POST['Alamat'];
$nohp = $_POST['nohp'];
$JenisKelamin = $_POST['JenisKelamin'];
$Email = $_POST['Email'];
$FOTO = $_FILES['FOTO']['name'];

$id_kelas = $_POST['pilih_kelas'];

$query = mysqli_query($koneksi,"INSERT into data_kelas (`id_kelas`) values ('$id_kelas') ");
$insert_data = mysqli_query($koneksi, "INSERT into data_siswa (`Nama`,`Alamat`,`NoHP`,`JenisKelamin`,`Email`,`FOTO`) values ('$nama','$Alamat','$nohp','$JenisKelamin','$Email','$FOTO') ");

if ($insert_data) {
    echo "<p> Data MASHOOKKKKK </p>";
    echo "<meta http-equiv=refresh content=1;URL='index.php'>";
} else {
    echo "<p> GAGAK MASHOOKK!</P>";
}




    // $query = mysqli_query($koneksi,"insert data_kelas values ( null,'$no','$id_kelas')");


echo "<br>";

echo var_dump($_FILES);
$nama = $_FILES["FOTO"]["name"];
move_uploaded_file($_FILES["FOTO"]["tmp_name"], 'assets/' . $nama);

?>