<?php

session_start();
if (!$_SESSION['role']) {
    header("location: login.php");
    exit(); 

}

    include 'koneksi.php';

    $query = "SELECT * FROM tb_mahasiswa;";
    $sql = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Praktikum_7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
  <body>
    
    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Portal Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
      <?php
  if (isset($_SESSION['id'])) {
      echo '<a class="nav-link" href="proses_logout.php" role="button" aria-expanded="false">Logout</a>';
  } else {
      echo '<a class="nav-link" href="login.php">logout</a>';
  }
  ?>
      </ul>
    </div>
  </div>
</nav>
    <!-- End Navbar -->

    <!-- Typographi -->
    <h3 class="container mt-3">
        Selamat Datang
        <small class="text-danger">Di Portal Akademik Rukont</small>
      </h3>

      <p class="container">Selamat datang di Portal Akademik Universitas Hasanuddin. Portal Akademik adalah sistem yang memungkinkan civitas akademika Universitas Hasanuddin menerima informasi lebih cepat melalui internet. Sistem ini diharapkan dapat memberikan kemudahan kepada civitas akademika Universitas Hasanuddin untuk melakukan aktivitas-aktivitas akademik dan proses belajar mengajar.</p>
      <p class="container"> Selamat menggunakan fasilitas ini.</p>
      
      <!-- end Typographi -->

      <!-- Button -->
    <div class="container">
<?php
    session_destroy();
    if(isset($_SESSION['eksekusi'])):

?>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>


    <div class="alert alert-success d-flex align-items-center mt-2" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
       <?php
          echo $_SESSION['eksekusi'];
       ?>
      </div>
    </div>

    <?php
        endif;
    ?>
        <!-- end Alert -->

        <!-- Table -->
        <table class="table mt-3 table-bordered table-hover" >
            <thead class="table-dark">
              <th>NIM</th>
              <th>NAMA</th>
              <th>PRODI</th>
            </thead>
            <tbody>
            <?php
                  while($result = mysqli_fetch_assoc($sql)) {
            ?>
            <tr>
              <td>
                <?php echo $result['nim_mahasiswa']; ?>
              </td>
              <td><?php echo $result['nama_mahasiswa']; ?>
                </td>
              <td>
              <?php echo $result['prodi']; ?>
              </td>
            </tr>
              <?php
                  }
              ?>
              
            </tbody>
          </table>
        <!-- End Table -->
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>