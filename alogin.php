<?
<html>

<head>

  <meta charset="UTF-8">

  <title>Administrator Login Form</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>
<span href="./home2.php" class="button" id="toggle-login"><a href="./home2.php">Home</a></span>
  <span href="#" class="button" id="toggle-login">Administrator</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
  <form action="admin.php" method="post">
    <input type="uid" placeholder="userid" name="aid"/>
    <input type="password" placeholder="Password" name="apswd"/>
    <input type="submit" value="Log in" name="alogin" />
  </form>
</div>


</body>

</html>
?>