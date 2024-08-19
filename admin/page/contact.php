<div class="pagetitle">
    <h1>Contact</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class=" mt-2">
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Changed contact Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Change contact Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                File Extension Must Be PNG And JPG
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "size") { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                File Size Can't Be More Than 2 MB
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "hapus") { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Successfully Deleting contact Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Delete contact Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "tambah") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Added contact Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<section class="section dashboard">
    <div class="row">
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT * FROM contact ORDER BY id ASC";
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
                <div class="card contact-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="name">
                                <h5 class="card-title">Contact Message <?php echo $no ?></h5>
                            </div>
                            <div class="opsi py-3">
                                <a href="../action.php?act=delete-contact&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </div>
                        <div class="">
                            <p style="font-size: 11px;"><?php echo date('M d Y H:i:s' , strtotime($row['contact_date'])); ?></p>
                            <h3 class="">Nama Pengirim : <?php echo $row['contact_name']; ?></h3>
                            <hr>
                            <h5>Subject : <?php echo $row['contact_subject']; ?></h5>
                            <p style="font-size: 14px; font-weight: 200;">Message : <?php echo $row['contact_message']; ?></p>
                        </div>

                    </div>
                </div>
            </div>


        <?php
            $no++;
        }
        ?>

    </div>
</section>