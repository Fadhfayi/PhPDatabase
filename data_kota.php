<?php

// session_start();

// if ($_SESSION['nama_login'] == null) {
//     header("location: data_kota.php");
// };


require_once('koneksi.php');
include_once('navbar.php');



$sql = "SELECT Alamat,COUNT(Alamat) AS alamat_kota FROM data_siswa GROUP BY Alamat HAVING alamat_kota >0 ORDER BY alamat_kota DESC";
$ambil_data_kota = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kota</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kota</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    $no = 1;

                    while ($datakota = mysqli_fetch_assoc($ambil_data_kota)) {
                    ?>
                        <tr>
                            <th><?= $no++; ?></th>
                            <td><?= $datakota['Alamat'] ?></td>
                            <td><?= $datakota['alamat_kota'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>