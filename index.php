<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
require 'db-connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wedding Organizer JeWePe</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <!-- Stylesheets -->
    <style>
        <?php
        include "assets/css/style.css";
        ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Wedding Organizer JeWePe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link mx-2" href="#home">Home</a>
                    <a class="nav-link mx-2" href="#about">About</a>
                    <a class="nav-link mx-2" href="#gallery">Gallery</a>
                    <a class="nav-link mx-2" href="blog/">Blog</a>
                    <a class="nav-link mx-2" href="#client">Testimonial</a>
                    <a class="nav-link mx-2" href="#contact">Order</a>
                    <a class='nav-link mx-2' href="#package">Catalog</a>
                </div>
                <a href="login/" id="btn-hero" class="btn-hero" target="_blank">Login</a>
                <a href="register/" id="btn-hero" class="btn-hero" target="_blank">Register</a>
            </div>
        </div>
    </nav>

    <div id="home" class="background-banner">
        <div class="hero-text">
            <div class="text-center">
                <p class="text-p" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">&#x1F496; The Best Wedding Organizer Ever</p>
                <h1 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">The Smart Way To <br> Plan Your Big Day</h1>
                <p class="sub-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">Experience wedding planning the way it should be <br> - intuitive, thoughtful, and personal </p><br>
                <a href="#features" class="main-btn" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">Watch Our Wedding</a>
            </div>
        </div>
    </div>

    <section id="features" class="features py-5">
        <div class="container">
            <div class="heading-text text-center mb-5">
                <p class="text-p" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">&#129321; Why Choose Us</p>
                <h4 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">The Best Features We Provide</h4>
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">Provide the main service in the form of making a wedding website with various interesting features for the prospective bride and groom</p>
            </div>
            <div class="row justify-content-center">
                <?php
                $query = "SELECT * FROM features ORDER BY id ASC";
                $result = mysqli_query($koneksi2, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="features-item col-md-3 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $no; ?>50">
                        <i class="<?php echo $row['features_icon']; ?>"></i>
                        <h5><?php echo $row['features_name']; ?></h5>
                    </div>
                <?php
                    $no++;
                }
                ?>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <?php
            $query = "SELECT * FROM about ORDER BY id ASC";
            $result = mysqli_query($koneksi2, $query);
            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
            }
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="about-content">
                <div class="text-center mb-4">
                    <p class="text-p">&#128075; Who Are We?</p>
                    <h4><?php echo $row['about_heading']; ?></h4>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col">
                        <p><?php echo $row['about_text']; ?></p>
                        <div class="main-btn mt-4">Know More <i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="package" class="package py-5">
        <div class="container">
            <div class="heading-text text-center mb-4">
                <p class="text-p">&#128184; Packages</p>
                <h4>Best Packages Best Pricing For You</h4>
            </div>
            <div class="row justify-content-center">
                <?php
                $query = "SELECT * FROM packages ORDER BY id ASC";
                $result = mysqli_query($koneksi2, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="package-item col-md-3">
                        <div class="head-package text-center">
                            <h4 class="text-uppercase mb-1"><?php echo $row['packages_heading']; ?></h4>
                            <p class="price fs-2 fw-semibold"><?php echo $row['packages_price']; ?></p><br>
                        </div>
                        <div class="body-package">
                            <?php echo $row['packages_list']; ?>
                            <div class="text-center">
                                <a href="package-details.php?id=<?php echo $row['id']; ?>" class="second-btn">See Detail Package</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <div class="paralax">
        <div class="container">
            <div class="quote-content text-center text-white">
                <p class="quote fst-italic">“Happiness is only real when shared”</p>
                <p>- Muhammad Reza Hidayat</p>
            </div>
        </div>
    </div>

    <section id="gallery" class="gallery py-5">
        <div class="container">
            <div class="heading-text text-center mb-5">
                <p class="text-p">&#128247; Our Gallery</p>
                <h4>Gallery</h4>
            </div>
            <div class="row" data-masonry='{"percentPosition": true }'>
                <?php
                $query = "SELECT * FROM gallery ORDER BY id ASC";
                $result = mysqli_query($koneksi2, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="gallery-item col-6 col-sm-6 col-lg-4">
                        <div class="gallery-text">
                            <h5><?php echo $row['gallery_heading']; ?></h5>
                            <p><?php echo $row['gallery_desc']; ?></p>
                        </div>
                        <img src="assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="" class="img-fluid">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section id="blog" class="blog py-5">
        <div class="container">
            <div class="heading-text text-center mb-5">
                <p class="text-p">&#128221; Blog Post</p>
                <h4>Blog</h4>
            </div>
            <div class="row justify-content-center">
                <?php
                $query = "SELECT * FROM blog ORDER BY id ASC";
                $result = mysqli_query($koneksi2, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="blog-item col-md-3 card">
                        <img src="assets/img/blog/<?php echo $row['blog_image']; ?>" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <div class="author">
                                <p><span><?php echo date('M d Y', strtotime($row['blog_date'])); ?></span> / Wedding Organizer JeWePe</p>
                            </div>
                            <h5 class="card-title"><?php echo $row['blog_heading']; ?></h5>
                            <p class="card-text"><?php echo substr($row['blog_text'], 0, 150); ?>...</p>
                            <a href="blog/page.php?id=<?php echo $row['id']; ?>" class="second-btn">Read More</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section id="client" class="client">
        <div class="container">
            <div class="heading-text text-center">
                <p class="text-p">&#128221; Testimonial</p>
                <h4>Apa Kata Client Kami?</h4>
            </div>
            <div class="custom-nav owl-nav"></div>
            <div id="owl-carousel" class="owl-carousel owl-theme client-carousel col-md-5 text-center">
                <?php
                $query = "SELECT * FROM testimonial ORDER BY id ASC";
                $result = mysqli_query($koneksi2, $query);
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) . " - " . mysqli_error($koneksi2));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="item client-item">
                        <img src="assets/img/testimonial/<?php echo $row['testi_image']; ?>" alt="" class="rounded-circle mb-3">
                        <blockquote class="blockquote mb-0">
                            <p><?php echo $row['testi_text']; ?></p>
                            <footer class="blockquote-footer"><cite title="<?php echo $row['testi_client']; ?>"><?php echo $row['testi_client']; ?></cite></footer>
                        </blockquote>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="custom-dots owl-dots text-center"></div>
        </div>
    </section>


    
<!-- Order Now Section -->
<section id="contact" class="contact order">
    <div class="container">
        <div class="row text-content">
            <div class="col text-center mb-3">
                <h4>Order Now</h4>
                <p class="text-muted">Fill out the form below to place your order</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 mt-2">
                <?php if (isset($_GET['pesan'])) { ?>
                    <?php if ($_GET['pesan'] == "success") { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Pesan berhasil terkirim!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif ($_GET['pesan'] == "failed") { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Pesan gagal terkirim!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <form method="POST" action="action.php?act=order" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Package</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="paket" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status" required>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <button type="submit" id="btn-hero" class="btn btn-primary w-100">Submit Order</button>
                </div>
            </div>
        </form>
    </div>
</section>





<!-- Check Order Status Section -->
<section id="contact" class="contact order">
    <div class="container">
        <div class="row text-content">
            <div class="col text-center mb-3">
                <h4>Check Order Status</h4>
                <p class="text-muted">Enter your email address to check the status of your order</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5 mt-2">
                <?php if (isset($_GET['status_message'])) { ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <?php echo nl2br(htmlspecialchars(urldecode($_GET['status_message']))); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            </div>
        </div>
        <form method="POST" action="check_order_status.php">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="mb-3">
                        <label for="orderEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="orderEmail" placeholder="name@example.com" name="email" required>
                    </div>
                    <button type="submit" id="btn-check-status" class="btn btn-primary w-100">Check Status</button>
                </div>
            </div>
        </form>
    </div>
</section>



    <footer id="footer" class="footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="footer-item col-lg-3 col-md-6 mb-4">
                    <h3>Reza</h3>
                    <p>
                        Bekasi <br />
                        Jakarta, JL AHMAD YANI<br />
                        Indonesia <br /><br />
                        <strong>Phone:</strong>+62 822-1081-1378<br />
                        <strong>Email:</strong> m.rezahidayat.rh@gmail.com<br />
                    </p>
                </div>
                <div class="footer-item col-lg-3 col-md-6 mb-4">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="fa fa-angle-right"></i> <a href="#home">Home</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#about">About</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#gallery">Gallery</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="blog/index.php">Blog</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#client">Client</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="#contact">Order</a></li>
                    </ul>
                </div>
                <div class="footer-item col-lg-3 col-md-6">
                    <h4>My Social Network</h4>
                    <p>Hello I am Wedding Organizer Best In Indonesia</p>
                    <div class="social-links mt-3">
                        <a href="http://github.com/Rezapace" class="github" target="_blank"><i class="bi bi-github"></i></a>
                        <a href="https://wa.me/6289608780861" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        <a href="https://www.instagram.com/Rezapace" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="mailto:iqbalprasetya665@gmail.com" class="gmail" target="_blank"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <section id="copyright" class="copyright">
        <div class="container text-center content-card">
            <p>©Copyright 2024 <span>Reza</span>. All Rights Reserved</p>
            <p>Designed by <a href="https://github.com/RezaNRL" target="_blank">Reza</a></p>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        AOS.init({ once: true });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="vendor/owlcarousel/js/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Owl Carousel
        $('#owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            margin: 10,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.client .custom-nav',
            dotsContainer: '.client .custom-dots',
            items: 2,
            responsive: {
                0: { items: 1 },
                1000: { items: 2 }
            }
        });
    </script>
</body>

</html>
