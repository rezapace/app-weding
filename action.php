<?php
session_start();
require 'db-connect.php';

date_default_timezone_set("Asia/Jakarta");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// proses login
if (!empty($_GET['act'] == 'login')) {
  // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
  $user = $_POST['user_username'];
  $pass = $_POST['user_password'];
  $sql = "SELECT * FROM user WHERE user_username = ? AND user_password = md5(?)";
  $row = $koneksi->prepare($sql);
  $row->execute(array($user, $pass));
  $count = $row->rowCount();

  if ($count > 0) {
    $result = $row->fetch();
    $_SESSION['ADMIN'] = $result;
    // status yang diberikan
    echo "<script>window.location='admin/';</script>";
  } else {
    echo "<script>window.location='login/index.php?get=failed';</script>";
  }
}

if (!empty($_GET['act'] == 'logout')) {
  session_destroy();
  echo "<script>window.location='login/index.php?signout=success';</script>";
}

// proses register
if (!empty($_GET['act']) && $_GET['act'] == 'register') {
  $name = $_POST['new_name']; // Anda perlu menambahkan field ini di form registrasi
  $username = $_POST['new_username'];
  $password = $_POST['new_password'];
  $passwordHashed = md5($password);

  $query = "INSERT INTO user (name, user_username, user_password) VALUES (?, ?, ?)";
  $stmt = $koneksi->prepare($query);
  $stmt->execute([$name, $username, $passwordHashed]);
  
  if ($stmt) {
    header("location:login/index.php?register=success");
  } else {
    echo "Error: " . $stmt->errorInfo()[2];
  }
}

// Proses order
if (!empty($_GET['act']) && $_GET['act'] == 'order') {
    try {
        // Retrieve form data
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $paket = $_POST['paket'];
        $deskripsi = $_POST['deskripsi'];
        $status = $_POST['status'];

        // Check for required fields
        if (empty($nama) || empty($email) || empty($paket) || empty($status)) {
            throw new Exception("All fields are required.");
        }

        // Prepare and execute the query
        $query = "INSERT INTO `order` (nama, email, paket, deskripsi, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);

        if ($stmt->execute([$nama, $email, $paket, $deskripsi, $status])) {
            echo '<script>window.location = "index.php?pesan=success#order";</script>';
        } else {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Failed to execute query: SQLSTATE[{$errorInfo[0]}]: {$errorInfo[2]}");
        }
    } catch (Exception $e) {
        echo '<script>window.location = "index.php?pesan=failed#order";</script>';
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

// Tambah order
if (!empty($_GET['act']) && $_GET['act'] == 'add-order') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $paket = $_POST['paket'];
  $deskripsi = $_POST['deskripsi'];
  $status = $_POST['status'];

  $query = "INSERT INTO `order` (nama, email, paket, deskripsi, status) VALUES (?, ?, ?, ?, ?)";
  $stmt = $koneksi->prepare($query);
  $stmt->execute([$nama, $email, $paket, $deskripsi, $status]);
  
  if ($stmt) {
    echo "Order berhasil ditambahkan.";
  } else {
    echo "Error: " . $stmt->errorInfo()[2];
  }
}

// Edit order
if (!empty($_GET['act']) && $_GET['act'] == 'edit-order') {
  $id = $_POST['id'];
  $status = $_POST['status'];

  $query = "UPDATE `order` SET status=? WHERE id=?";
  $stmt = $koneksi->prepare($query);
  $stmt->execute([$status, $id]);

  if ($stmt) {
    echo "Order berhasil diupdate.";
  } else {
    echo "Gagal mengupdate order: " . $stmt->errorInfo()[2];
  }
}

// Hapus order
if (!empty($_GET['act']) && $_GET['act'] == 'delete-order') {
    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "DELETE FROM `order` WHERE id=?";
            $stmt = $koneksi->prepare($query);

            if ($stmt->execute([$id])) {
                header("Location: admin/index.php?page=order&pesan=hapus");
                exit();
            } else {
                $errorInfo = $stmt->errorInfo();
                throw new Exception("Failed to execute query: SQLSTATE[{$errorInfo[0]}]: {$errorInfo[2]}");
            }
        } else {
            throw new Exception("ID tidak ditemukan.");
        }
    } catch (Exception $e) {
        header("Location: admin/index.php?page=order&pesan=gagalhapus&error=" . urlencode($e->getMessage()));
        exit();
    }
}

// TAMBAH Features
if (!empty($_GET['act'] == "add-features")) {
  $features_name = $_POST['features_name'];
  $features_icon = $_POST['features_icon'];

  $query = mysqli_query($koneksi2, "INSERT INTO features(features_name, features_icon) VALUES ('$features_name', '$features_icon')");

  if ($query) {
    header("location:admin/index.php?page=features&pesan=tambah");
  } else {
    header("location:admin/index.php?page=features&pesan=gagal");
  }
}
//  END TAMBAH Features

// Edit Features
if (!empty($_GET['act'] == "edit-features")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

      $id = $_POST['id'];
      $features_name = $_POST['features_name'];
      $features_icon = $_POST['features_icon'];
    } else {
      header("location:admin/index.php?page=features");
    }

    $query = mysqli_query($koneksi2, "UPDATE features SET features_name='$features_name', features_icon='$features_icon' WHERE id='$id'");

    if ($query) {
      header("location:admin/index.php?page=features");
    } else {
      header("location:admin/index.php?page=features");
    }
  }
}
//  END Edit Features

// Delete Features
if (!empty($_GET['act'] == "delete-features")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi2, "DELETE FROM features WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=features&pesan=hapus");
      } else {
        header("location:admin/index.php?page=features&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=features");
    }
  } else {
    header("location:admin/index.php?page=features");
  }
}
//  END Delete features

// TAMBAH About
if (!empty($_GET['act'] == "add-about")) {
  $about_heading = $_POST['about_heading'];
  $about_text = $_POST['about_text'];

  $query = mysqli_query($koneksi2, "INSERT INTO about(about_heading, about_text) VALUES ('$about_heading', '$about_text')");

  if ($query) {
    header("location:admin/index.php?page=about&pesan=tambah");
  } else {
    header("location:admin/index.php?page=about&pesan=gagal");
  }
}
//  END TAMBAH About

// Edit About
if (!empty($_GET['act'] == "edit-about")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

      $id = $_POST['id'];
      $about_heading = $_POST['about_heading'];
      $about_text = $_POST['about_text'];
    } else {
      header("location:admin/index.php?page=about");
    }

    $query = mysqli_query($koneksi2, "UPDATE about SET about_heading='$about_heading', about_text='$about_text' WHERE id='$id'");

    if ($query) {
      header("location:admin/index.php?page=about");
    } else {
      header("location:admin/index.php?page=about");
    }
  }
}
//  END Edit About

// TAMBAH Packages
if (!empty($_GET['act'] == "add-packages")) {
  $packages_heading = $_POST['packages_heading'];
  $packages_price = $_POST['packages_price'];
  $packages_list = $_POST['packages_list'];

  $query = mysqli_query($koneksi2, "INSERT INTO packages(packages_heading, packages_price, packages_list) VALUES ('$packages_heading', '$packages_price', '$packages_list')");

  if ($query) {
    header("location:admin/index.php?page=packages&pesan=tambah");
  } else {
    header("location:admin/index.php?page=packages&pesan=gagal");
  }
}
//  END TAMBAH Packages

// Edit Packages
if (!empty($_GET['act'] == "edit-packages")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

      $id = $_POST['id'];
      $packages_heading = $_POST['packages_heading'];
      $packages_price = $_POST['packages_price'];
      $packages_list = $_POST['packages_list'];
    } else {
      header("location:admin/index.php?page=packages");
    }

    $query = mysqli_query($koneksi2, "UPDATE packages SET packages_heading='$packages_heading', packages_price='$packages_price', packages_list='$packages_list' WHERE id='$id'");

    if ($query) {
      header("location:admin/index.php?page=packages&pesan=berhasil");
    } else {
      header("location:admin/index.php?page=packages&pesan=gagal");
    }
  }
}
//  END Edit Packages

// Delete Packages
if (!empty($_GET['act'] == "delete-packages")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi2, "DELETE FROM packages WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=packages&pesan=hapus");
      } else {
        header("location:admin/index.php?page=packages&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=packages");
    }
  } else {
    header("location:admin/index.php?page=packages");
  }
}
//  END Delete Packages


// TAMBAH gallery
if (!empty($_GET['act'] == "add-gallery")) {
  $gallery_heading = $_POST['gallery_heading'];
  $gallery_desc = $_POST['gallery_desc'];
  $gallery_image_name = $_FILES['gallery_image']['name'];
  $gallery_image_size = $_FILES['gallery_image']['size'];

  if ($gallery_image_size > 2097152) {

    header("location:admin/index.php?page=gallery&pesan=size");
  } else {

    if ($gallery_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $gallery_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['gallery_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $gallery_image_name_new = $tanggal . '-' . $gallery_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/gallery/' . $gallery_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO gallery( gallery_heading, gallery_desc, gallery_image) VALUES ('$gallery_heading', '$gallery_desc', '$gallery_image_name_new')");

        if ($query) {
          header("location:admin/index.php?page=gallery&pesan=tambah");
        } else {
          header("location:admin/index.php?page=gallery&pesan=gagal");
        }
      } else {
        header("location:admin/index.php?page=gallery&pesan=ekstensi");
      }
    }
  }
}
//  END TAMBAH gallery

// Edit gallery
if (!empty($_GET['act'] == "edit-gallery")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $gallery_heading = $_POST['gallery_heading'];
      $gallery_desc = $_POST['gallery_desc'];
      $gallery_image_name = $_FILES['gallery_image']['name'];
      $gallery_image_size = $_FILES['gallery_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($gallery_image_size > 2097152) {
      header("location:admin/index.php?page=gallery&pesan=size");
    } else {

      if ($gallery_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $gallery_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['gallery_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $gallery_image_new = $tanggal . '-' . $gallery_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT gallery_image FROM gallery WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/gallery/" . $foto_lama['gallery_image']);

          move_uploaded_file($file_tmp, 'assets/img/gallery/' . $gallery_image_new);

          $query = mysqli_query($koneksi2, "UPDATE gallery SET gallery_heading='$gallery_heading', gallery_desc='$gallery_desc', gallery_image='$gallery_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin/index.php?page=gallery&pesan=berhasil");
          } else {
            header("location:admin/index.php?page=gallery&pesan=gagal");
          }
        } else {
          header("location:admin/index.php?page=gallery&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE gallery SET gallery_heading='$gallery_heading', gallery_desc='$gallery_desc' WHERE id='$id'");

        if ($query) {
          header("location:admin/index.php?page=gallery&pesan=berhasil");
        } else {
          header("location:admin/index.php?page=gallery&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin/index.php?page=gallery");
  }
}
//  END Edit gallery

// Delete gallery
if (!empty($_GET['act'] == "delete-gallery")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT gallery_image FROM gallery WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/gallery/" . $foto_lama['gallery_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM gallery WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=gallery&pesan=hapus");
      } else {
        header("location:admin/index.php?page=gallery&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin/index.php?page=gallery");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin/index.php?page=gallery");
  }
}
//  END Delete gallery

// TAMBAH blog
if (!empty($_GET['act'] == "add-blog")) {
  $blog_date = date('Y-m-d h:i:s');
  $blog_heading = $_POST['blog_heading'];
  $blog_text = $_POST['blog_text'];
  $blog_image_name = $_FILES['blog_image']['name'];
  $blog_image_size = $_FILES['blog_image']['size'];

  if ($blog_image_size > 2097152) {

    header("location:admin/index.php?page=blog&pesan=size");
  } else {

    if ($blog_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $blog_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['blog_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $blog_image_name_new = $tanggal . '-' . $blog_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/blog/' . $blog_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO blog(blog_date, blog_heading, blog_text, blog_image) VALUES ('$blog_date', '$blog_heading', '$blog_text', '$blog_image_name_new')");

        if ($query) {
          header("location:admin/index.php?page=blog&pesan=tambah");
        } else {
          header("location:admin/index.php?page=blog&pesan=gagal");
        }
      } else {
        header("location:admin/index.php?page=blog&pesan=ekstensi");
      }
    }
  }
}
//  END TAMBAH blog


// Edit blog
if (!empty($_GET['act'] == "edit-blog")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $blog_date = date('Y-m-d h:i:s');
      $blog_heading = $_POST['blog_heading'];
      $blog_text = $_POST['blog_text'];
      $blog_image_name = $_FILES['blog_image']['name'];
      $blog_image_size = $_FILES['blog_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($blog_image_size > 2097152) {
      header("location:admin/index.php?page=blog&pesan=size");
    } else {

      if ($blog_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $blog_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['blog_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $blog_image_new = $tanggal . '-' . $blog_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT blog_image FROM blog WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/blog/" . $foto_lama['blog_image']);

          move_uploaded_file($file_tmp, 'assets/img/blog/' . $blog_image_new);

          $query = mysqli_query($koneksi2, "UPDATE blog SET blog_date='$blog_date', blog_heading='$blog_heading', blog_text='$blog_text', blog_image='$blog_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin/index.php?page=blog&pesan=berhasil");
          } else {
            header("location:admin/index.php?page=blog&pesan=gagal");
          }
        } else {
          header("location:admin/index.php?page=blog&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE blog SET blog_date='$blog_date', blog_heading='$blog_heading', blog_text='$blog_text' WHERE id='$id'");

        if ($query) {
          header("location:admin/index.php?page=blog&pesan=berhasil");
        } else {
          header("location:admin/index.php?page=blog&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin/index.php?page=blog");
  }
}
//  END Edit blog

// Delete blog
if (!empty($_GET['act'] == "delete-blog")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT blog_image FROM blog WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/blog/" . $foto_lama['blog_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM blog WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=blog&pesan=hapus");
      } else {
        header("location:admin/index.php?page=blog&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin/index.php?page=blog");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin/index.php?page=blog");
  }
}
//  END Delete blog


// TAMBAH testi
if (!empty($_GET['act'] == "add-testi")) {
  $testi_text = $_POST['testi_text'];
  $testi_client = $_POST['testi_client'];
  $testi_image_name = $_FILES['testi_image']['name'];
  $testi_image_size = $_FILES['testi_image']['size'];

  if ($testi_image_size > 2097152) {

    header("location:admin/index.php?page=testi&pesan=size");
  } else {

    if ($testi_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $testi_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['testi_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $testi_image_name_new = $tanggal . '-' . $testi_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/testimonial/' . $testi_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO testimonial(testi_text, testi_client, testi_image) VALUES ('$testi_text', '$testi_client', '$testi_image_name_new')");

        if ($query) {
          header("location:admin/index.php?page=testi&pesan=tambah");
        } else {
          header("location:admin/index.php?page=testi&pesan=gagal");
        }
      } else {
        header("location:admin/index.php?page=testi&pesan=ekstensi");
      }
    }
  }
}
//  END TAMBAH testi

// Edit testi
if (!empty($_GET['act'] == "edit-testi")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $testi_text = $_POST['testi_text'];
      $testi_client = $_POST['testi_client'];
      $testi_image_name = $_FILES['testi_image']['name'];
      $testi_image_size = $_FILES['testi_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($testi_image_size > 2097152) {
      header("location:admin/index.php?page=testi&pesan=size");
    } else {

      if ($testi_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $testi_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['testi_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $testi_image_new = $tanggal . '-' . $testi_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT testi_image FROM testimonial WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/testimonial/" . $foto_lama['testi_image']);

          move_uploaded_file($file_tmp, 'assets/img/testimonial/' . $testi_image_new);
          $query = mysqli_query($koneksi2, "UPDATE testimonial SET testi_text='$testi_text', testi_client='$testi_client', testi_image='$testi_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin/index.php?page=testi&pesan=berhasil");
          } else {
            header("location:admin/index.php?page=testi&pesan=gagal");
          }
        } else {
          header("location:admin/index.php?page=testi&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE testimonial SET testi_text='$testi_text', testi_client='$testi_client' WHERE id='$id'");

        if ($query) {
          header("location:admin/index.php?page=testi&pesan=berhasil");
        } else {
          header("location:admin/index.php?page=testi&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin/index.php?page=testi");
  }
}
//  END Edit testi

// Delete testi
if (!empty($_GET['act'] == "delete-testi")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT testi_image FROM testimonial WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/testimonial/" . $foto_lama['testi_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM testimonial WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=testi&pesan=hapus");
      } else {
        header("location:admin/index.php?page=testi&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin/index.php?page=testi");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin/index.php?page=testi");
  }
}
//  END Delete blog

// TAMBAH contact
if (!empty($_GET['act'] == "add-contact")) {
  $contact_date = date('Y-m-d h:i:s');
  $contact_name = $_POST['contact_name'];
  $contact_email = $_POST['contact_email'];
  $contact_subject = $_POST['contact_subject'];
  $contact_message = $_POST['contact_message'];

  $query = mysqli_query($koneksi2, "INSERT INTO contact(contact_date, contact_name, contact_email, contact_subject, contact_message) VALUES ('$contact_date', '$contact_name', '$contact_email', '$contact_subject', '$contact_message')");

  if ($query) {
    echo '<script>window.location = "index.php?pesan=success#contact";</script>';
    echo '<script>alert("Pesan Berhasil Terkirim :)")</script>';
  } else {
    header("location:index.php#contact");
  }
}
//  END TAMBAH contact

// Delete contact
if (!empty($_GET['act'] == "delete-contact")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi2, "DELETE FROM contact WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=contact&pesan=hapus");
      } else {
        header("location:admin/index.php?page=contact&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=contact");
    }
  } else {
    header("location:admin/index.php?page=contact");
  }
}
//  END Delete contact