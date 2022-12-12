<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php if($currentPage == "Home"): ?>
    <title><?= $currentPage?></title>
  <?php else:?>
    <title>Fotomoto Photograph - <?= $currentPage?></title>
  <?php endif;?>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/Icon/fotomotoicon.png" rel="icon">
  <link href="assets/img/Icon/fotomotoicon.png" rel="apple-touch-icon">

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

  <!-- CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Main CSS File -->
  <?php if($currentPage == "Sign In" || $currentPage == "Sign Up"):?>
        <link href="assets/css/index.css" rel="stylesheet">
  <?php else:?>
        <link href="assets/css/style.css" rel="stylesheet">
  <?php endif;?>
</head>

</html>