<?php $this->view("football/layout/header", $data) ?>

<main role="main" class="d-flex login-page">
    <?php check_messenger()?>
    <div class="form">
      <form class="register-form" method="post">
        <input type="text" name="username" placeholder="name"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="text" name="email" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form class="login-form" method="post">
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <button>login</button>
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
    </div>
</main>

<script>
  $('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
  });
</script>

<?php $this->view("football/layout/footer", $data) ?>