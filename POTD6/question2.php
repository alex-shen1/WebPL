<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
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
    <h3>Question 2: Who is your most favorite instructor?</h3>
        <br/>Warning! Incorrect answer may impact your course grade
        <i class="em em-wink" aria-role="presentation" aria-label="WINKING FACE"></i>
    </h3>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <!-- Notice that the names of all radio button must be the same to group them, i.e., only option can be selected
           What happen if the names are different ? -->
      <input type="radio" name="favorite_instr" value="Upsorn" checked> Upsorn, CS 4640 instructor <br />
      <input type="radio" name="favorite_instr" value="Upsorn P"> Upsorn P, CS 4640 intsructor <br />
      <input type="radio" name="favorite_instr" value="Upsorn Praphamontripong" > Upsorn Praphamontripong <br />
      <input type="submit" value="Submit" class="btn btn-light"  />
    </form>

    <br/>
    <div id="prevAnswer">
        Previous answers: <br/>
      <font color="green" style="font-style:italic">
        <?php if (isset($_SESSION['lunch'])) echo 'You had '. $_SESSION['lunch']. ' for lunch <br/>'?>
      </font>
    </div>
      <?php
      if (!isset($_SESSION) || !isset($_SESSION['pwd']) || !isset($_SESSION['user'])) {
          header("Location: login.php");
      }
      ?>

  </div>

<?php
// If form is submitted, save the information
if (isset($_POST['favorite_instr']))
{
  $_SESSION['favorite_instr'] = $_POST['favorite_instr'];
  header('Location: question3.php');
}
?>

</body>
</html>
