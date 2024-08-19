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
?>

<div class="pagetitle">
    <h1>Order</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=order">Order</a></li>
            <li class="breadcrumb-item active">Add Order</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card order-card">
                <div class="card-body">
                    <h5 class="card-title">Add New Order</h5>

                    <form class="row g-3" id="add-order-form">
                        <div class="col-md-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="nama" required="required" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required="required" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Package</label>
                            <input type="text" class="form-control" name="paket" required="required" autocomplete="off">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="deskripsi" rows="5"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" onclick="addOrder()">Submit</button>
                        </div>
                    </form>
                    <div id="add-order-result"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function addOrder() {
    var formData = new FormData(document.getElementById('add-order-form'));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../action.php?act=add-order", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('add-order-result').innerHTML = xhr.responseText;
        }
    };
    xhr.send(formData);
}
</script>
