<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Management</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        @media print {
            .print-header {
                display: block;
            }
            .no-print {
                display: none;
            }
        }
        .package-item {
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .package-item h5 {
            margin: 0;
        }
    </style>
</head>
<body>

<div class="pagetitle">
    <h1>Catalog</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Catalog</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Changed Packages Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Change Packages Data
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
        Successfully Deleting Packages Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Delete Packages Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Added Packages Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
  <?php } ?>
</div>

<section class="section packages">
    <a href="index.php?page=add-packages" class="btn btn-primary my-3">Add Data</a>
    <button id="downloadPDF" class="btn btn-danger my-3 no-print">Download PDF</button> <!-- Tombol Download PDF -->
    <div class="row" id="packageContent"> <!-- Div dengan ID untuk mengkonversi ke PDF -->
        <?php
        $query = "SELECT * FROM packages ORDER BY id ASC";
        $result = mysqli_query($koneksi2, $query);
        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="package-item col-md-3">
                <div class="d-flex justify-content-between">
                    <div class="name">
                        <h5 class="card-title">Package <?php echo $no ?></h5>
                        <br>
                    </div>
                    <div class="opsi py-3">
                        <a href="index.php?page=edit-packages&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="../action.php?act=delete-packages&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
                    </div>
                </div>
                <div class="head-package text-center">
                    <h4 class="text-uppercase mb-1"><?php echo $row['packages_heading']; ?></h4>
                    <p class="price fs-2 fw-semibold"><?php echo $row['packages_price']; ?></p>
                    <br>
                </div>
                <div class="body-package">
                    <?php echo $row['packages_list']; ?>
                    <div class="text-center">
                        <a href="" class="second-btn">See Detail Package</a>
                    </div>
                </div>
            </div>

        <?php
            $no++;
        }
        ?>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-KE6siV0K0R57d9Jllshwq6b15nwlMhy8k4eCD8PohkkL3DO0xs4pG6K6r35oRIpO" crossorigin="anonymous"></script>
<script>
document.getElementById('downloadPDF').addEventListener('click', function () {
    window.print(); // Mencetak halaman dalam format PDF
});
</script>
</body>
</html>
