<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>PHP State Maintenance (Session)</title>
</head>
<body>

<!-- Built-in PHP session manager: https://www.php.net/manual/en/function.session-start.php -->
<?php session_start(); ?>

  <div class="container p-5">
    <h1>Welcome to CS4640 Survey</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      Name: <input type="text" name="username" class="form-control" autofocus required /> <br/>
      Password: <input type="password" name="pwd" class="form-control" required /> <br/>
      <input type="submit" value="Sign in" class="btn btn-light" />
    </form>
  </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['username']))
{
  $_SESSION['user'] = $_POST['username'];
  $_SESSION['pwd'] = $_POST['pwd'];
  header('Location: survey-instruction.php');
}

?>

</body>
</html>
