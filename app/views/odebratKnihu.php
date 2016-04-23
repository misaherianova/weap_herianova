<?php  if(!defined('BASE_DIR')) die('no direct script access'); ?>


<div class="mozna">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=odebraniKnihy" method="post">
        ID knihy k odebrani: <input type="text" name="id"><br>
        <input type="submit">
    </form>
</div>