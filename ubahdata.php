<?php
include_once('koneksi.php');

// echo var_dump($_POST);
// Kolom data di table
$nama = $_POST['Nama'];
$nohp = $_POST['NoHP'];
$alamat = $_POST['Alamat'];
$email = $_POST['Email'];
$jk = $_POST['JenisKelamin'];
$foto = $_FILES['FOTO']['name'];
$no = $_POST['NO'];
$id_kelas = $_POST['pilih_kelas'];

// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';

$query = "UPDATE data_siswa set `Nama` = '$nama',`Alamat` = '$alamat',`Email` = '$email',`JenisKelamin` = '$jk',`FOTO` = '$foto' where `NO` = '$no'  ";

$update_data = mysqli_query($koneksi, $query);

if ($update_data) {
    echo "<p>Data berhasil masuk</p>";
    echo "<meta http-equiv=refresh content=1;URL='home.php'>";
} else {
    echo "<p>Data gagal masuk</p>";
}
move_uploaded_file($_FILES["FOTO"]["tmp_name"], 'assets/' . $foto);

$cek_data_kelas = mysqli_query($koneksi,"select * from data_kelas where `no_siswa` = '$no'");
// update daftar kelas
if (mysqli_fetch_assoc($cek_data_kelas)) {
    $query = mysqli_query($koneksi,"UPDATE data_kelas set `id_kelas` = '$id_kelas' where `no_siswa` = '$no'  ");
    $update_data = mysqli_query($koneksi, $query);
} else {
    // $query = mysqli_query($koneksi,"insert data_kelas values ( null,'$no','$id_kelas')");
}




echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];


// header('Location: home.php');