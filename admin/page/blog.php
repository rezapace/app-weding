<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Blog</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class=" mt-2">
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Changed blog Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Change blog Data
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
                Successfully Deleting blog Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Delete blog Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "tambah") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Added blog Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<section class="section blog">
    <a href="index.php?page=add-blog" class="btn btn-primary my-3">Add Data</a>
    <div class="row">
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT * FROM blog ORDER BY id ASC";
        $result = mysqli_query($koneksi2, $query);
        //mengecek apakah ada error ketika menjalankan query
        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi2) .
                " - " . mysqli_error($koneksi2));
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="blog-item col-md-3 card">
                <img src="../assets/img/blog/<?php echo $row['blog_image']; ?>" class="card-img-top mb-3" alt="Blog Image">
                <div class="card-body">
                    <div class="author">
                        <p><span><?php echo date('M d Y', strtotime($row['blog_date'])); ?></span> / iqbalalala</p>
                    </div>
                    <h5 class="card-title"><?php echo $row['blog_heading']; ?></h5>
                    <p class="card-text"><?php echo substr($row['blog_text'], 0, 150); ?>...</p>
                    <a href="index.php?page=edit-blog&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <a href="../action.php?act=delete-blog&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
                </div>
            </div>

            
        <?php
            $no++;
        }
        ?>


    </div>
</section>