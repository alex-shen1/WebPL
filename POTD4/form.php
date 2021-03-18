<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP form handling</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        label { display: block; }
        input, textarea { display:inline-block; font-family:arial; margin: 5px 10px 5px 40px; padding: 8px 12px 8px 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; width: 90%; font-size: small; }
        div { margin-left: auto; margin-right: auto; width: 60%; }
        h1 { text-align: center; }
        input[type=submit] { padding:5px 15px; border:0 none; cursor:pointer; border-radius: 5px; }
        input[type=submit]:hover { background-color: #ccceee; }
        .msg { margin-left:40px; font-style: italic; color: red; }
        html{ height:100%; }
        body{ min-height:100%; padding:0; margin:0; position:relative; }
        footer { position: absolute; bottom: 0; width: 100%; height: 50px; color: WhiteSmoke; padding: 10px; }
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
            <a class="nav-link" href="potd.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form.php">Submit a Comment</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container py-4">
      <h1>Submit a Comment</h1>

      <!-- what are form inputs -->
      <!-- who will handle the form submission -->
      <!-- how are the request sent -->

      <form action="form.php" method="POST">
          <label>Name: </label>
          <input type="text" name="name" autofocus /> <br/>
          <label>Email:</label>
          <input type="email" name="emailaddr" /> <br/>
          <label>Comment: </label>
          <textarea rows="5" cols="40" name="comment"></textarea> <br/>

          <input type="submit" value="Submit" class="btn btn-secondary" />
      </form>

    </div>

    <div class="my-5 w-100">
      <div class="alert alert-success" role="alert">
        <?php
        validate();
        ?>
      </div>
    </div>

  </div>

  <footer class="primary-footer bg-info">
    <small class="copyright">&copy; 2021 Jennifer Long (rz5sc), Alex Shen (as5gd)</small>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

<?php
function validate()
{
    try{
        if (!empty($_POST['name']) && !empty($_POST['emailaddr']) && !empty($_POST['comment'])) {
            echo "Comment submitted.<br/>";
            echo "Name: ";
            echo $_POST['name'];
            echo "<br/>Email address: ";
            echo $_POST['emailaddr'];
            echo "<br/>Comment: ";
            echo $_POST['comment'];
        }
        else{
            echo "Make sure all fields are completed.";
        }
    } catch (Exception $e){
        echo $e;
    }

}
// validate();
?>

</html>
