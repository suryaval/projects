<?
<html>

<head>

  <meta charset="UTF-8">

  <title>Customer Feedback Login Form</title>
<span href="./home2.php" class="button" id="toggle-login"><a href="./home2.php">Home</a></span>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <span href="#" class="button" id="toggle-login">Customer</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
  <form action="customer_page.php" method="POST">
    <input type="uid" placeholder="customer id" name="usid"/>
    <input type="password" placeholder="quote id" name="pswd"/>
    <input type="submit" value="Log in" name="clogin"/>
  </form>
</div>

</body>

</html>
?>