<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>PHP State Maintenance (Session)</title>
</head>
<body>

<!-- Built-in PHP session manager: https://www.php.net/manual/en/function.session-start.php -->
<?php session_start(); ?>

<div class="container p-5">
    <h1>Welcome to CS4640 Survey</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        Name: <input type="text" name="username" class="form-control" autofocus required/> <br/>
        Password: <input type="password" name="pwd" class="form-control" required/> <br/>
        <input type="submit" value="Sign in" class="btn btn-success"/>
    </form>

    <?php
    authenticate();
    ?>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['username'])) {
   $_SESSION['user'] = $_POST['username'];
   $_SESSION['pwd'] = $_POST['pwd'];
   // header('Location: survey-instruction.php');
}

?>

<?php
function authenticate()
{
    // Valid credentials are "username", "password"
    // Hash generated with: echo password_hash('password',PASSWORD_BCRYPT);
    $hash = '$2y$10$yLagqKxgUQlIk71elu8TWOyCTAEe.iFtOn/GkCPCMPCB9D1HjkeTq';

    if (isset($_POST['username']) && isset($_POST['pwd'])) {
        // Check if field exists before access
        $username = htmlspecialchars($_POST['username']);
        $pwd = htmlspecialchars($_POST['pwd']);
        if (password_verify($pwd, $hash) && $username == "username") {
            // echo "Password verified";
            header('Location: survey-instruction.php');
        } else {
            echo '
        <div class="my-5 w-100">
        <div class="alert alert-danger" role="alert">Username or password does not match our record.</div>
        </div>';
        }
    }

}

?>

</body>
</html>
