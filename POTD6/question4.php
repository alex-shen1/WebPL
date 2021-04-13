<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>PHP State Maintenance (Session)</title>
</head>
<body>

<!-- Join the same session -->
<?php session_start(); ?>

<div class="container p-5">
    <div class="pt-2 float-right">
        <form action="logout.php" method="get">
            <input type="submit" value="Log out" class="btn btn-dark" />
        </form>
    </div>

    <h1>Welcome,
        <font color="green" style="font-style:italic">
            <?php if (isset($_SESSION['user'])) echo $_SESSION['user'] ?>
        </font>
    </h1>

    <h3>Question 4: What is your favorite class?</h3>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="class" class="form-control" autofocus required /> <br />
        <input type="submit" value="Submit" class="btn btn-light"  />
    </form>

    <br/>
    <div id="prevAnswer">
        Previous answers: <br/>
        <font color="green" style="font-style:italic">
            <?php if (isset($_SESSION['lunch'])) echo 'You had ' . $_SESSION['lunch'] . 'for lunch <br/>' ?>
            <?php if (isset($_SESSION['favorite_instr'])) echo 'Your favorite instructor is ' . $_SESSION['favorite_instr'] . '<br/>' ?>
            <?php if (isset($_SESSION['pasttime'])) echo 'Your favorite pastime is ' . $_SESSION['pasttime'] ?>
        </font>
    </div>
    <?php
    if (!isset($_SESSION) || !isset($_SESSION['pwd']) || !isset($_SESSION['user'])) {
        header("Location: login.php");
    }
    ?>

    <?php
    // If form is submitted, save the information
    if (isset($_POST['class']))
    {
        $_SESSION['class'] = $_POST['class'];
        header('Location: logout.php');
    }
    ?>

</body>
</html>
