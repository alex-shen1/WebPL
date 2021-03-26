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

     
  <div class="container">
    <div style="float:right; padding:30px;">    
      <form action="logout.php" method="get">
        <input type="submit" value="Log out" class="btn btn-dark" />
      </form>
    </div>    
    
    <h1>Welcome <font color="green" style="font-style:italic">username</font> </h1>
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
    Previous question: you answered <font color="green" style="font-style:italic">answer from previous question</font>

  </div>

</body>
</html>
