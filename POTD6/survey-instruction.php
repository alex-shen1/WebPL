<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>PHP State Maintenance (Session)</title>
    <style>
      a:hover { background-color:white; }
    </style>
</head>
<body>

<!-- Join the same session -->
<?php session_start(); ?>

  <div class="container p-5">
    <h1>Welcome,
      <font color="green" style="font-style:italic">
        <?php if (isset($_SESSION['user'])) echo $_SESSION['user'] ?>
      </font>
    </h1>
    <p>
      The purpose of this activity is
      to help you practice and experience state management mechanism in PHP.
      You will use cookies to maintain information (i.e., state) among HTTP requests.
    </p>
    <p>
      To complete this activity, you will implement an online survey.
      The survey consists of at least 4 questions, each of which is displayed on a separated screen.
      You are free to create any questions of your choices.
      The only constraint is that the questions must be appropriate for college students and classroom environment.
    </p>
    <p>
      You may format the screens as you wish as long as you
      follow the usability guidelines from class. Get creative.
      Feel free to add additional elements you feel should be included and have fun!
    </p>
    <p>
      Let's <a href="question1.php" title="This link does not work now. Question must be implemented">start the survey</a>.
      <br/><br/>
      Or <a href="logout.php">log out</a>.
    </p>

    <div id="sessionInfo">
      <hr/>
      So far, $_SESSION (<?php echo session_id() ?>) contains:<br/>
      <?php
        foreach ($_SESSION as $k => $v)
          echo "$k : $v <br/>";
      ?>
    </div>

  </div>
  <br/>

</body>
</html>
