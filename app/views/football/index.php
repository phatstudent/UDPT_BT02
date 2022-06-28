<?php $this->view("football/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex home-page">
  <?php $this->view("football/layout/sidebar", $data) ?>
  <div class="right-area w-100 h-100">
    <div class="text-warning mx-auto mt-5"><h1>This iz Trang Chu</h1></div>
  </div>
</main>

<!-- FOOTER -->
<?php $this->view("football/layout/footer", $data) ?>