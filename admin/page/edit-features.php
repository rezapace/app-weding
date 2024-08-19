<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../db-connect.php';
if (!empty($_SESSION['ADMIN'])) {
} else {
    echo '<script>alert("Maaf Login Dahulu !");window.location="login.php"</script>';
}

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM features WHERE id='$id'";
    $result = mysqli_query($koneksi2, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi2) .
            " - " . mysqli_error($koneksi2));
    }
    $data = mysqli_fetch_assoc($result);
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php?page=blog';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='admin.php?page=blog';</script>";
}

?>

<div class="pagetitle">
    <h1>Features</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=features">Features</a></li>
            <li class="breadcrumb-item active">Edit Features</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card features-card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Features</h5>

                    <form class="row g-3" method="POST" action="../action.php?act=edit-features" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <input name="id" value="<?php echo $data['id']; ?>" hidden />
                            <label class="form-label">Features Name</label>
                            <input type="text" class="form-control" name="features_name" value="<?php echo $data['features_name']; ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Feature Icon</label>
                            <p class="example">Untuk Menambahkan Icon anda bisa cari di <code>fontawesome.com/icons</code> </p>
                            <input type="text" class="form-control" name="features_icon" value="<?php echo $data['features_icon']; ?>">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>