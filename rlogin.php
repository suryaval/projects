<?
<html>

<head>

  <meta charset="UTF-8">

  <title>Reviewer Login Form</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>
<span href="./home2.php" class="button" id="toggle-login"><a href="./home2.php">Home</a></span>
  <span href="#" class="button" id="toggle-login">Reviewer</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
  <form action="review.php" method="POST">
    <input type="uid" placeholder="Userid" name="usid"/>
    <input type="password" placeholder="Password" name="pswrd"/>
    <input type="submit" value="Log in" name="rlogin"/>
  </form>
</div>
</body>
</html>
?>