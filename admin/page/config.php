<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {


    // Page
  case 'features':
    include "features.php";
    break;

  case 'add-features':
    include "add-features.php";
    break;

  case 'edit-features':
    include "edit-features.php";
    break;

  case 'about':
    include "about.php";
    break;

  case 'add-about':
    include "add-about.php";
    break;

  case 'edit-about':
    include "edit-about.php";
    break;

  case 'packages':
    include "packages.php";
    break;

  case 'add-packages':
    include "add-packages.php";
    break;

  case 'edit-packages':
    include "edit-packages.php";
    break;

  case 'gallery':
    include "gallery.php";
    break;

  case 'add-gallery':
    include "add-gallery.php";
    break;

  case 'edit-gallery':
    include "edit-gallery.php";
    break;

  case 'blog':
    include "blog.php";
    break;

  case 'add-blog':
    include "add-blog.php";
    break;

  case 'edit-blog':
    include "edit-blog.php";
    break;

    case 'order':
      include "order.php";
      break;

  case 'add-order':
      include "add-order.php";
      break;

  case 'edit-order':
      include "edit-order.php";
      break;
      
  case 'testi':
    include "testimonial.php";
    break;

  case 'add-testi':
    include "add-testimonial.php";
    break;

  case 'edit-testi':
    include "edit-testimonial.php";
    break;

  case 'contact':
    include "contact.php";
    break;




  default:
    include "dashboard.php";
}
