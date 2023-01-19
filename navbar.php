<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">phpdatabase</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_kota.php">Daftar Kota</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php">Pendaftaran</a>
        </li>
  

        <form action="" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="pencarian" value="<?=(isset($_GET['pencarian']))? $_GET['pencarian']:""?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
    </div>
  </div>
</nav>