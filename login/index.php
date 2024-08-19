<?php
// session start();
if (!empty($_SESSION)) {
} else {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Wedding Organizer JeWePe</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../admin/assets/css/style.css" rel="stylesheet">
  <style>
    .card {
      background-color: #fff;
      color: #252525;
      border-radius: 30px;
    }

    .card .card-title {
      color: #252525;
      text-decoration: underline;
      text-decoration-color: rgba(70, 73, 254);
    }

    .form-control {
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 2.3;
      color: #212529;
      background-color: rgba(0, 0, 0, 0.190);
      background-clip: padding-box;
      border: 1px solid #ced4da;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: .575rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

    }

    .btn-login {
      color: #fff;
      background-color: rgba(33, 32, 45, 1);
      border-radius: 15px;
    }

    .btn-login:hover {
      color: #fff;
      background-color: rgba(33, 32, 45, 1);
    }
  </style>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div id="logout">
                <?php if (isset($_GET['signout'])) { ?>
                  <div class="alert alert-success">
                    <strong>Anda Berhasil Logout</strong>
                  </div>
                <?php } ?>
                <?php if (isset($_GET['changepass'])) { ?>
                  <div class="alert alert-danger">
                    <strong>Anda Berhasil Mengganti Password</strong>
                  </div>
                <?php } ?>
              </div>
              <div id="notifikasi">
                <div class="alert alert-danger">
                  <strong>Login Anda Gagal, Periksa Kembali Username dan Password</strong>
                </div>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-5 pb-2 mt-4">
                    <h5 class="card-title text-center pb-0 fs-2 fw-semibold">Login</h5>
                    <p class="text-center small text-secondary">Enter your credentials</p>

                  </div>

                  <form method="post" action="../action.php?act=login" class="row g-3">

                    <div class="col-12">
                      <input type="text" name="user_username" class="form-control" autofocus id="yourUsername" placeholder="Username" required="required" autocomplete="off">
                    </div>

                    <div class="col-12 mb-3">
                      <input type="password" name="user_password" class="form-control" id="yourPassword" placeholder="Password" required="required" autocomplete="off">
                    </div>

                    <div class="col-12">
                      <button class="btn btn-login w-100 py-2" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->

  <!-- Template Main JS File -->
  <script src="../admin/assets/js/main.js"></script>

  <script>
    // notifikasi gagal di hide
    <?php if (empty($_GET['get'])) { ?>
      $("#notifikasi").hide();
    <?php } ?>
    var logingagal = function() {
      $("#logout").fadeOut('slow');
      $("#notifikasi").fadeOut('slow');
    };
    setTimeout(logingagal, 4000);
  </script>

</body>

</html>