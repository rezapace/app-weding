<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <!-- Reports -->
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Dashboard Laporan <span>| Today</span></h5>
                <div class="row" data-masonry='{"percentPosition": true }'>
                    <!-- Card for Features Data -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Features Data</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-calendar-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            include '../db-connect.php';
                                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM features");
                                            $jumlah_barang = mysqli_num_rows($data_barang);
                                            echo $jumlah_barang;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Catalog Price Data -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Catalog Price Data</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM packages");
                                            $jumlah_barang = mysqli_num_rows($data_barang);
                                            echo $jumlah_barang;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Gallery Menu Data -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Gallery Menu Data</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM gallery");
                                            $jumlah_barang = mysqli_num_rows($data_barang);
                                            echo $jumlah_barang;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Blog Post Data -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Blog Post Data</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM blog");
                                            $jumlah_barang = mysqli_num_rows($data_barang);
                                            echo $jumlah_barang;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Testimonial Data -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Testimonial Data</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM testimonial");
                                            $jumlah_barang = mysqli_num_rows($data_barang);
                                            echo $jumlah_barang;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Order Package Data -->
                    <div class="col-md-4">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Order Package Data</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            $data_barang = mysqli_query($koneksi2, "SELECT * FROM `order`");
                                            $jumlah_barang = mysqli_num_rows($data_barang);
                                            echo $jumlah_barang;
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End row -->
            </div>
        </div>
    </div><!-- End Reports -->
</section>


<!-- End Right side columns -->
<!-- Reports -->
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">The Best Features We Provide <span>| Today</span></h5>
            <div class="row" data-masonry='{"percentPosition": true }'>
                <?php
                // Jalankan query untuk menampilkan semua data diurutkan berdasarkan ID
                $query = "SELECT * FROM features ORDER BY id DESC";
                $result = mysqli_query($koneksi2, $query);

                // Mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
                }

                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-4">
                        <div class="card features-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="name">
                                        <h5 class="card-title">Feature <?php echo $no; ?></h5>
                                    </div>
                                    <div class="opsi">
                                        <a href="index.php?page=edit-features&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm me-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="../action.php?act=delete-features&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="<?php echo $row['features_icon']; ?>"></i>
                                    </div>
                                    <div>
                                        <h6><?php echo $row['features_name']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $no++;
                }
                ?>
            </div>
        </div>
    </div>
</div><!-- End Reports -->


        </div><!-- End Right side columns -->
        <!-- Reports -->
        <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">Gallery Menu<span>| Today</span></h5>
                            <div class="row" data-masonry='{"percentPosition": true }'>
                                <?php
                                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                                $query = "SELECT * FROM gallery ORDER BY id DESC";
                                $result = mysqli_query($koneksi2, $query);
                                //mengecek apakah ada error ketika menjalankan query
                                if (!$result) {
                                    die("Query Error: " . mysqli_errno($koneksi2) .
                                        " - " . mysqli_error($koneksi2));
                                }
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="card gallery-card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="name">
                                                        <h5 class="card-title">Gallery <?php echo $no ?></h5>
                                                    </div>
                                                    <div class="opsi py-3">
                                                        <a href="index.php?page=edit-gallery&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                        <a href="../action.php?act=delete-gallery&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="gallery-image">
                                                        <img src="../assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="" class="img-fluid rounded mb-3">
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6><?php echo $row['gallery_heading']; ?></h6>
                                                        <p class="fw-light" style="font-size: 11px;"><?php echo $row['gallery_desc']; ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                <?php
                                    $no++;
                                }
                                ?>

                            </div>


                        </div>

                    </div>
                </div><!-- End Reports -->

    </div>
</section>