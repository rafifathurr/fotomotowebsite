<!DOCTYPE html>
<html lang="en">

<!-- ======= Header ======= -->
<?php if(!isset($_SESSION["key"])): ?>
<header id="header" class="fixed-top  d-flex justify-content-center align-items-center">
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <?php if($currentPage == "Home"):?>
          <li class="<?= ($currentPage == 'Home') ? 'active' : '' ?>"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact Us</a></li>
        <?php else:?>
          <li class="<?= ($currentPage == 'Home') ? 'active' : '' ?>"><a href="home.php">Home</a></li>
          <li class="<?= ($currentPage == 'About Us') ? 'active' : '' ?>"><a href="about.php">About Us</a></li>
          <li class="<?= ($currentPage == 'Our Service' || $currentPage == 'Book Service') ? 'active' : '' ?>"><a href="services.php">Services</a></li>
          <li class="<?= ($currentPage == 'Portfolio') ? 'active' : '' ?>"><a href="portfolio.php">Portfolio</a></li>
          <li class="<?= ($currentPage == 'Contact Us') ? 'active' : '' ?>"><a href="contact.php">Contact Us</a></li>
        <?php endif;?>
          <li><a href="signin.php">Sign In</a></li>
        </ul>
      </nav><!-- .nav-menu -->
  </header><!-- End Header -->
<?php else:?>
  <header id="header" class="fixed-top  d-flex justify-content-center align-items-center">
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <?php if($currentPage == "Home"):?>
          <li class="<?= ($currentPage == 'Home') ? 'active' : '' ?>"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact Us</a></li>
        <?php else:?>
          <li class="<?= ($currentPage == 'Home') ? 'active' : '' ?>"><a href="home.php">Home</a></li>
          <li class="<?= ($currentPage == 'About Us') ? 'active' : '' ?>"><a href="about.php">About Us</a></li>
          <li class="<?= ($currentPage == 'Our Service' || $currentPage == 'Book Service') ? 'active' : '' ?>"><a href="services.php">Services</a></li>
          <li class="<?= ($currentPage == 'Portfolio') ? 'active' : '' ?>"><a href="portfolio.php">Portfolio</a></li>
          <li class="<?= ($currentPage == 'Contact Us') ? 'active' : '' ?>"><a href="contact.php">Contact Us</a></li>
        <?php endif;?>
          <li class="drop-down"><a href="#"><span><?=$_SESSION["name"];?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="mycheckout.php">My Checkout</a></li>
              <li><a href="mybooking.php">My Booking</a></li>
              <li><a href="history.php">History Booking</a></li>
              <li><a href="mytestimoni.php">My Testimoni</a></li>
              <li><a href="changepassword.php">Change Password</a></li>
              <li><a href="signout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
  </header><!-- End Header -->
<?php endif;?>

</html>