<?php
include_once("./path.php");
include_once('app/controllers/users.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title>Login</title>
</head>

<body>

  <?php include_once 'app/include/header.php'; ?>

  <div class="auth-content">

    <form action="login.php" class="login" method="post">
      <h2 class="form-title">Login</h2>
      <?php include 'app/helpers/formErrors.php' ?>
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" class="text-input" value="<?php echo $username; ?>">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" class="text-input" value="<?php echo $password; ?>">
      </div>
      <div class="input-group">
        <button type="submit" name="login-btn" class="btn btn-big ">Login</button>
      </div>
      <p>Or <a href="register.php">Sign Up</a></p>
    </form>
  </div>



  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

</body>

</html>