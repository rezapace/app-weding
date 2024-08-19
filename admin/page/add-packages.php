<div class="pagetitle">
    <h1>Packages</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=packages">Packages</a></li>
            <li class="breadcrumb-item active">Add Packages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card packages-card">
            <div class="card-body">
                <h5 class="card-title">Add Data Packages</h5>

                <form class="row g-3" method="POST" action="../action.php?act=add-packages" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label class="form-label">Heading</label>
                        <input type="text" class="form-control" name="packages_heading" required="required" autocomplete="off">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="packages_price" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Package List</label>
                        <p class="example">Gunakan Fitur <code>Bullet List</code> <i class="fa-solid fa-list-ul"></i> untuk menaruh packages list.</p>
                        <textarea id="editor1" class="form-control" name="packages_list"></textarea>
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