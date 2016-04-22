<?php
	session_start();
	if(isset($_SESSION['prihlasen'])){
    echo '<script type="text/javascript">';
    echo 'window.location.href="index.php";';
    echo '</script>';
  }
?>
<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>E-shop / Administration</title>
  <meta charset="UTF-8" />
  <link href="../../../static/css/login.css" type= "text/css" rel = "stylesheet" title="style"/>
</head>
<body>
    <div class="login">
    <form action="../../../administrace/validation.php" method="post" class="action">
        Jmeno : <input type="text" name="jmeno" class="nick" autofocus><br />
        Prijmeni : <input type="password" name="heslo" class="pass"><br />
    <input type="submit" value="prihlasit k administraci" class="submit">
    </form>
    <br />
</div>
</body>
</html>