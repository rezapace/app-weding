<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=blog">Blog</a></li>
            <li class="breadcrumb-item active">Add Blog</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card blog-card">
                <div class="card-body">
                    <h5 class="card-title">Add Data Blog</h5>

                    <form class="row g-3" method="POST" action="../action.php?act=add-blog" enctype="multipart/form-data">
                        <div class="col-md-4">
                            <input name="id" value="<?php echo $data['id']; ?>" hidden />
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="inputGroupFile02" name="blog_image" required="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Heading</label>
                            <input type="text" class="form-control" name="blog_heading" required="required" autocomplete="off">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea id="editor1" class="form-control" name="blog_text" rows="5" required="required" autocomplete="off"></textarea>
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