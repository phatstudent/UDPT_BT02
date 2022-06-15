<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['page_title']. " | " .WEBSITE_TITLE ?></title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1 /css/ionicons.min.css"> -->


    <link rel="stylesheet" href="<?=ASSETS?>football/css/my_css.css">
    <link rel="stylesheet" href="<?=ASSETS?>football/css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>football/css/footer.css">
    
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

                <li class="nav-item dropdown megamenu"><a id="megamneu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle font-weight-bold ">Menu</a>
                  <div aria-labelledby="megamneu" class="dropdown-menu border-0 p-0 m-0">
                    <div class="container">
                      <div class="row bg-white rounded-0 m-0 shadow-sm">
                        <div class="col-lg-12 col-xl-12">
                          <div class="p-4">
                            <div class="row">
                              <div class="col-lg-6 mb-4">
                                <h6 class="font-weight-bold text-uppercase">Player</h6>
                                <ul class="list-unstyled">
                                  <li class="nav-item"><a href="<?=ROOT?>players" class="nav-link text-small pb-0">show all</a></li>
                                </ul>
                              </div>
                              <div class="col-lg-6 mb-4">
                                <h6 class="font-weight-bold text-uppercase">Club</h6>
                                <ul class="list-unstyled">
                                  <li class="nav-item"><a href="<?=ROOT?>clubs" class="nav-link text-small pb-0 ">show all</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                  <li class="nav-item">
                  <a class="nav-link" href="http://www.arkism.me">About</a>
                </li>

                <?php if(!isset($_SESSION['user_name'])): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=ROOT?>login">LogIn</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=ROOT?>signup">SignUp</a>
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