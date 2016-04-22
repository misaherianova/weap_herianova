<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 * Date: 19.04.2016
 * Time: 11:30
 */

//kdyz to otevru natvrdo - nefunguje to  = musim pres index
if(!defined('BASE_DIR')) die('no direct script acess'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title;?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php echo STATIC_DIR;?>css/style.css" rel="stylesheet">

</head>

<body>
<div id="divCelek">
    <header id="zahlavi">
        <h1>e-knihy</h1>
    </header>

    <div id="podzahlavi">
        <h2>pohlazení pro duši</h2>
        <div id="kosik">
            <h3><a href="index.php">košík</a>
            </h3>
        </div>
        <div id="login">
            <h3>
                <a href="index.php?url=login">přihlásit se</a>
            </h3>
        </div>
    </div>
    <main id="hlavni">
        <?php echo $content;?>
    </main>

    <footer id="zapati">Michaela Herianová semestrální práce WEAP</footer>
</div>
</body>
</html>
