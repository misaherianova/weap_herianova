<?php  if(!defined('BASE_DIR')) die('no direct script access'); ?>

<h2>zadaná data</h2>
<ul>
    <?php foreach ($data as $key => $value):?>
        <li><?php echo $value;?></li>
    <?php endforeach;?>
</ul>