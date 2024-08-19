<?php
// Mulai sesi jika belum dimulai (note tambahan :  ini edit hanya untuk status order saja)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah admin sudah login 
if (empty($_SESSION['ADMIN'])) {
    echo '<script>alert("Maaf, login dahulu!"); window.location="login.php";</script>';
    exit;
}

// Koneksi ke database
require '../db-connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data order dari database
    $query = "SELECT * FROM `order` WHERE id='$id'";
    $result = mysqli_query($koneksi2, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
    }
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan pada database'); window.location='admin.php?page=order';</script>";
        exit;
    }
} else {
    echo "<script>alert('Masukkan data id.'); window.location='admin.php?page=order';</script>";
    exit;
}
?>

<div class="pagetitle">
    <h1>Order</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=order">Order</a></li>
            <li class="breadcrumb-item active">Edit Order</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card order-card">
                <div class="card-body">
                    <h5 class="card-title">Edit Order</h5>

                    <form class="row g-3" id="edit-order-form">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

                        <div class="col-md-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="nama" readonly value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" readonly value="<?php echo $data['email']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Package</label>
                            <input type="text" class="form-control" name="paket" readonly value="<?php echo $data['paket']; ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="deskripsi" rows="5" readonly><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="pending" <?php echo ($data['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="processing" <?php echo ($data['status'] == 'processing') ? 'selected' : ''; ?>>Processing</option>
                                <option value="completed" <?php echo ($data['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
                                <option value="cancelled" <?php echo ($data['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" onclick="editOrder()">Submit</button>
                        </div>
                    </form>
                    <div id="edit-order-result"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function editOrder() {
    var formData = new FormData(document.getElementById('edit-order-form'));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../action.php?act=edit-order", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('edit-order-result').innerHTML = xhr.responseText;
        }
    };
    xhr.send(formData);
}
</script>
