<?php 
session_start();
if (isset($_SESSION['login'])){
  header("Location: dashboard.php");
  exit;
}

require 'functions.php';

if(isset($_POST['login'])){
  $login = login($_POST);
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="assets/style.css" />

    <title>Salam SemangArt</title>
  </head>

  <body>
    <!-- nav -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-1 py-lg-0 px-0 px-lg-5">
        <a href="" class="navbar-brand font-weight-bold" style="font-size: 40px">
          <span class="logos">Salam SemangArt</span>
        </a>
      </nav>
    </div>
    <!-- /nav -->

    <!-- Main regis -->
    <div class="container-fluid pendaftaran py-3">
      <div class="row align-items-center px-3">
        <div class="col-lg-8 mt-2 text-lg-left px-4 py-1">
          <div class="container">
            <div class="row mt-3">
              <div class="col-8 px-5">
                <h4>Welcome Admin</h4>
                <p>Please login to your account</p>
                <?php if(isset($login['error'])) :?>
                  <p>
                    <script>
                        alert('Username/Password salah!');
                    </script>
                  </p>
                <?php endif; ?>

                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Username</label>
                    <input type="text" class="form-control" id="nama" name="nama" style="width: 250px" placeholder="Masukan usename" autofocus autocomplete="off" required />
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Passwword</label>
                    <input type="pasword" class="form-control" id="password" name="password" style="width: 250px" placeholder="Masukan NPM" required />
                  </div>
                  <button type="submit" class="btn btn-primary" name="login">Log In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-lg-right" style="width: 350px">
          <img class="img-fluid mt-5 mb-5" src="img/kuas.png" alt="" />
          <h4 class="text-center salam">Salam seni, Salam SemangART</h4>
        </div>
      </div>
    </div>
    <!-- /main regis -->

    <!-- footer -->
    <footer>
      <div class="px-5 py-3 bg-dark text-white">
        <p>Salam SemangArt, 2022</p>
      </div>
    </footer>
    <!-- /footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  --></body>
</html>
