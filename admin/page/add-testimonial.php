<div class="pagetitle">
    <h1>Testimonial</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=testimonial">Testimonial</a></li>
            <li class="breadcrumb-item active">Add Testimonial</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card testimonial-card">
                <div class="card-body">
                    <h5 class="card-title">Add Data Testimonial</h5>

                    <form class="row g-3" method="POST" action="../action.php?act=add-testi" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="inputGroupFile02" name="testi_image" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Client</label>
                            <input type="text" class="form-control" name="testi_client" required="required" autocomplete="off">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="testi_text" rows="5"></textarea>
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