<!DOCTYPE html>
<html lang="en">

<!-- ======= Header ======= -->
<?php if($currentPage == "Home"):?>
  <header id="header" class="fixed-top  d-flex justify-content-center align-items-center header-transparent">
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?= ($currentPage == 'Home') ? 'active' : '' ?>"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact Us</a></li>
          
        </ul>
      </nav><!-- .nav-menu -->
  </header><!-- End Header -->
<?php else:?>
  <header id="header" class="fixed-top  d-flex justify-content-center align-items-center header-transparent" style="height: 60px;background: rgba(25, 28, 31, 0.8);">
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?= ($currentPage == 'Home') ? 'active' : '' ?>"><a href="home.php">Home</a></li>
          <li class="<?= ($currentPage == 'About Us') ? 'active' : '' ?>"><a href="about.php">About Us</a></li>
          <li class="<?= ($currentPage == 'Our Service' || $currentPage == 'Book Service') ? 'active' : '' ?>"><a href="services.php">Services</a></li>
          <li class="<?= ($currentPage == 'Portfolio') ? 'active' : '' ?>"><a href="portfolio.php">Portfolio</a></li>
          <li class="<?= ($currentPage == 'Contact Us') ? 'active' : '' ?>"><a href="contact.php">Contact Us</a></li>
          <li><a href="#">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->
  </header><!-- End Header -->
<?php endif;?>

</html>