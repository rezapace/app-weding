<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../db-connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - Reza</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">

    <style>
        <?php
        include "assets/css/style.css";
        ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font-Awesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Reza</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link mx-2" href="../index.php">Home</a>
                    <a class="nav-link mx-2" href="../index.php#about">About</a>
                    <a class="nav-link mx-2" href="../index.php#gallery">Gallery</a>
                    <a class="nav-link mx-2" href="#blog">Blog</a>
                    <a class="nav-link mx-2" href="../index.php#client">Client</a>
                    <a class="nav-link mx-2" href="../index.php#contact">Contact</a>
                </div>
                <a href="login/" id="btn-hero" class="btn-hero" target="_blank">Login</a>
            </div>

        </div>
    </nav>

    <section id="blog" class="blog">
        <div class="container">
            <div class="heading-text text-center mb-5">
                <p class="text-p">&#128221; Blog Post</p>
                <h4>Blog</h4>
            </div>
            <div class="row justify-content-center">
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
                        <img src="../assets/img/blog/<?php echo $row['blog_image']; ?>" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <div class="author">
                                <p><span><?php echo date('M d Y', strtotime($row['blog_date'])); ?></span> / Reza</p>
                            </div>
                            <h5 class="card-title"><?php echo $row['blog_heading']; ?></h5>
                            <p class="card-text"><?php echo substr($row['blog_text'], 0, 150); ?>...</p>
                            <a href="page.php?id=<?php echo $row['id']; ?>" class="second-btn">Read More</a>
                        </div>
                    </div>

                <?php
                    $no++;
                }
                ?>



            </div>
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
                        <li><i class="fa fa-angle-right"></i> <a href="../index.php#home">Home</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="../index.php#about">About</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="../index.php#gallery">Gallery</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="index.php">Blog</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="../index.php#client">Client</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href="../index.php#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-item col-lg-3 col-md-6">
                    <h4>My Social Network</h4>
                    <p>Hello iam Weding Organizer Best In Indonesia</p>
                    <div class="social-links mt-3">
                        <a href="https://github.com/Rezapace/" class="github" target="_blank"><i class="bi bi-github"></i></a>
                        <a href="https://wa.me/6289608780861" class="whatsapp" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        <a href="https://www.instagram.com/Rezapace" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="mailto:iqbalprasetya665@gmail.com" class="gmail" target="_blank"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright -->
    <section id="copyright" class="copyright">
        <div class="container text-center content-card">
            <p>
                ©Copyright 2022 <span>Reza</span>. All Rights Reserved
            </p>
            <p>
                Designed by <a href="https://github.com/Rezapace/" target="_blank">Reza</a>
            </p>


        </div>
    </section>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>