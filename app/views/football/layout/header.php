<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['page_title']. " | " .WEBSITE_TITLE ?></title>

    <!-- Web Style -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="<?=ASSETS?>football/css/my_css.css">
    <link rel="stylesheet" href="<?=ASSETS?>football/css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>football/css/footer.css">
    <link rel="stylesheet" href="<?=ASSETS?>football/css/sidebar.css">
    
    <!-- CUSTOM STYLE -->      
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,400,600,900&subset=latin-ext" rel="stylesheet"> 


    
  </head>

  <body class="size-1140">
  	<!-- PREMIUM FEATURES BUTTON -->
    <div id="page-wrapper">
      <!-- HEADER -->
 
      <header role="banner" class="position-absolute margin-top-30 margin-m-top-0 margin-s-top-0">    
        <!-- Top Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
          <div class="container">
            <a class="navbar-brand" href="<?=ROOT?>home">
              <img class="logo-before" style="max-width: 70px;" src="<?=ASSETS?>football/img/logo-dark.png" alt="">
            </a>
            
            <?php if(isset($_SESSION['user_name'])): ?>
                <!-- <p>Hi <?=$_SESSION['user_name']?></p? -->
            <?php endif; ?>


            <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarResponsive">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://www.arkism.me">About</a>
                </li>

                <?php if(!isset($_SESSION['user_name'])): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=ROOT?>login">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=ROOT?>signup">Signup</a>
                  </li>
                <?php else: ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=ROOT?>logout">Logout</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>
      </header>