<?php
require_once( 'koneksi.php' );
require_once('navbar.php');
if (isset($_GET['pencarian'])) {
    $cari = $_GET['pencarian'];
    // panggil table data siswa
    $ambil_data = mysqli_query($koneksi, "SELECT data_siswa.*,data_kelas.id,kelas.kelas from data_siswa join data_kelas on data_kelas.no_siswa=data_siswa.no join kelas on kelas.id=data_kelas.id_kelas where data_siswa.Nama like '%$cari%' ");
} else {
    // panggil seluruh table data siswa
    $ambil_data =mysqli_query($koneksi, "SELECT data_siswa.*,data_kelas.id,kelas.kelas from data_siswa join data_kelas on data_kelas.no_siswa=data_siswa.no join kelas on kelas.id=data_kelas.id_kelas;");
}
$menu = "home";
// $ambil_data = mysqli_query($koneksi, "SELECT data_siswa.*,data_kelas.id,kelas.kelas from data_siswa join data_kelas on data_kelas.no_siswa=data_siswa.no join kelas on kelas.id=data_kelas.id_kelas;");
?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Bootstrap demo</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
</head>

<body>

    <div class='container  m-5'>
        <table class='table'>
            <thead class='table-dark'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Nama</th>
                    <th scope='col'>Kelas</th>
                    <th scope='col'>No HP</th>
                    <th scope='col'>Alamat</th>
                    <th scope='col'>Jenis Kelamin</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Foto</th>
                    <th scope='col'>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
while( $data = mysqli_fetch_assoc($ambil_data)) {
    #Untuk gambar kalo ga ada file munculnya kayu
    if ( $data[ 'FOTO' ] == '' ) {
        $gambar = 'wooden-sidewalk.jpg' ;
    } else {
        $gambar = $data[ 'FOTO' ] ;
    }

    ?>
                <tr>
                    <th scope='row'>
                        <?=$no++;?>
                    </th>
                    <td><?php echo $data[ 'Nama' ] ?></td>
                    <td><?php echo $data[ 'kelas' ] ?></td>
                    <td><?php echo $data[ 'NoHP' ] ?></td>
                    <td><?php echo $data[ 'Alamat' ] ?></td>
                    <td><?php echo $data[ 'JenisKelamin' ] ?></td>
                    <td><?php echo $data[ 'Email' ] ?></td>
                    <td><img class='img-thumbnail' width='100' src="assets/<?=$gambar?>"> </td>
                    <td>
                        <button class='btn btn-info' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-id="<?=$data['NO']?>" data-bs-aksi="ubah"> UBAH
                        </button>
                        <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-id="<?=$data['NO']?>" data-bs-aksi="hapus"> HAPUS
                        </button>
                    </td>
                </tr>
                <?php }
    ?>
            </tbody>
        </table>
        <!-- Modal -->
        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                    </div>
                 
                </div>
            </div>
        </div>

    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'>
    </script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script> 
      $(document).ready(function(){
        //alert('WASAAAAPP');
        const Modal = document.getElementById('exampleModal')
        Modal.addEventListener('show.bs.modal', event => {
          const button = event.relatedTarget
          const id = button.getAttribute('data-bs-id');
          const aksi = button.getAttribute('data-bs-aksi');
          $.post('form.php', {id,aksi}, function (a) {
            // console.log(a);
          }).done(function (a) {
             $('.modal-body').html(a)
        }).fail(function () {
          alert("error");
        }).always(function () {
          //alert("finished")
        });
      });
    });

    $("#form").submit(function(a){
        a.preventDefault();
        const data_form = this.serialize ();
        console.log(data_form);
    });
      </script>

</body>

</html>