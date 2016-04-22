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
    <link href="<?php echo STATIC_DIR;?>css/admin.css" rel="stylesheet">

</head>

<body>
<div class="wrapper">
    <div class="zahlavi">
        <p>ADMINISTRACE</p>
    </div>
    <div class="topmenu">
        <a href="../../administrace/index.php?page=uvodni">ESHOP</a> |
        <a href="index.php?page=book_add">Pridat knihu</a> |
        <a href="index.php?page=book_edit">Upavit knihu</a> |
        <a href="index.php?page=orders">Ostatni</a> |
        <a href="index.php?page=logout">Odhlasit se</a>
    </div>
    <div class="middle">
        <div class="content">
            <?php echo $content; ?>
        </div>
    </div>
    <div class="footer">
        <p>Michaela Herianová semestrální práce WEAP</p>
    </div>
</div>
</body>
</html>
