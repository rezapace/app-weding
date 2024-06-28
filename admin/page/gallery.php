<div class="pagetitle">
    <h1>Gallery</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class=" mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Changed gallery Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Change gallery Data
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
        Successfully Deleting gallery Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Delete gallery Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Added gallery Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
  <?php } ?>
</div>

<section class="section dashboard">
    <a href="index.php?page=add-gallery" class="btn btn-primary my-3">Add Data</a>
    <div class="row" data-masonry='{"percentPosition": true }'>
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT * FROM gallery ORDER BY id ASC";
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
                                <a href="../action.php?act=delete-gallery&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
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
</section>