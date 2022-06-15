<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['page_title']. " | " .WEBSITE_TITLE ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?=ASSETS?>football/css/my_css.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="<?=ASSETS?>football/css/template-style.css">
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
            <a class="navbar-brand" href="#">
              <img class="logo-before" style="max-width: 70px;" src="<?=ASSETS?>football/img/logo-dark.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarResponsive">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="<?=ROOT?>home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=ROOT?>signup">SignUp</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </header>