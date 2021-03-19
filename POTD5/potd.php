<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP form handling</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        label {
            display: block;
        }

        input, textarea {
            display: inline-block;
            font-family: arial;
            margin: 5px 10px 5px 40px;
            padding: 8px 12px 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 90%;
            font-size: small;
        }

        div {
            margin-left: auto;
            margin-right: auto;
            width: 60%;
        }

        h1 {
            text-align: center;
        }

        input[type=submit] {
            padding: 5px 15px;
            border: 0 none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type=submit]:hover {
            background-color: #ccceee;
        }

        .msg {
            margin-left: 40px;
            font-style: italic;
            color: red;
        }

        html {
            height: 100%;
        }

        body {
            min-height: 100%;
            padding: 0;
            margin: 0;
            position: relative;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
            color: WhiteSmoke;
            padding: 10px;
        }
    </style>
</head>

<body>

<header>
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
        <a class="navbar-brand" href="#">WebPL POTD 4: PHP Form Handling</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.php">Submit a Comment</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="container py-4">
    <h1>Login</h1>
    <form action="potd.php" method="GET">

        Username: <input type="text" name="name" required/> <br/>
        Password: <input type="password" name="pwd" required/> <br/>
        <input type="hidden" name="attempt"
               value="<?php if (isset($_GET['attempt'])) echo $_GET['attempt'] + 1; else echo 1 ?>">
        <input type="submit" value="Submit"
               class="btn btn-secondary" <?php if (isset($_GET['attempt']) && $_GET['attempt'] >= 3) echo 'disabled' ?>/>
    </form>

    <?php
    authenticate();
    ?>


</div>


<footer class="primary-footer bg-info">
    <small class="copyright">&copy; 2021 Jennifer Long (rz5sc), Alex Shen (as5gd)</small>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>

<?php
function authenticate()
{
    // Valid credentials are "username", "password"
    // Hash generated with: echo password_hash('password',PASSWORD_BCRYPT);
    $hash = '$2y$10$yLagqKxgUQlIk71elu8TWOyCTAEe.iFtOn/GkCPCMPCB9D1HjkeTq';

    if (isset($_GET['name']) && isset($_GET['pwd'])) {
        // Check if field exists before access
        $username = htmlspecialchars($_GET['name']);
        $pwd = htmlspecialchars($_GET['pwd']);
        if (password_verify($pwd, $hash) && $username == "username") {
            // echo "Password verified";
            header("Location: form.php?name=$username"); // Redirects to form.php
        } else if (isset($_GET['attempt']) && $_GET['attempt'] >= 3) {
            echo '
        <div class="my-5 w-100">
            <div class="alert alert-danger" role="alert">            
            You have attempted to login 3 times unsuccessfully. We have locked your ability to log in.
            </div>
        </div>';
        } else {
            echo '
        <div class="my-5 w-100">
        <div class="alert alert-danger" role="alert">Username or password does not match our record.</div>
        </div>';
        }
    }

}

?>

</html>
