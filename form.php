<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<?php
require_once('getdata.php');
$nama = $data['Nama'];
$alamat = $data['Alamat'];
$nohp = $data['NoHP'];
$jeniskelamin = $data['JenisKelamin'];
$email = $data['Email'];
$foto = $data['FOTO'];
$no = $data['NO'];
$idkelas = $data['id'];
$daftar_kelas = $data['kelas'];

// echo var_dump($data);

    ?>

<?php
if ($_POST['aksi'] == 'ubah') {

    ?>

    <form id="form" action="ubahdata.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="hidden" name="NO" value="<?= $no ?>">
            <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Tulis namamu"
                value="<?php echo $nama; ?>" />
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="Alamat" name="Alamat" rows="3"><?= $alamat ?></textarea>
        </div>
        <div class="mb-3">
            <label for="NoHP" class="form-label">No HP</label>
            <input type="text" class="form-control" id="NoHP" name="NoHP" placeholder="Tulis no HP" value="<?= $nohp; ?>">
        </div>
        <div class="mb-3">
            <p class="">Jenis Kelamin</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JenisKelamin" value="L" id="jenkel1"
                    <?=($jeniskelamin == 'L') ? 'checked' : '' ?> />
                <label class="form-check-label" for="jenkel1">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JenisKelamin" value="P" id="jenkel2"
                    <?=($jeniskelamin == 'P') ? 'checked' : '' ?> />
                <label class="form-check-label" for="jenkel2">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="Email" id="Email" placeholder="Tulis Email" value="<?= $email ?>">
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
    
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input class="form-control" type="file" name="FOTO" id="FOTO">
        </div>
        <img src="assets/<?= $foto ?>" class="img-thumbnail" alt="">
        <br>
        <br>
        <button type="submit" class="btn btn-sm btn-info" value="ubah">Ubah Data</button>

    </form>

    <?php
} else { ?>

    <P> APAKAH ANDA SERIUS INGIN MENGHAPUS KENANGAN INI !? </p>
    <form action="hapusdata.php" method="post">
        <input type="hidden" name="NO" value="<?= $no; ?>">
        <input type="submit" value="hapus" class="btn btn-danger">
    </form>
<?php }

?>