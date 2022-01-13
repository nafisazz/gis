<?php
include('header3.php');
$users = $obj->getPoint();

if (isset($_POST['update'])) {

  $user = $obj->getPointById();
  $_SESSION['user'] = pg_fetch_object($user);
  header('location:edit.php');
}



if (isset($_POST['delete'])) {

  $ret_val = $obj->deletepoint();
  if ($ret_val == 1) {

    echo "<script language='javascript'>";
    echo "alert('Record Deleted Successfully'){
          window.location.reload();
      }";
    echo "</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>KOTA BANDAR LAMPUNG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="container pt-3">
    <div class="row justify-content-between">
      <div class="col">
        <a class="navbar-brand" href="index.html"><img src="images/logo.png" height="80" width="60">
          &emsp;Kota<span>Bandar Lampung.</span></a>
      </div>
      <div class="col d-flex justify-content-end">
        <div class="social-media">
          <p class="mb-0 d-flex">
            <a href="https://www.instagram.com/kominfobandarlampung/" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
            <a href="https://www.instagram.com/kominfobandarlampung/" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
            <a href="https://www.instagram.com/kominfobandarlampung/" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
            <a href="https://bandarlampungkota.go.id/" class="d-flex align-items-center justify-content-center" target="_blank"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span> Menu
      </button>
      <form action="#" class="searchform order-lg-last">
        <div class="form-group d-flex">
          <input type="text" class="form-control pl-3" placeholder="Search">
          <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
        </div>
      </form>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">Profile</a></li>
          <li class="nav-item"><a href="team.html" class="nav-link">Peta</a></li>
          
          <li class="nav-item  active"><a href="input.php" class="nav-link">Input Data</a></li>
          <li class="nav-item"><a href="../../login/logout.php" class="nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/hotel1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Tambah Data <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-0 bread">Tambah Data</h1>
        </div>
      </div>
    </div>
  </section>



  <div class="container">
    <br>
    <div class="row mb-1">
      <div class="position-relative">
        <div class="container position-relative">
          <div class=" container mt-1">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <a href="insert.php" class="btn btn-primary pull-left mt-2 mb-4"> Add Record</a>
              </div>
              <div class="position-relative">
                <div class="container position-relative">
                  <div class="row justify-content-center">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr class="active">
                          <th>ID</th>
                          <th>Nama Hotel</th>
                          <th>Alamat Hotel</th>
                          <th>Jenis</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($user = pg_fetch_object($users)) : ?>
                          <tr align="left">
                            <td><?= $user->id ?></td>
                            <td><?= $user->nama ?></td>
                            <td><?= $user->alamat ?></td>
                            <td><?= $user->jenis ?></td>
                            <td><?= $user->lat ?></td>
                            <td><?= $user->lng ?></td>

                            <td>
                              <form method="post">
                                <input type="submit" class="btn btn-success" name="update" value="Update">
                                <input type="submit" onClick="return confirm('Please confirm deletion');" class="btn btn-danger" name="delete" value="Delete">
                                <input type="hidden" value="<?= $user->id ?>" name="id">
                              </form>
                            </td>
                          </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <?php include('footer.php'); ?>