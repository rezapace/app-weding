<div class="pagetitle">
    <h1>Features</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=features">Features</a></li>
            <li class="breadcrumb-item active">Add Features</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card features-card">
            <div class="card-body">
                <h5 class="card-title">Add Data Features</h5>

                <form class="row g-3" method="POST" action="../action.php?act=add-features" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label class="form-label">Features Name</label>
                        <input type="text" class="form-control" name="features_name" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Feature Icon</label>
                        <p class="example">Untuk Menambahkan Icon anda bisa cari di <code>fontawesome.com/icons</code> </p>
                        <input type="text" class="form-control" name="features_icon" placeholder="fa-brands fa-instagram" required="required" autocomplete="off">
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