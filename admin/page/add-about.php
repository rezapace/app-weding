<div class="pagetitle">
    <h1>About</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=about">About</a></li>
            <li class="breadcrumb-item active">Add About</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card about-card">
            <div class="card-body">
                <h5 class="card-title">Add Data About</h5>

                <form class="row g-3" method="POST" action="../action.php?act=add-about" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label class="form-label">Heading</label>
                        <input type="text" class="form-control" name="about_heading" required="required" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">About Text</label>
                        <textarea class="form-control" name="about_text" required="required" autocomplete="off" rows="5"></textarea>
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