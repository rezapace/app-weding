<div class="pagetitle">
    <h1>Features</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Features</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class=" mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Changed Features Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Change Features Data
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
        Successfully Deleting Features Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Delete Features Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Added Features Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
  <?php } ?>
</div>

<section class="section dashboard">
    <a href="index.php?page=add-features" class="btn btn-primary my-3">Add Data</a>
    <div class="row">
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT * FROM features ORDER BY id ASC";
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
</section>