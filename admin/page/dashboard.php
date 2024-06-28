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
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <div class="col-xxl-4 col-md-6">
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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Packages Data</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-file-invoice-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        include '../db-connect.php';

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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Gallery Data</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-image"></i>
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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Blog Data</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-newspaper"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        include '../db-connect.php';

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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Client Data</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        include '../db-connect.php';

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


                



            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Features Recent <span>| Today</span></h5>
                    <div class="row">
                        <?php
                        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                        $query = "SELECT * FROM features ORDER BY id DESC";
                        $result = mysqli_query($koneksi2, $query);
                        //mengecek apakah ada error ketika menjalankan query
                        if (!$result) {
                            die("Query Error: " . mysqli_errno($koneksi2) .
                                " - " . mysqli_error($koneksi2));
                        }
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="col-12">
                                <div class="card features-card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="name">
                                                <h5 class="card-title">Features <?php echo $no ?></h5>
                                            </div>
                                            <div class="opsi py-3">
                                                <a href="index.php?page=edit-features&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="../action.php?act=delete-features&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="<?php echo $row['features_icon']; ?>"></i>
                                            </div>
                                            <div class="ps-3">
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
            </div><!-- End Recent Activity -->


        </div><!-- End Right side columns -->
        <!-- Reports -->
        <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">Gallery Recent <span>| Today</span></h5>
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