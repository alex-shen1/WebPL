<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>PHP State Maintenance (Cookies)</title>
</head>
<body>

<!-- Join the same session -->
<?php session_start(); ?>

  <div class="container p-5">
    <h1>CS4640 Survey</h1>
    Successfully logged out

    <div id="sessionInfo">
      <hr/>
      $_SESSION (<?php echo session_id() ?>) contained:<br/>
      <?php
        foreach ($_SESSION as $k => $v)
          echo "$k : $v <br/>";
      ?>
    </div>

    <div id="logout">
      <hr/>
      <?php
      if (count($_SESSION) > 0)
      {
        foreach ($_SESSION as $k => $v)
        {
          unset($_SESSION[$k]); // removes items on server-side
        }
        session_destroy();

        echo "sessionID = " . session_id() . "<br/>";

        setcookie("PHPSESSID", "", time()-3600, "/"); // removes items on client-side
      }
      ?>
    </div>

  </div>



</body>
</html>
