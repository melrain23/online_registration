<?php 
    include_once 'includes/session.php'
?>
<!doctype html>
<html lang="er" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />
    
    <title>Online Registration - <?php echo $title ?></title>
  </head> 
  <body>
  <nav class="p-3 navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Online Application</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="viewrecords.php">View Registrants</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <?php 
              if(!isset($_SESSION['userid'])){
          ?>
            <a class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
        <?php } else { ?>
            <a class="nav-item nav-link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
          <?php } ?>
      </div>
      </div>
    </div>
  </nav>   
    <div class="container">
  <br/>