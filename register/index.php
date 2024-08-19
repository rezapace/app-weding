<?php
// session start();
if (!empty($_SESSION)) {
} else {
  session_start();
}

require_once '../db-connect.php'; // Include your database connection file

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['new_name']; // Menangkap data name dari form
    $username = $_POST['new_username']; // Menangkap data username dari form
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Encrypt the password

    // SQL query to insert user data into the database using mysqli
    $query = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
    $stmt = $koneksi2->prepare($query);
    $stmt->bind_param("sss", $name, $username, $password); // Bind parameters

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now login.'); window.location.href='login/index.php';</script>";
    } else {
        echo "<script>alert('Registration failed! Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - Wedding Organizer JeWePe</title>

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
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-5 pb-2 mt-4">
                    <h5 class="card-title text-center pb-0 fs-2 fw-semibold">Register</h5>
                    <p class="text-center small text-secondary">Create your account</p>

                  </div>
                  <form method="post" action="../action.php?act=register" class="row g-3">
                    <div class="col-12">
                        <input type="text" name="new_name" class="form-control" id="newName" placeholder="Full Name" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <input type="text" name="new_username" class="form-control" id="newUsername" placeholder="Username" required="required" autocomplete="off">
                    </div>
                    <div class="col-12 mb-3">
                        <input type="password" name="new_password" class="form-control" id="newPassword" placeholder="Password" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-login w-100 py-2" type="submit">Register</button>
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

  <!-- Template Main JS File -->
  <script src="../admin/assets/js/main.js"></script>

</body>

</html>