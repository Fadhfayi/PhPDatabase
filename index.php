<?php
require_once('koneksi.php');
require_once('getdata.php');

$nama = $data['nama'];
$alamat = $data['Alamat'];
$nohp = $data['nohp'];
$jeniskelamin = $data['JenisKelamin'];
$email = $data['Email'];
$foto = $data['FOTO'];
$no = $data['NO'];
$idkelas = $data['id'];
$daftar_kelas = $data['kelas'];

// echo var_dump($data);
if (empty($_COOKIE['nama_login'])) {
    header("Location: login.php");
}
require_once('navbar.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container  m-5">
        <form action="postdata.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="budiman nurhadi">
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="Alamat" name="Alamat" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">nohp</label>
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="08913841471">
            </div>
            <div class="mb-3">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="JenisKelamin" id="JenisKelamin" value="L">
                    <label class="form-check-label" for="">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="JenisKelamin" id="JenisKelamim" value="P">
                    <label class="form-check-label" for="">
                        Perempuan
                    </label>
                </div>
                <br>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="Email" name="Email" placeholder="gugugaga@gmail.com">
                </div>
                <div class="mb-3">
            <label for="pilih_kelas" class="form-label">Pilih Kelas</label>
            <select name="pilih_kelas" class="form-control" id="pilih_kelas">

                <?php
                while ($datakelas = mysqli_fetch_assoc($ambil_data_kelas)) {
                    $selected = ($datakelas['id'] == $idkelas) ? 'selected' : '' ;
                    echo "<option value='{$datakelas['id']}' $selected>{$datakelas['kelas']}</option>";
                }
                ?>
            </select>
        </div>
                <br>
                Masukan Foto Diri
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="FOTO" name="FOTO">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">KIRIM</button>
                </div>


            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                crossorigin="anonymous"></script>
</body>

</html>